<script setup>
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'

const props = defineProps({
  isDrawerOpen: { type: Boolean, required: true },
  editingQualityId: { type: Number, default: null },
  qualityData: { type: Array, required: true },
})

const emit = defineEmits(['update:isDrawerOpen', 'add-quality'])

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}

const refVForm = ref()
const type = ref('')
const check = ref('')
const description = ref('')
const defaultQuality = ref([])

const requiredValidator = value => !!value || 'This field is required'

const resetForm = () => {
  refVForm.value?.reset()
  type.value = ''
  check.value = ''
  description.value = ''
  defaultQuality.value = false
  emit('update:isDrawerOpen', false)
}

const saveChanges = () => {
  if (refVForm.value?.validate()) {
    const newQuality= {
      id: props.editingQualityId || Date.now(),
      type: type.value,
      check: check.value,
      description: description.value,
      defaultQuality: defaultQuality.value,
    }
    emit('add-quality', newQuality)
    resetForm()
  }
}

const loadQualityData = (qualityId) => {
  const data = props.qualityData.find(quality => quality.id === qualityId);
  if (data) {
    type.value = data.type
    check.value = data.check
    description.value = data.description
    defaultQuality.value = data.defaultQuality
  }
}

onMounted(() => {
  if (props.editingQualityId) {
    loadQualityData(props.editingQualityId);
  }
})

watch(() => props.editingQualityId, (newQualityId) => {
  if (newQualityId) {
    loadQualityData(newQualityId);
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
                    {{ props.editingQualityId ? 'Edit' : 'Add' }} a Season
                  </div>
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="type"
                    label="Type"
                    :rules="[requiredValidator]"
                    placeholder="Type"
                  />
                </VCol>
                <VCol cols="12">
                  <VTextField
                    v-model="check"
                    label="Name"
                    :rules="[requiredValidator]"
                    placeholder="Name"
                  />
                </VCol>
                <VCol cols="12">
                  <VTextField
                    v-model="description"
                    label="Description"
                    :rules="[requiredValidator]"
                    placeholder="Description"
                  />
                </VCol>
                <VCol cols="12">
                  <VSwitch v-model="defaultQuality" label="Set as default"></VSwitch>
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
