<script setup>
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'

// const selectedCountry = ref<string | null>(null);
const typeOfCountry = ref([
  'Divider',
  'Boolean (Yes/No)',
  'Text',
  'Allowed Values',
]);

const props = defineProps({
  isDrawerOpen: {
    type: Boolean,
    required: true,
  },
})


const emit = defineEmits([
  'update:isDrawerOpen',
  'userData',
])

const resetForm = () => {
  refVForm.value?.reset();
  emit('update:isDrawerOpen', false);
};

const refForm = ref()
const fullName = ref('')
const userName = ref('')
const email = ref('')
const company = ref('')
const country = ref()
const contact = ref('')
const role = ref()
const plan = ref()
const status = ref()

// 👉 drawer close
const closeNavigationDrawer = () => {
  emit('update:isDrawerOpen', false)
  nextTick(() => {
    refForm.value?.reset()
    refForm.value?.resetValidation()
  })
}

const onSubmit = () => {
  refForm.value?.validate().then(({ valid }) => {
    if (valid) {
      emit('userData', {
        id: 0,
        fullName: fullName.value,
        company: company.value,
        role: role.value,
        username: userName.value,
        country: country.value,
        contact: contact.value,
        email: email.value,
        currentPlan: plan.value,
        status: status.value,
        avatar: '',
      })
      emit('update:isDrawerOpen', false)
      nextTick(() => {
        refForm.value?.reset()
        refForm.value?.resetValidation()
      })
    }
  })
}

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}
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
        @cancel="closeNavigationDrawer"
      />
      <div class="custom-btn">
        <VBtn variant="outlined" @click="closeNavigationDrawer">
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
                    {{ props.editingUserId ? 'Edit' : 'Add' }} a Component Field
                  </div>
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="fieldName"
                    label="Field Name"
                    :rules="[requiredValidator]"
                    placeholder="Country of Origin"
                  />
                </VCol>
                
                <VCol cols="12">
                  <VSelect
                    v-model="selectedCountry"
                    :rules="[requiredValidator]"
                    :items="typeOfCountry"
                    label="Field Type"
                    placeholder="Select a Field"
                  ></VSelect>
                </VCol>

                <VCol cols="12">
                  <VSwitch label="Internal Field"></VSwitch>
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
