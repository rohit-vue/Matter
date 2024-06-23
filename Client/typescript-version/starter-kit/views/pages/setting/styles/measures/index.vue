<!-- eslint-disable @typescript-eslint/quotes -->
<script setup lang="ts">
import { ref } from 'vue'
import CategoryDrawer from "@/views/setting/stylesDrawers/CategoryDrawer.vue"

const isAddNewCategoryDrawerVisible = ref(false)

const headers = [
  { title: 'Type', key: 'type', width: '10%' },
  { title: 'Check', key: 'check', width: '10%' },
  { title: 'Description', key: 'description' },
  { title: 'Setting', key: 'setting', sortable: false },
]

const dummyData = ref([
  { id: 1, type: 'General', check: 'Fabric', description: 'Verify fabric quality & placement' },
  { id: 2, type: 'Construction', check: 'Color', description: 'Check finishing of inside seams' },
  { id: 3, type: 'Trims', check: 'Sewing', description: 'Verify sewing quality & placement' },
  { id: 4, type: 'Fit & POMs', check: 'Overall Appearance', description: 'Check overall appearance ' },
])
</script>

<template>
  <div>
    <VRow justify="end">
      <VCol cols="11">
        <VCard>
          <VCardTitle style="padding: 1rem;">Quality Control Workflow</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="dummyData" item-value="id" class="text-no-wrap billing-history-table">
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
                <IconBtn size="small" @click="editUser(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteUser(item.id)" />
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewUnitDrawerVisible = !isAddNewUnitDrawerVisible">
                    Add Quality Control Check
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
