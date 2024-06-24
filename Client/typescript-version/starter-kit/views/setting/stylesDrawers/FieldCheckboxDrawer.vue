<script setup>
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'

// const selectedCountry = ref<string | null>(null);
const typeOfCountry = ref([
  'United Kingdom',
  'United States',
  'China',
  'Russia',
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
  emit('update:isDrawerOpen', false);
  refVForm.value?.reset();
};

const refForm = ref()
const fieldId = ref('')
const fieldType = ref('')
const fieldName = ref('')

// 👉 drawer close
const closeNavigationDrawer = () => {
  emit('update:isDrawerOpen', false)
  nextTick(() => {
    refForm.value?.reset()
    refForm.value?.resetValidation()
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
                    {{ props.editingUserId ? 'Edit' : 'Add' }} a Custom Field
                  </div>
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="fieldType"
                    label="Field Type"
                    :rules="[requiredValidator]"
                    placeholder="Checkbox"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="fieldId"
                    label="Field ID"
                    :rules="[requiredValidator]"
                    placeholder="CF5"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="fieldName"
                    label="Field Name"
                    :rules="[requiredValidator]"
                    placeholder="TP Studio"
                  />
                </VCol>

                <VCol cols="12">
                  <VSwitch label="Internal Field"></VSwitch>
                </VCol>
                <VCol cols="12">
                  <VSwitch label="Editable by Supplier"></VSwitch>
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
