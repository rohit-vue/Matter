<!-- eslint-disable @typescript-eslint/quotes -->
<script setup lang="ts">
import { ref } from 'vue'
import CategoryDrawer from "@/views/setting/stylesDrawers/CategoryDrawer.vue"
import SizeDrawer from "@/views/setting/stylesDrawers/SizeDrawer.vue"
import FieldDateDrawer from "@/views/setting/stylesDrawers/FieldDateDrawer.vue"
import FieldTextDrawer from "@/views/setting/stylesDrawers/FieldTextDrawer.vue"
import FieldDividerDrawer from "@/views/setting/stylesDrawers/FieldDividerDrawer.vue"
import FieldValueDrawer from "@/views/setting/stylesDrawers/FieldValueDrawer.vue"
import FieldNumberDrawer from "@/views/setting/stylesDrawers/FieldNumberDrawer.vue"
import FieldCheckboxDrawer from "@/views/setting/stylesDrawers/FieldCheckboxDrawer.vue"

const isAddNewCategoryDrawerVisible = ref(false)
const isAddNewSizeDrawerVisible = ref(false)
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

definePageMeta({
  layout: 'setting',
})

const headers = [
  { title: 'Name', key: 'name', width: '60%', sortable: false, },
  { title: 'Default', key: 'default', sortable: false, },
  { title: 'Setting', key: 'setting', sortable: false, },
]

const headers2 = [
  { title: 'Range Name', key: 'range', width: '44%', sortable: false, },
  { title: 'Sizes', key: 'sizes', sortable: false, },
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
  { id: 1, name: 'Category A', active: true, default: false },
  { id: 2, name: 'Category B', active: false, default: true },
  { id: 3, name: 'Category C', active: true, default: false },
])

const dummyData2 = ref([
  { id: 1, range: 'Category A', sizes: "XL,S,M", default: false },
  { id: 2, range: 'Category B', sizes: "S,M,L", default: true },
  { id: 3, range: 'Category C', sizes: "M,XL", default: false },
])

const dummyData3 = ref([
  { id: 1, active: true, field: 'Category A', type: "XL,S,M", internal: false },
  { id: 2, active: true, field: 'Category B', type: "S,M,L", internal: true },
  { id: 3, active: true, field: 'Category C', type: "M,XL", internal: false },
])

const chips = ref(['Programming', 'Playing games', 'Sleeping'])
</script>

<template>
  <div>
    <VRow justify="end" style="margin-right: -5rem;">
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Purchase Order Templates</VCardTitle>
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
        <VCard class="mt-6">
          <VCardTitle style="padding: 1rem;">Packing List Templates</VCardTitle>
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
        <VCard class="mt-6">
          <VCardTitle style="padding: 1rem;">Commercial invoice Templates</VCardTitle>
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
      </VCol>
      <CategoryDrawer
        v-model:isDrawerOpen="isAddNewCategoryDrawerVisible"
      />
      <SizeDrawer
        v-model:isDrawerOpen="isAddNewSizeDrawerVisible"
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
