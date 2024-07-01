<script setup>
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'

const props = defineProps({
  isDrawerOpen: { type: Boolean, required: true },
  editingSeasonId: { type: Number, default: null },
  seasonData: { type: Array, required: true },
})

const emit = defineEmits(['update:isDrawerOpen', 'add-season'])

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}

const refVForm = ref()
const season = ref('')
const description = ref('')
const sample = ref([])

const requiredValidator = value => !!value || 'This field is required'

const resetForm = () => {
  refVForm.value?.reset()
  season.value = ''
  description.value = ''
  sample.value = []
  emit('update:isDrawerOpen', false)
}

const saveChanges = () => {
  if (refVForm.value?.validate()) {
    const newSeason = {
      id: props.editingSeasonId || Date.now(),
      season: season.value,
      description: description.value,
      sample: sample.value,
    }
    emit('add-season', newSeason)
    resetForm()
  }
}

const loadSeasonData = (seasonId) => {
  // Load sample data based on seasonId. This is a placeholder for actual data loading logic.
  const data = props.seasonData.find(season => season.id === seasonId);
  if (data) {
    season.value = data.season
    description.value = data.description
    sample.value = data.sample
  }
}

onMounted(() => {
  if (props.editingSeasonId) {
    loadSeasonData(props.editingSeasonId);
  }
})

watch(() => props.editingSeasonId, (newUnitId) => {
  if (newUnitId) {
    loadSeasonData(newUnitId);
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
                    {{ props.editingSeasonId ? 'Edit' : 'Add' }} a Season
                  </div>
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="season"
                    label="Season Name"
                    :rules="[requiredValidator]"
                    placeholder="Season Name"
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
                  <VCombobox
                    v-model="sample"
                    label="Sampling Stages"
                    chips
                    clearable
                    multiple
                    closable-chips
                    clear-icon="ri-close-circle-line"
                  />
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
