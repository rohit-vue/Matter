<!-- eslint-disable @typescript-eslint/quotes -->
<script setup lang="ts">
import { ref } from 'vue'
import CategoryDrawer from "@/views/setting/stylesDrawers/CategoryDrawer.vue"
import SizeDrawer from "@/views/setting/stylesDrawers/SizeDrawer.vue"

const isAddNewCategoryDrawerVisible = ref(false)
const isAddNewSizeDrawerVisible = ref(false)

definePageMeta({
  layout: 'setting',
})

const headers = [
  { title: 'Name', key: 'name', width: '60%', sortable: false, },
  { title: 'Default', key: 'default', sortable: false, },
  { title: 'Setting', key: 'setting', sortable: false, },
]

const dummyData = ref([
  { id: 1, name: 'Category A', active: true, default: false },
  { id: 2, name: 'Category B', active: false, default: true },
  { id: 3, name: 'Category C', active: true, default: false },
])

</script>

<template>
  <div>
    <VRow justify="end" style="margin-right: -5rem;">
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Component Labels</VCardTitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="dummyData" item-value="id" class="text-no-wrap billing-history-table">
              <!-- Name -->
              <template #item.name="{ item }">
                <div class="d-flex align-center pt-2 pb-3">
                  <div class="d-flex flex-column">
                    {{ item.name }}
                  </div>
                </div>
              </template>

              <!-- Default -->
              <template #item.default="{ item }">
                <VCheckbox v-model="item.default" />
              </template>

              <!-- Setting -->
              <template #item.setting>
                <IconBtn size="small">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line"/>
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewCategoryDrawerVisible = !isAddNewCategoryDrawerVisible">
                   Create New Template
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
        <VCard class="mt-6">
          <VCardTitle style="padding: 1rem;">Component Catalogs</VCardTitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="dummyData" item-value="id" class="text-no-wrap billing-history-table">
              <!-- Name -->
              <template #item.name="{ item }">
                <div class="d-flex align-center pt-2 pb-3">
                  <div class="d-flex flex-column">
                    {{ item.name }}
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
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line"/>
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewCategoryDrawerVisible = !isAddNewCategoryDrawerVisible">
                   Create New Template
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
      <SizeDrawer
        v-model:isDrawerOpen="isAddNewSizeDrawerVisible"
      />
    </VRow>
  </div>
</template>
<style lang="scss">
.btn {
  color: white;
  background: #9b9a9a;
}
</style>
