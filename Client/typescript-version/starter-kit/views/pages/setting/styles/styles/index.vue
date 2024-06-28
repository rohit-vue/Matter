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
  { title: 'Category', key: 'category', width: '40%', sortable: false, },
  { title: 'Active', key: 'active', sortable: false, },
  { title: 'Default', key: 'default', sortable: false, },
  { title: 'Setting', key: 'setting', sortable: false, },
]

const headers2 = [
  { title: 'Range Name', key: 'range', width: '35%', sortable: false, },
  { title: 'Sizes', key: 'category', sortable: false, },
  { title: 'Default', key: 'default', sortable: false, },
  { title: 'Setting', key: 'setting', sortable: false, },
]

const headers3 = [
  { title: 'Active', key: 'active', width: '10%', sortable: false, },
  { title: 'Custom Field', key: 'fieldName', sortable: false, },
  { title: 'Field Type', key: 'type', sortable: false, },
  { title: 'Internal', key: 'internal', sortable: false, },
  { title: 'Setting', key: 'setting', sortable: false, },
]

const categoryData = ref([]);
const unitData = ref([]);
const fieldData = ref([]);

const editingCategoryId = ref<number | null>(null);
const editingUnitId = ref<number | null>(null);
const editingFieldId = ref<number | null>(null);

const addCategory = (newCategory) => {
  if (editingCategoryId.value !== null) {
    const index = categoryData.value.findIndex(category => category.id === editingCategoryId.value);
    if (index !== -1) {
      categoryData.value[index] = newCategory;
    }
  } else {
    categoryData.value.push(newCategory);
  }
  editingCategoryId.value = null;
}
const addUnit = (newUnit) => {
  if (editingUnitId.value !== null) {
    const index = unitData.value.findIndex(unit => unit.id === editingUnitId.value);
    if (index !== -1) {
      unitData.value[index] = newUnit;
    }
  } else {
    unitData.value.push(newUnit);
  }
  editingUnitId.value = null;
}
const addField = (newField) => {
  if (editingFieldId.value !== null) {
    const index = fieldData.value.findIndex(unit => unit.id === editingFieldId.value);
    if (index !== -1) {
      fieldData.value[index] = newField;
    }
  } else {
    fieldData.value.push(newField);
  }
  editingFieldId.value = null;
}

const editCategory = (category) => {
  editingCategoryId.value = category.id;
  isAddNewCategoryDrawerVisible.value = true;
}
const editUnit = (unit) => {
  editingUnitId.value = unit.id;
  isAddNewSizeDrawerVisible.value = true;
}
const editField = (field) => {
  if(field.type == 'Date'){
    editingFieldId.value = field.id;
    isAddNewFieldDateDrawerVisible.value = true;
  }else if(field.type == 'List of Values'){
    editingFieldId.value = field.id;
    isAddNewFieldValueDrawerVisible.value = true;
  }else if(field.type == 'Divider'){
    editingFieldId.value = field.id;
    isAddNewFieldDividerDrawerVisible.value = true;
  }else if(field.type == 'Text'){
    editingFieldId.value = field.id;
    isAddNewFieldTextDrawerVisible.value = true;
  }else if(field.type == 'Checkbox'){
    editingFieldId.value = field.id;
    isAddNewFieldCheckboxDrawerVisible.value = true;
  }else if(field.type == 'Number'){
    editingFieldId.value = field.id;
    isAddNewFieldNumberDrawerVisible.value = true;
  }
}

const deleteCategory = (id) => {
  categoryData.value = categoryData.value.filter(category => category.id !== id);
}
const deleteUnit = (id) => {
  unitData.value = unitData.value.filter(unit => unit.id !== id);
}
const deleteField = (id) => {
  fieldData.value = fieldData.value.filter(unit => unit.id !== id);
}
</script>

