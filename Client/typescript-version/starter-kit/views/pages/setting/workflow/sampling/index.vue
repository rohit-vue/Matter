<!-- eslint-disable @typescript-eslint/quotes -->
<script setup lang="ts">
import { ref } from 'vue'
import SamplingDrawer from "@/views/setting/workflowDrawers/samplingDrawer.vue"

const isAddNewStageDrawerVisible = ref(false)
const editingStageId = ref<number | null>(null);

const headers = [
  { title: 'Stage Name', key: 'stage', width: '60%', sortable: false, },
  { title: 'Default', key: 'default', sortable: false, },
  { title: 'Setting', key: 'setting', sortable: false, },
]

const stageData = ref([])

const addStage = (newStage) => {
  if (editingStageId.value !== null) {
    const index = stageData.value.findIndex(stage => stage.id === editingStageId.value);
    if (index !== -1) {
      stageData.value[index] = newStage;
    }
  } else {
    stageData.value.push(newStage);
  }
  editingStageId.value = null;
}

const editStage = (stage) => {
  editingStageId.value = stage.id;
  isAddNewStageDrawerVisible.value = true;
}

const deleteStage = (id) => {
  stageData.value = stageData.value.filter(stage => stage.id !== id);
}
</script>

<template>
  <div>
    <VRow justify="end">
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Sampling Stages</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Define your sampling workflow stages</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="stageData" item-value="id" class="text-no-wrap">
              <!-- User -->
              <template #item.stage="{ item }">
                <div class="d-flex align-center pt-2 pb-3">
                  <div class="d-flex flex-column">
                    {{ item.stage }}
                  </div>
                </div>
              </template>

              <!-- Default -->
              <template #item.default="{ item }">
                <VCheckbox v-model="item.default" />
              </template>

              <!-- Setting -->
              <template #item.setting="{ item }">
                <IconBtn size="small">
                  <VIcon icon="ri-pencil-line" @click="editStage(item)"/>
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteStage(item.id)"/>
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewStageDrawerVisible = !isAddNewStageDrawerVisible">
                    Add Sampling Stage
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
      </VCol>
      <SamplingDrawer
        v-model:isDrawerOpen="isAddNewStageDrawerVisible"
        :editing-stage-id="editingStageId"
        :stage-data="stageData"
        @add-stage="addStage"
      />
    </VRow>
  </div>
</template>
