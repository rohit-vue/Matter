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
  emit('update:isDrawerOpen', false);
  refVForm.value?.reset();
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
                    {{ props.editingUserId ? 'Edit' : 'Add' }} a Point of Measure
                  </div>
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="id"
                    label="ID"
                    :rules="[requiredValidator]"
                    placeholder="P1"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="name"
                    label="POM Name"
                    :rules="[requiredValidator]"
                    placeholder="Across Chest"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="description"
                    label="POM Description"
                    :rules="[requiredValidator]"
                    placeholder="From pit to pit"
                  />
                </VCol>
                
                <VCol cols="12">
                  <VSelect
                    v-model="placement"
                    :rules="[requiredValidator]"
                    label="Placement"
                    placeholder="Add a Placement"
                  />
                </VCol>

                <VCol cols="12">
                  <VSelect
                    v-model="type"
                    :rules="[requiredValidator]"
                    label="Type"
                    placeholder="Add a Type"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="tolerance"
                    label="tolerance +/-"
                    :rules="[requiredValidator]"
                    placeholder="1.5"
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
