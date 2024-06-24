<!-- eslint-disable @typescript-eslint/quotes -->
<script setup >
import { ref } from 'vue'
import CategoryDrawer from "@/views/setting/stylesDrawers/CategoryDrawer.vue"

const isAddNewCategoryDrawerVisible = ref(false)

const headers = [
  { title: 'Task Name', key: 'task', width: '40%' },
  { title: 'Description', key: 'description' },
  { title: 'Setting', key: 'setting', sortable: false },
]

const dummyData = ref([
  { id: 1, task: 'Status Update', description: 'Product Development' },
  { id: 2, task: 'Sample Request', description: 'Product Development' },
  { id: 1, task: 'Review Confirmation', description: 'Logistics' },
  { id: 2, task: 'Shipment Request', description: 'Product Development' },
  { id: 3, task: 'Supplier Visit', description: 'Product Development' },
  { id: 4, task: 'Techpack Update', description: 'Product Development' },
])
</script>

<template>
  <div>
    <VRow justify="end">
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Tasks Setup</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Define common tasks within your workflow</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="dummyData" item-value="id" class="text-no-wrap billing-history-table">
              <!-- Task -->
              <template #item.task="{ item }">
                {{ item.task }}
              </template>

              <!-- Check -->
              <template #item.check="{ item }">
                {{ item.check }}
              </template>

              <!-- Description -->
              <template #item.description="{ item }">
                <VChip>
                  {{ item.description }}
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
                    Add Task Type
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
