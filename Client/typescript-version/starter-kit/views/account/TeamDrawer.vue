<script setup lang="ts">
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'
import { VForm } from 'vuetify/components/VForm'
import { ref, watch, onMounted } from 'vue'

const selectedRole = ref<string | null>(null);
const typeOfRole = ref<string[]>([
  'Admin',
  'Read Only',
]);

const props = defineProps({
  isDrawerOpen: {
    type: Boolean,
    required: true,
  },
  editingUserId: {
    type: Number,
    default: null,
  },
  teamMembers: {
    type: Array as PropType<{ id: number; user: { name: string; companyEmail: string }; role: string }[]>,
    required: true,
  },
})

const emit = defineEmits(['update:isDrawerOpen', 'add-user'])

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}

const refVForm = ref()
const firstname = ref('')
const surname = ref('')
const email = ref('')

const requiredValidator = value => !!value || 'This field is required'

const capitalize = (text) => {
  return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
}

watch(firstname, (newValue) => {
  if (newValue) {
    firstname.value = capitalize(newValue);
  }
});

watch(surname, (newValue) => {
  if (newValue) {
    surname.value = capitalize(newValue);
  }
});

const resetForm = () => {
  refVForm.value?.reset()
  emit('update:isDrawerOpen', false)
}

const saveChanges = () => {
  if (refVForm.value?.validate()) {
    const newUser = {
      id: props.editingUserId || Date.now(),
      user: {
        name: `${firstname.value} ${surname.value}`,
        companyEmail: email.value,
        avatar: '', // Default empty avatar
      },
      role: selectedRole.value,
    };
    emit('add-user', newUser)
    resetForm()
  }
}

const loadUserData = (userId) => {
  // Load user data based on userId. This is a placeholder for actual data loading logic.
  const user = props.teamMembers.find(user => user.id === userId);
  if (user) {
    firstname.value = user.user.name.split(' ')[0];
    surname.value = user.user.name.split(' ')[1];
    email.value = user.user.companyEmail;
    selectedRole.value = user.role;
  }
}

onMounted(() => {
  if (props.editingUserId) {
    loadUserData(props.editingUserId);
  }
})

watch(() => props.editingUserId, (newUserId) => {
  if (newUserId) {
    loadUserData(newUserId);
  } else {
    resetForm();
  }
})
</script>

<template>
  <VNavigationDrawer
    :model-value="props.isDrawerOpen"
    temporary
    location="end"
    width="420"
    @update:model-value="handleDrawerModelValueUpdate"
  >
    <VRow justify="space-between" align="center" class="mx-2">
      <AppDrawerHeaderSection
        class="mt-6"
        @cancel="resetForm"
      />
      <div class="custom-btn">
        <VBtn variant="outlined" @click="resetForm">
          Cancel
        </VBtn>
        <VBtn variant="tonal" class="btn" @click="saveChanges">
          Save Changes
        </VBtn>
      </div>

      <VCard flat>
        <PerfectScrollbar
          :options="{ wheelPropagation: false }"
          class="h-100"
        >
          <VCardText style="block-size: calc(100vh - 5rem);">
            <VForm
              ref="refVForm"
              @submit.prevent=""
            >
              <VRow class="mt-5">
                <VCol>
                  <div style="font-size: 21px; font-weight: 600;">
                    {{ props.editingUserId ? 'Edit' : 'Add' }} a User
                  </div>
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="firstname"
                    label="First Name"
                    :rules="[requiredValidator]"
                    placeholder="John"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="surname"
                    label="Surname"
                    placeholder="Smith"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="email"
                    label="Email Address"
                    :rules="[requiredValidator]"
                    placeholder="johndoe@gmail.com"
                  />
                </VCol>

                <VCol cols="12">
                  <v-select
                    v-model="selectedRole"
                    :rules="[requiredValidator]"
                    :items="typeOfRole"
                    label="Role"
                    placeholder="Select a Role"
                  ></v-select>
                </VCol>
              </VRow>
            </VForm>
          </VCardText>
        </PerfectScrollbar>
      </VCard>
    </VRow>
  </VNavigationDrawer>
</template>

<style lang="scss">
.v-navigation-drawer__content {
  overflow-y: hidden !important;
}
.btn {
  color: white;
  background: #9b9a9a;
}
</style>
