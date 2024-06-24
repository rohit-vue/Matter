<!-- eslint-disable @typescript-eslint/quotes -->
<script setup lang="ts">
import { ref } from 'vue'
import PomTopDrawer from "@/views/setting/stylesDrawers/PomTopDrawer.vue"

const isAddNewTopDrawerVisible = ref(false)

const headers = [
  { title: 'POM ID', key: 'id' },
  { title: 'Position', key: 'position' },
  { title: 'POM', key: 'pom' },
  { title: 'Description', key: 'description', sortable: false },
  { title: 'Garment Type', key: 'type', sortable: false },
  { title: 'Default', key: 'default', sortable: false },
  { title: 'Setting', key: 'setting', sortable: false, },
]

const dummyData = ref([
  { id: 'A', position: 'Front', pom: 'Waist', description: 'HPS to Seam', type: 'Bottoms', default: true },
  { id: 'B', position: 'Front', pom: 'Length', description: 'HPS to Seam', type: 'Bottoms', default: true },
  { id: 'Z', position: 'All', pom: 'Thigh', description: 'HPS to Seam', type: 'Bottoms', default: false },
  { id: 'E', position: 'Front', pom: 'Knee', description: 'HPS to Seam', type: 'Bottoms', default: true },
  { id: 'A', position: 'Front', pom: 'Waist', description: 'HPS to Seam', type: 'Bottoms', default: true },
  { id: 'B', position: 'Front', pom: 'Length', description: 'HPS to Seam', type: 'Bottoms', default: true },
  { id: 'Z', position: 'All', pom: 'Thigh', description: 'HPS to Seam', type: 'Bottoms', default: false },
  { id: 'E', position: 'Front', pom: 'Knee', description: 'HPS to Seam', type: 'Bottoms', default: true },
  { id: 'A', position: 'Front', pom: 'Waist', description: 'HPS to Seam', type: 'Bottoms', default: true },
  { id: 'B', position: 'Front', pom: 'Length', description: 'HPS to Seam', type: 'Bottoms', default: true },
  { id: 'Z', position: 'All', pom: 'Thigh', description: 'HPS to Seam', type: 'Bottoms', default: false },
  { id: 'E', position: 'Front', pom: 'Knee', description: 'HPS to Seam', type: 'Bottoms', default: true },
])
</script>

<template>
  <div>
    <VRow justify="end">
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Points of Measure - Tops</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="dummyData" item-value="id" class="text-no-wrap billing-history-table">
              <!-- ID -->
              <template #item.id="{ item }">
                {{ item.id }}
              </template>

              <!-- Position -->
              <template #item.position="{ item }">
                <VChip>
                  {{ item.position }}
                </VChip>
              </template>

              <!-- POM -->
              <template #item.pom="{ item }">
                {{ item.pom }}
              </template>

              <!-- Description -->
              <template #item.description="{ item }">
                {{ item.description }}
              </template>

              <!-- Default -->
              <template #item.default="{ item }">
                <VSwitch v-model="item.default"></VSwitch>
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
                  <VBtn variant="outlined" @click="isAddNewTopDrawerVisible = !isAddNewTopDrawerVisible">
                    Add Point of Measure
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
      </VCol>
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Points of Measure - Bottoms</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="dummyData" item-value="id" class="text-no-wrap billing-history-table">
              <!-- ID -->
              <template #item.id="{ item }">
                {{ item.id }}
              </template>

              <!-- Position -->
              <template #item.position="{ item }">
                <VChip>
                  {{ item.position }}
                </VChip>
              </template>

              <!-- POM -->
              <template #item.pom="{ item }">
                {{ item.pom }}
              </template>

              <!-- Description -->
              <template #item.description="{ item }">
                {{ item.description }}
              </template>

              <!-- Default -->
              <template #item.default="{ item }">
                <VSwitch v-model="item.default"></VSwitch>
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
                    Add Point of Measure
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
      </VCol>
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Points of Measure - Misc</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="dummyData" item-value="id" class="text-no-wrap billing-history-table">
              <!-- ID -->
              <template #item.id="{ item }">
                {{ item.id }}
              </template>

              <!-- Position -->
              <template #item.position="{ item }">
                <VChip>
                  {{ item.position }}
                </VChip>
              </template>

              <!-- POM -->
              <template #item.pom="{ item }">
                {{ item.pom }}
              </template>

              <!-- Description -->
              <template #item.description="{ item }">
                {{ item.description }}
              </template>

              <!-- Default -->
              <template #item.default="{ item }">
                <VSwitch v-model="item.default"></VSwitch>
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
                    Add Point of Measure
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
      </VCol>
      <PomTopDrawer
        v-model:isDrawerOpen="isAddNewTopDrawerVisible"
      />
    </VRow>
  </div>
</template>

<style lang="scss">

</style>
