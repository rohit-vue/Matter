<script setup lang>
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'

const props = defineProps({
  isDrawerOpen: { type: Boolean, required: true },
  editingMiscId: { type: Number, default: null },
  miscData: { type: Array, required: true },
})

const emit = defineEmits(['update:isDrawerOpen', 'add-misc'])

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}

const refVForm = ref()
const POMId = ref('')
const name = ref('')
const description = ref('')
const placement = ref('')
const placementType = ref([
  'Placement 1',
  'Placement 2',
  'Placement 3',
]);
const type = ref('')
const Type = ref([
  'Type 1',
  'Type 2',
  'Type 3',
]);
const tolerance = ref('')
const defaultMeasure = ref(false)

const requiredValidator = value => !!value || 'This field is required'

const resetForm = () => {
  emit('update:isDrawerOpen', false)
  refVForm.value?.reset()
}

const saveChanges = () => {
  if (refVForm.value?.validate()) {
    const newMisc= {
      id: props.editingMiscId || Date.now(),
      POMId: POMId.value,
      name: name.value,
      description: description.value,
      placement: placement.value,
      type: type.value,
      tolerance: tolerance.value,
      default: defaultMeasure.value,
    }
    emit('add-misc', newMisc)
    resetForm()
  }
}

const loadMiscData = (miscId) => {
  const data = props.miscData.find(misc => misc.id === miscId);
  if (data) {
    POMId.value = data.POMId
    name.value = data.name
    description.value = data.description
    placement.value = data.placement
    type.value = data.type
    tolerance.value = data.tolerance
    defaultMeasure.value = data.default
  }
}

onMounted(() => {
  if (props.editingMiscId) {
    loadMiscData(props.editingMiscId);
  }
})

watch(() => props.editingMiscId, (newMiscId) => {
  if (newMiscId) {
    loadMiscData(newMiscId);
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
                    {{ props.editingMiscId ? 'Edit' : 'Add' }} a Point of Measure
                  </div>
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="POMId"
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
                    :items="placementType"
                    label="Placement"
                    placeholder="Add a Placement"
                  />
                </VCol>

                <VCol cols="12">
                  <VSelect
                    v-model="type"
                    :rules="[requiredValidator]"
                    :items="Type"
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
                  <VSwitch v-model="defaultMeasure" label="Set as default"></VSwitch>
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
