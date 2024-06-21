<script setup lang="ts">
definePageMeta({
  layout: "setting",
})

import CategoryDrawer from '@/views/setting/componentDrawer/CategoryDrawer.vue';
import FieldDrawer from '@/views/setting/componentDrawer/FieldDrawer.vue';
import UnitDrawer from '@/views/setting/componentDrawer/UnitDrawer.vue';
import { ref } from 'vue';

const isAddNewCategoryDrawerVisible = ref(false);
const isAddNewUnitDrawerVisible = ref(false);
const isAddNewFieldDrawerVisible = ref(false);

// const selectedRole = ref<string | null>(null);

const headers = [
  { title: 'Category', key: 'category', width: '40%', sortable: false, },
  { title: 'Active', key: 'active', sortable: false, },
  { title: 'Default', key: 'default', sortable: false, },
  { title: 'Setting', key: 'setting', sortable: false, },
]

const headers2 = [
  { title: 'Unit', key: 'unit', sortable: false, },
  { title: 'Category', key: 'category', width: '35%', sortable: false, },
  { title: 'Active', key: 'active', sortable: false, },
  { title: 'Default', key: 'default', sortable: false, },
  { title: 'Setting', key: 'setting', sortable: false, },
]

const headers3 = [
  { title: 'Active', key: 'active', width: '10%', sortable: false, },
  { title: 'Custom Field', key: 'field', sortable: false, },
  { title: 'Field Type', key: 'type', sortable: false, },
  { title: 'Internal', key: 'internal', sortable: false, },
  { title: 'Setting', key: 'setting', sortable: false, },
]

const dummyData = ref([
  { id: 1, category: 'Fabrics', active: true, default: false },
  { id: 2, category: 'Trims', active: false, default: true },
  { id: 3, category: 'Tapes', active: true, default: false },
  { id: 3, category: 'Labels', active: true, default: false },
  { id: 3, category: 'Packaging', active: true, default: false },
]);

const dummyData2 = ref([
  { id: 1, unit: 'cm', category: 'Category A', active: 'true', default: false },
  { id: 2, unit: 'mm', category: 'Category B', active: 'true', default: true },
  { id: 3, unit: 'cm', category: 'Category C', active: 'true', default: false },
]);

const dummyData3 = ref([
  { id: 1, active: true, field: 'Weight', type: "XL,S,M", internal: false },
  { id: 2, active: true, field: 'Finish', type: "S,M,L", internal: true },
  { id: 3, active: false, field: 'Stock Service', type: "M,XL", internal: false },
]);

const isDefaultChipVisible = ref(true)
const chips = ref(['Mens', 'Womens', 'Test'])
const items = ref(['Streaming', 'Mens', 'Programming', 'Womens', 'Test'])

</script>
<template>
  <div>
    <VRow justify="end">
      <h1 class="mt-4" style="padding-right: 8rem; font-size: 20px;">Components Setup</h1>
      <VCol cols="8">
        <VCard>
          <VCardTitle style="padding: 1rem;">Component Categories</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="dummyData" item-value="id" class="text-no-wrap billing-history-table">
              <!-- User -->
              <template #item.category="{ item }">
                <div class="d-flex align-center pt-2 pb-3">
                  <div class="d-flex flex-column">
                    {{ item.category }}
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
                <IconBtn size="small" @click="editUser(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteUser(item.id)" />
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewCategoryDrawerVisible = !isAddNewCategoryDrawerVisible">
                    Add Category
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
        <VCard class="mt-6">
          <VCardTitle style="padding: 1rem;">Component Units</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers2" :items="dummyData2" item-value="id" class="text-no-wrap billing-history-table">
              <!-- Unit -->
              <template #item.unit="{ item }">
                    {{ item.unit }}
              </template>

              <!-- Category  -->
              <template #item.category="{ item }">
                <VChip
                  v-if="isDefaultChipVisible"
                  closable
                  @click:close="isDefaultChipVisible = !isDefaultChipVisible"
                >
                  {{item.category}}
                </VChip>
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
                <IconBtn size="small" @click="editUser(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteUser(item.id)" />
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewUnitDrawerVisible = !isAddNewUnitDrawerVisible">
                    Add Unit
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
        <VCard class="mt-6">
          <VCardTitle style="padding: 1rem;">Component Custom Fields</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers3" :items="dummyData3" item-value="id" class="text-no-wrap billing-history-table">
              <!-- Active -->
              <template #item.active="{ item }">
                <VSwitch v-model="item.active"></VSwitch>
              </template>

              <!-- custom field -->
              <template #item.field="{ item }">
                {{ item.field }}
              </template>

              <!-- field type -->
              <template #item.type="{ item }">
                {{ item.type }}
              </template>

              <!-- internal  -->
              <template #item.internal="{ item }">
                <VSwitch v-model="item.internal"></VSwitch>
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
                  <VBtn variant="outlined" @click="isAddNewFieldDrawerVisible = !isAddNewFieldDrawerVisible">
                    Add Custom Field
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
        <VCard class="mt-6">
          <VCardTitle style="padding: 1rem;">Component Tags</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Add tags to use across components</VCardSubtitle>
          <VCombobox
            class="mt-5 px-4 mb-5"
            v-model="chips"
            chips
            clearable
            multiple
            closable-chips
            clear-icon="ri-close-circle-line"
            :items="items"
          />
        </VCard>
      </VCol>
      <CategoryDrawer
        v-model:isDrawerOpen="isAddNewCategoryDrawerVisible"
      />
      <UnitDrawer
        v-model:isDrawerOpen="isAddNewUnitDrawerVisible"
      />
      <FieldDrawer
        v-model:isDrawerOpen="isAddNewFieldDrawerVisible"
      />
    </VRow>
  </div>
</template>
