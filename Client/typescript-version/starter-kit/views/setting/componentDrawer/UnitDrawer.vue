<script setup>
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'

const props = defineProps({
  isDrawerOpen: { type: Boolean, required: true },
  editingUnitId: { type: Number, default: null },
  unitData: { type: Array, required: true },
})

const emit = defineEmits(['update:isDrawerOpen', 'add-unit'])

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}

const refVForm = ref()
const unit = ref('')
const category = ref([])
const defaultUnit = ref(false)

const requiredValidator = value => !!value || 'This field is required'

const resetForm = () => {
  refVForm.value?.reset()
  unit.value = ''
  category.value = []
  defaultUnit.value = false
  emit('update:isDrawerOpen', false)
}

const saveChanges = () => {
  console.log(category.value)
  if (refVForm.value?.validate()) {
    const newUnit = {
      id: props.editingUnitId || Date.now(),
      unit: unit.value,
      category: category.value,
      active: true, // assuming you want to set default active state
      default: defaultUnit.value,
    }
    console.log(newUnit)
    emit('add-unit', newUnit)
    resetForm()
  }
}

const loadUnitData = (unitId) => {
  // Load category data based on unitId. This is a placeholder for actual data loading logic.
  const data = props.unitData.find(unit => unit.id === unitId);
  if (data) {
    unit.value = data.unit
    category.value = data.category
    defaultUnit.value = data.default
  }
}

onMounted(() => {
  if (props.editingUnitId) {
    loadUnitData(props.editingUnitId);
  }
})

watch(() => props.editingUnitId, (newUnitId) => {
  if (newUnitId) {
    loadUnitData(newUnitId);
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
                    {{ props.editingUnitId ? 'Edit' : 'Add' }} a Component Unit
                  </div>
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="unit"
                    label="Unit"
                    :rules="[requiredValidator]"
                    placeholder="mts"
                  />
                </VCol>
                
                <VCol cols="12">
                  <VCombobox
                    v-model="category"
                    chips
                    clearable
                    multiple
                    closable-chips
                    clear-icon="ri-close-circle-line"
                  />
                </VCol>

                <VCol cols="12">
                  <VSwitch v-model="defaultUnit" label="Set as default"></VSwitch>
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
