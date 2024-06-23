<!-- eslint-disable @typescript-eslint/quotes -->
<script setup >
import { ref } from 'vue'
import CategoryDrawer from "@/views/setting/stylesDrawers/CategoryDrawer.vue"

const isAddNewCategoryDrawerVisible = ref(false)

const headers = [
  { title: 'Stage Name', key: 'stage', width: '60%', sortable: false, },
  { title: 'Default', key: 'default', sortable: false, },
  { title: 'Setting', key: 'setting', sortable: false, },
]

const dummyData = ref([
  { id: 1, stage: 'Category A', default: false },
  { id: 2, stage: 'Category B', default: true },
  { id: 3, stage: 'Category C', default: false },
])
</script>

<template>
  <div>
    <VRow justify="end">
      <VCol cols="11">
        <VCard>
          <VCardTitle style="padding: 1rem;">Sampling Stages</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Define your sampling workflow stages</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="dummyData" item-value="id" class="text-no-wrap">
              <!-- User -->
              <template #item.stage="{ item }">
                <div class="d-flex align-center pt-2 pb-3">
                  <div class="d-flex flex-column">
                    {{ item.stage }}
                  </div>
                </div>
              </template>

              <!-- Active -->
              <template #item.active="{ item }">
                <VCheckbox v-model="item.active" />
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
                    Add Sampling Stage
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