<script setup>
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'
import { ref, watch, onMounted } from 'vue'

const props = defineProps({
  isDrawerOpen: { type: Boolean, required: true },
  editingStageId: { type: Number, default: null },
  stageData: { type: Array, required: true },
})

const emit = defineEmits(['update:isDrawerOpen', 'add-stage'])

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}

const refVForm = ref()
const stage = ref('')
const defaultStage = ref(false)

const requiredValidator = value => !!value || 'This field is required'

const capitalize = (text) => {
  return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
}

watch(stage, (newValue) => {
  if (newValue) {
    stage.value = capitalize(newValue);
  }
});

const resetForm = () => {
  refVForm.value?.reset()
  stage.value = ''
  defaultStage.value = false
  emit('update:isDrawerOpen', false)
}

const saveChanges = () => {
  if (refVForm.value?.validate()) {
    const newStage = {
      id: props.editingStageId || Date.now(),
      stage: stage.value,
      default: defaultStage.value,
    }
    emit('add-stage', newStage)
    resetForm()
  }
}

const loadStageData = (stageId) => {
  const data = props.stageData.find(stage => stage.id === stageId);
  if (data) {
    stage.value = data.stage
    defaultStage.value = data.default
  }
}

onMounted(() => {
  if (props.editingStageId) {
    loadStageData(props.editingStageId);
  }
})

watch(() => props.editingStageId, (newStageId) => {
  if (newStageId) {
    loadStageData(newStageId);
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
                    {{ props.editingStageId ? 'Edit' : 'Add' }} Sampling Stage
                  </div>
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="stage"
                    label="Stage Name"
                    :rules="[requiredValidator]"
                    placeholder="SMS"
                  />
                </VCol>

                <VCol cols="12">
                  <VSwitch v-model="defaultStage" label="Set as default"></VSwitch>
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
