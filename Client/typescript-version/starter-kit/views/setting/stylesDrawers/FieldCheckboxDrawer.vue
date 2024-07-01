<script setup>
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'
import { ref, watch, onMounted } from 'vue'

const props = defineProps({
  isDrawerOpen: { type: Boolean, required: true },
  editingFieldId: { type: Number, default: null },
  fieldData: { type: Array, required: true },
})

const emit = defineEmits(['update:isDrawerOpen', 'add-field'])

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}

const refVForm = ref()
const field = ref('')
const fieldName = ref('')
const internal = ref(false)

const requiredValidator = value => !!value || 'This field is required'

const capitalize = (text) => {
  return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
}

watch(fieldName, (newValue) => {
  if (newValue) {
    fieldName.value = capitalize(newValue);
  }
});

const resetForm = () => {
  refVForm.value?.reset()
  emit('update:isDrawerOpen', false)
}

const closeNavigationDrawer = () => {
  emit('update:isDrawerOpen', false)
  nextTick(() => {
    refForm.value?.reset()
    refForm.value?.resetValidation()
  })
}

const saveChanges = () => {
  if (refVForm.value?.validate()) {
    const newField = {
      id: props.editingFieldId || Date.now(),
      type: 'Checkbox',
      field: field.value,
      fieldName: fieldName.value,
      active: true, // assuming you want to set default active state
      internal: internal.value,
    }
    emit('add-field', newField)
    resetForm()
  }
}

const loadFieldData = (fieldid) => {
  // Load category data based on fieldid. This is a placeholder for actual data loading logic.
  const data = props.fieldData.find(field => field.id === fieldid);
  if (data) {
    field.value = data.field
    fieldName.value = data.fieldName
    internal.value = data.internal
  }
}

onMounted(() => {
  if (props.editingfieldId) {
    loadFieldData(props.editingfieldId);
  }
})

watch(() => props.editingFieldId, (newFieldId) => {
  if (newFieldId) {
    loadFieldData(newFieldId);
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
        @cancel="closeNavigationDrawer"
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
                    {{ props.editingFieldId ? 'Edit' : 'Add' }} a Custom Field
                  </div>
                </VCol>

                <VCol cols="12">
                  <p>Field Type</p>
                  <VTextField
                    readonly
                    placeholder="Checkbox"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="field"
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
                  <VSwitch v-model="internal" label="Internal Field"></VSwitch>
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
