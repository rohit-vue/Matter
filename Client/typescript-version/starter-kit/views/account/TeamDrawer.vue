<script setup lang="ts">
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'
import { VForm } from 'vuetify/components/VForm'

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
})

const emit = defineEmits(['update:isDrawerOpen'])

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}

const refVForm = ref()
const firstname = ref()
const surname = ref()
const email = ref()

const resetForm = () => {
  refVForm.value?.reset()
  emit('update:isDrawerOpen', false)
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
    <!-- 👉 Header -->
    <VRow justify="space-between" align="center" class="mx-2">
      <AppDrawerHeaderSection
        class="mt-6"
        @cancel="$emit('update:isDrawerOpen', false)"
      />
      <div class="custom-btn">
        <VBtn variant="outlined">
          Cancel
        </VBtn>
        <VBtn variant="tonal" class="btn">
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
                    Add a User
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