<template>
  <div>
    <VRow justify="end">
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Styles Categories</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="categoryData" item-value="id" class="text-no-wrap billing-history-table">
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
                <IconBtn size="small" @click="editCategory(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteCategory(item.id)"/>
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
          <VCardTitle style="padding: 1rem;">Styles Size Ranges</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers2" :items="unitData" item-value="id" class="text-no-wrap billing-history-table">
              <!-- Range -->
              <template #item.range="{ item }">
                <div class="d-flex align-center pt-2 pb-3">
                  <div class="d-flex flex-column">
                    {{ item.range }}
                  </div>
                </div>
              </template>

              <!-- Sizes -->
              <template #item.category="{ item }">
                <div class="chip-wrapper">
                  <VChip
                    v-for="(categoryItem, index) in item.category"
                    :key="index"
                  >
                    {{ categoryItem }}
                  </VChip>
                </div>
              </template>

              <!-- Default -->
              <template #item.default="{ item }">
                <VCheckbox v-model="item.default" />
              </template>

              <!-- Setting -->
              <template #item.setting="{ item }">
                <IconBtn size="small" @click="editUnit(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteUnit(item.id)" />
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewSizeDrawerVisible = !isAddNewSizeDrawerVisible">
                    Add Size Range
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
        <VCard class="mt-6">
          <VCardTitle style="padding: 1rem;">Styles Custom Fields</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers3" :items="fieldData" item-value="id" class="text-no-wrap billing-history-table">
              <!-- Active -->
              <template #item.active="{ item }">
                <VSwitch v-model="item.active"></VSwitch>
              </template>

              <!-- custom field -->
              <template #item.fieldName="{ item }">
                {{ item.fieldName }}
              </template>

              <!-- fieldName type -->
              <template #item.type="{ item }">
                {{ item.type }}
              </template>

              <!-- internal  -->
              <template #item.internal="{ item }">
                <VSwitch v-model="item.internal"></VSwitch>
              </template>

              <!-- Setting -->
              <template #item.setting="{ item }">
                <IconBtn size="small" @click="editField(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteField(item.id)" />
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
          <VCardTitle style="padding: 1rem;">Styles Tags</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Add tags to use on your styles</VCardSubtitle>
          <VCombobox
            class="mt-5 mb-5 px-4"
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
        :editing-category-id="editingCategoryId"
        :category-data="categoryData"
        @add-category="addCategory"     
      />
      <SizeDrawer
        v-model:isDrawerOpen="isAddNewSizeDrawerVisible"
        :editing-unit-id="editingUnitId"
        :unit-data="unitData"
        @add-unit="addUnit"
      />
      <FieldDateDrawer
        v-model:isDrawerOpen="isAddNewFieldDateDrawerVisible"
        :editing-field-id="editingFieldId"
        :field-data="fieldData"
        @add-field="addField"
      />
      <FieldValueDrawer
        v-model:isDrawerOpen="isAddNewFieldValueDrawerVisible"
        :editing-field-id="editingFieldId"
        :field-data="fieldData"
        @add-field="addField"
      />
      <FieldDividerDrawer
        v-model:isDrawerOpen="isAddNewFieldDividerDrawerVisible"
        :editing-field-id="editingFieldId"
        :field-data="fieldData"
        @add-field="addField"
      />
      <FieldTextDrawer
        v-model:isDrawerOpen="isAddNewFieldTextDrawerVisible"
        :editing-field-id="editingFieldId"
        :field-data="fieldData"
        @add-field="addField"
      />
      <FieldCheckboxDrawer
        v-model:isDrawerOpen="isAddNewFieldCheckboxDrawerVisible"
        :editing-field-id="editingFieldId"
        :field-data="fieldData"
        @add-field="addField"
      />
      <FieldNumberDrawer
        v-model:isDrawerOpen="isAddNewFieldNumberDrawerVisible"
        :editing-field-id="editingFieldId"
        :field-data="fieldData"
        @add-field="addField"
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
  padding: 0.5rem 0px;
  gap: 8px; /* Add some space between the chips */
}
</style>
