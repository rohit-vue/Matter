<script setup>
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'

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

const isFormValid = ref(false)
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

const chips = ref(['XS', 'S', 'M'])
// const items = ref(['L', 'S', 'Programming', 'Playing games', 'Sleeping'])

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
                    {{ props.editingUserId ? 'Edit' : 'Add' }} a Component Unit
                  </div>
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="rangeName"
                    label="Range Name"
                    :rules="[requiredValidator]"
                    placeholder="XS-XL"
                  />
                </VCol>
                
                <VCol cols="12">
                  <VCombobox
                    class=""
                    v-model="chips"
                    chips
                    clearable
                    multiple
                    closable-chips
                    clear-icon="ri-close-circle-line"
                    :items="items"
                  />
                </VCol>

                <VCol cols="12">
                  <VSwitch label="Set as default"></VSwitch>
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
