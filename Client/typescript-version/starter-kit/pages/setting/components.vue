<script setup lang="ts">
definePageMeta({
  layout: "setting",
})

import CategoryDrawer from '@/views/setting/componentDrawer/CategoryDrawer.vue';
import UnitDrawer from '@/views/setting/componentDrawer/UnitDrawer.vue';
import FieldDateDrawer from "@/views/setting/componentDrawer/FieldDateDrawer.vue"
import FieldTextDrawer from "@/views/setting/componentDrawer/FieldTextDrawer.vue"
import FieldDividerDrawer from "@/views/setting/componentDrawer/FieldDividerDrawer.vue"
import FieldValueDrawer from "@/views/setting/componentDrawer/FieldValueDrawer.vue"
import FieldNumberDrawer from "@/views/setting/componentDrawer/FieldNumberDrawer.vue"
import FieldCheckboxDrawer from "@/views/setting/componentDrawer/FieldCheckboxDrawer.vue"
import { ref } from 'vue';

const isAddNewCategoryDrawerVisible = ref(false);
const isAddNewUnitDrawerVisible = ref(false);
const isAddNewFieldDateDrawerVisible = ref(false)
const isAddNewFieldTextDrawerVisible = ref(false)
const isAddNewFieldDividerDrawerVisible = ref(false)
const isAddNewFieldValueDrawerVisible = ref(false)
const isAddNewFieldNumberDrawerVisible = ref(false)
const isAddNewFieldCheckboxDrawerVisible = ref(false)
const isDialogVisible = ref(false)
const fieldType = ref('')
console.log("valueeeeeee: ",fieldType)

const typeField = ref<string[]>([
  'Date',
  'List of Values',
  'Divider',
  'Text',
  'Checkbox',
  'Number',
]);

const handleClick = () => {
  isDialogVisible.value = false;
  if(fieldType.value == 'Date'){
    isAddNewFieldDateDrawerVisible.value = !isAddNewFieldDateDrawerVisible.value;
  }else if(fieldType.value == 'List of Values'){
    isAddNewFieldValueDrawerVisible.value = !isAddNewFieldValueDrawerVisible.value;
  }else if(fieldType.value == 'Divider'){
    isAddNewFieldDividerDrawerVisible.value = !isAddNewFieldDividerDrawerVisible.value;
  }else if(fieldType.value == 'Text'){
    isAddNewFieldTextDrawerVisible.value = !isAddNewFieldTextDrawerVisible.value;
  }else if(fieldType.value == 'Checkbox'){
    isAddNewFieldCheckboxDrawerVisible.value = !isAddNewFieldCheckboxDrawerVisible.value;
  }else if(fieldType.value == 'Number'){
    isAddNewFieldNumberDrawerVisible.value = !isAddNewFieldNumberDrawerVisible.value;
  }
};

const headers = [
  { title: 'Category', key: 'category', width: '40%', sortable: false },
  { title: 'Active', key: 'active', sortable: false },
  { title: 'Default', key: 'default', sortable: false },
  { title: 'Setting', key: 'setting', sortable: false },
]

const headers2 = [
  { title: 'Unit', key: 'unit', sortable: false, },
  { title: 'Category', key: 'category', width: '35%', sortable: false },
  { title: 'Active', key: 'active', sortable: false },
  { title: 'Default', key: 'default', sortable: false },
  { title: 'Setting', key: 'setting', sortable: false },
]

const headers3 = [
  { title: 'Active', key: 'active', width: '10%', sortable: false },
  { title: 'Custom Field', key: 'field', sortable: false },
  { title: 'Field Type', key: 'type', sortable: false },
  { title: 'Internal', key: 'internal', sortable: false },
  { title: 'Setting', key: 'setting', sortable: false },
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
])

const dummyData3 = ref([
  { id: 1, active: true, field: 'Weight', type: "XL,S,M", internal: false },
  { id: 2, active: true, field: 'Finish', type: "S,M,L", internal: true },
  { id: 3, active: false, field: 'Stock Service', type: "M,XL", internal: false },
]);

const isDefaultChipVisible = ref(true)
const chips = ref(['Mens', 'Womens', 'Test'])
</script>

<template>
  <div>
    <VRow justify="end" class="mt-2">
      <h1 class="mt-4" style="padding-right: 8rem; font-size: 20px;">Components Setup</h1>
      <VCol cols="8">
        <VCard>
          <VCardTitle style="padding: 1rem;">Component Categories</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="dummyData" item-value="id" class="text-no-wrap">
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
                <VDialog
                  v-model="isDialogVisible"
                  max-width="600"
                >
                  <!-- Dialog Activator -->
                  <template #activator="{ props }">
                    <div class="d-flex justify-start py-2">
                      <VBtn v-bind="props" variant="outlined">
                        Add Custom Field
                      </VBtn>
                    </div>
                  </template>

                  <!-- Dialog Content -->
                  <VCard title="Select Custom Field">
                    <DialogCloseBtn
                      variant="text"
                      size="default"
                      @click="isDialogVisible = false"
                    />

                    <VCardText>
                      <VRow>
                        <VCol
                          cols="12"
                        >
                          <VSelect
                            v-model="fieldType"
                            :rules="[requiredValidator]"
                            :items="typeField"
                            label="Field Type"
                            placeholder="Choose your field"
                          />
                        </VCol>
                        
                      </VRow>
                    </VCardText>

                    <VCardActions class="mb-2 mr-3">
                      <VSpacer />
                      <VBtn variant="outlined" @click="isDialogVisible.value = false">
                        Cancel
                      </VBtn>
                      <VBtn variant="tonal" class="btn" @click="handleClick">
                        Save Changes
                      </VBtn>
                    </VCardActions>
                  </VCard>
                </VDialog>
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
          />
        </VCard>
      </VCol>
      <CategoryDrawer
        v-model:isDrawerOpen="isAddNewCategoryDrawerVisible"
      />
      <UnitDrawer
        v-model:isDrawerOpen="isAddNewUnitDrawerVisible"
      />
      <FieldDateDrawer
        v-model:isDrawerOpen="isAddNewFieldDateDrawerVisible"
      />
      <FieldValueDrawer
        v-model:isDrawerOpen="isAddNewFieldValueDrawerVisible"
      />
      <FieldDividerDrawer
        v-model:isDrawerOpen="isAddNewFieldDividerDrawerVisible"
      />
      <FieldTextDrawer
        v-model:isDrawerOpen="isAddNewFieldTextDrawerVisible"
      />
      <FieldCheckboxDrawer
        v-model:isDrawerOpen="isAddNewFieldCheckboxDrawerVisible"
      />
      <FieldNumberDrawer
        v-model:isDrawerOpen="isAddNewFieldNumberDrawerVisible"
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
