<!-- eslint-disable @typescript-eslint/quotes -->
<script setup >
import { ref } from 'vue'
import CategoryDrawer from "@/views/setting/stylesDrawers/CategoryDrawer.vue"

const isAddNewCategoryDrawerVisible = ref(false)
const isDefaultChipVisible = ref(true)

const headers = [
  { title: 'Season', key: 'season', width: '10%', sortable: false },
  { title: 'Description', key: 'description', width: '25%', sortable: false },
  { title: 'Sampling Stages', key: 'sample', width: '45%', sortable: false },
  { title: 'Setting', key: 'setting', sortable: false },
]

const dummyData = ref([
  { id: 1, season: 'SA24', description: 'Summer Autumn 2024', sample: 'sample A' },
  { id: 2, season: 'SS24', description: 'Spring Summer 2024', sample: 'sample B' },
  { id: 3, season: 'SA24', description: 'Summer Autumn 2024', sample: 'sample C' },
])
</script>

<template>
  <div>
    <VRow justify="end">
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Season Setup</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Setup your seasons and the sampling stages associated with them.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="dummyData" item-value="id" class="text-no-wrap billing-history-table">
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
                <VChip
                  v-if="isDefaultChipVisible"
                  closable
                  @click:close="isDefaultChipVisible = !isDefaultChipVisible"
                >
                  {{ item.sample }}
                </VChip>
              </template>

              <!-- Setting -->
              <template #item.setting="{ item }">
                <IconBtn size="small" @click="editUser(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteUser(item.id)" />
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewUnitDrawerVisible = !isAddNewUnitDrawerVisible">
                    Add Season
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
      </VCol>
      <CategoryDrawer
        v-model:isDrawerOpen="isAddNewCategoryDrawerVisible"
      />
    </VRow>
  </div>
</template>

<style lang="scss">

</style>
