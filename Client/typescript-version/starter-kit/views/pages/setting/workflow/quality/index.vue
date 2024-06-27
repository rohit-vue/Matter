<!-- eslint-disable @typescript-eslint/quotes -->
<script setup lang="ts">
import { ref } from 'vue'
import QualityDrawer from "@/views/setting/workflowDrawers/qualityDrawer.vue"

const isAddNewQualityDrawerVisible = ref(false)
const editingQualityId = ref<number | null>(null);

const headers = [
  { title: 'Type', key: 'type', width: '10%' },
  { title: 'Check', key: 'check', width: '10%' },
  { title: 'Description', key: 'description' },
  { title: 'Setting', key: 'setting', sortable: false },
]

const qualityData = ref([])
const addQuality = (newQuality) => {
  if (editingQualityId.value !== null) {
    const index = qualityData.value.findIndex(quality => quality.id === editingQualityId.value)
    if (index !== -1) {
      qualityData.value[index] = newQuality;
    }
  } else {
    qualityData.value.push(newQuality);
  }
  editingQualityId.value = null;
}

const editQuality = (quality) => {
  editingQualityId.value = quality.id
  isAddNewQualityDrawerVisible.value = true;
}

const deleteQuality = (id) => {
  qualityData.value = qualityData.value.filter(quality => quality.id !== id);
}
</script>

<template>
  <div>
    <VRow justify="end">
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Quality Control Workflow</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="qualityData" item-value="id" class="text-no-wrap">
              <!-- Type -->
              <template #item.type="{ item }">
                {{ item.type }}
              </template>

              <!-- Check -->
              <template #item.check="{ item }">
                {{ item.check }}
              </template>

              <!-- Description -->
              <template #item.description="{ item }">
                {{ item.description }}
              </template>

              <!-- Setting -->
              <template #item.setting="{ item }">
                <IconBtn size="small" @click="editQuality(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteQuality(item.id)" />
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewQualityDrawerVisible = !isAddNewQualityDrawerVisible">
                    Add Quality Control Check
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
      </VCol>
      <QualityDrawer
        v-model:isDrawerOpen="isAddNewQualityDrawerVisible"
        :editing-quality-id="editingQualityId"
        :quality-data="qualityData"
        @add-quality="addQuality"
      />
    </VRow>
  </div>
</template>

<style lang="scss">

</style>
