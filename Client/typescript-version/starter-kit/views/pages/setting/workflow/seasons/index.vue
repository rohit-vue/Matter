<!-- eslint-disable @typescript-eslint/quotes -->
<script setup lang="ts">
import { ref } from 'vue'
import SeasonDrawer from "@/views/setting/workflowDrawers/seasonDrawer.vue"

const isAddNewSeasonDrawerVisible = ref(false)
const editingSeasonId = ref<number | null>(null);

const headers = [
  { title: 'Season', key: 'season', width: '10%', sortable: false },
  { title: 'Description', key: 'description', width: '25%', sortable: false },
  { title: 'Sampling Stages', key: 'sample', width: '45%', sortable: false },
  { title: 'Setting', key: 'setting', sortable: false },
]

const seasonData = ref([])

const addSeason = (newSeason) => {
  if (editingSeasonId.value !== null) {
    const index = seasonData.value.findIndex(season => season.id === editingSeasonId.value)
    if (index !== -1) {
      seasonData.value[index] = newSeason;
    }
  } else {
    seasonData.value.push(newSeason);
  }
  editingSeasonId.value = null;
}

const editSeason = (season) => {
  editingSeasonId.value = season.id
  isAddNewSeasonDrawerVisible.value = true;
}

const deleteSeason = (id) => {
  seasonData.value = seasonData.value.filter(season => season.id !== id);
}
</script>

<template>
  <div>
    <VRow justify="end">
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Season Setup</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Setup your seasons and the sampling stages associated with them.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="seasonData" item-value="id" class="text-no-wrap billing-history-table">
              <!-- Season -->
              <template #item.season="{ item }">
                {{ item.season }}
              </template>

              <!-- Description -->
              <template #item.description="{ item }">
                {{ item.description }}
              </template>

              <!-- sampling stage  -->
              <template #item.sample="{ item }">
                <div class="chip-wrapper">
                  <VChip
                    v-for="(sampleItem, index) in item.sample"
                    :key="index"
                  >
                    {{ sampleItem }}
                  </VChip>
                </div>
              </template>

              <!-- Setting -->
              <template #item.setting="{ item }">
                <IconBtn size="small" @click="editSeason(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteSeason(item.id)" />
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewSeasonDrawerVisible = !isAddNewSeasonDrawerVisible">
                    Add Season
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
      </VCol>
      <SeasonDrawer
        v-model:isDrawerOpen="isAddNewSeasonDrawerVisible"
        :editing-season-id="editingSeasonId"
        :season-data="seasonData"
        @add-season="addSeason"
      />
    </VRow>
  </div>
</template>

<style lang="scss">
.btn {
  color: white;
  background: #9b9a9a;
}
.chip-wrapper {
  display: flex;
  flex-wrap: wrap;
  padding: 0.5rem 5px;
  gap: 8px; /* Add some space between the chips */
}
</style>
