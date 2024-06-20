<script setup lang="ts">
import { ref } from 'vue';

// const selectedRole = ref<string | null>(null);

const headers = [
  { title: 'Category', key: 'category', width: '40%', sortable: false, },
  { title: 'Active', key: 'active', sortable: false, },
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
  { id: 1, category: 'Category A', active: true, default: false },
  { id: 2, category: 'Category B', active: false, default: true },
  { id: 3, category: 'Category C', active: true, default: false },
]);

const dummyData2 = ref([
  { id: 1, range: 'Category A', sizes: "XL,S,M", default: false },
  { id: 2, range: 'Category B', sizes: "S,M,L", default: true },
  { id: 3, range: 'Category C', sizes: "M,XL", default: false },
]);

const dummyData3 = ref([
  { id: 1, active: '2', field: 'Category A', type: "XL,S,M", internal: false },
  { id: 2, active: '2', field: 'Category B', type: "S,M,L", internal: true },
  { id: 3, active: '2', field: 'Category C', type: "M,XL", internal: false },
]);

const chips = ref(['Programming', 'Playing games', 'Sleeping'])
const items = ref(['Streaming', 'Eating', 'Programming', 'Playing games', 'Sleeping'])

</script>
<template>
  <div>
    <VRow justify="end">
      <h1 class="mt-4" style="padding-right: 11rem; font-size: 20px;">Styles Setup</h1>
      <VCol cols="8">
        <VCard>
          <VCardTitle style="padding: 1rem;">Styles Categories</VCardTitle>
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
                  <VBtn variant="outlined" @click="isAddCustomerDrawerOpen = !isAddCustomerDrawerOpen">
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
            <VDataTable :headers="headers2" :items="dummyData2" item-value="id" class="text-no-wrap billing-history-table">
              <!-- Range -->
              <template #item.range="{ item }">
                <div class="d-flex align-center pt-2 pb-3">
                  <div class="d-flex flex-column">
                    {{ item.range }}
                  </div>
                </div>
              </template>

              <!-- Sizes -->
              <template #item.sizes="{ item }">
                {{ item.sizes }}
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
                  <VBtn variant="outlined" @click="isAddCustomerDrawerOpen = !isAddCustomerDrawerOpen">
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
            <VDataTable :headers="headers3" :items="dummyData3" item-value="id" class="text-no-wrap billing-history-table">
              <!-- Active -->
              <template #item.active="{ item }">
                {{ item.active }}
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
                  <VBtn variant="outlined" @click="isAddCustomerDrawerOpen = !isAddCustomerDrawerOpen">
                    Add Custom Field
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
        <VCard class="mt-6">
          <VCardTitle style="padding: 1rem;">Styles Tags</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Add tags to use on your styles</VCardSubtitle>
          <VCombobox
            class="mt-5 mb-5 px-4"
            v-model="chips"
            chips
            clearable
            multiple
            closable-chips
            clear-icon="ri-close-circle-line"
            :items="items"
          />
          <div class="d-flex justify-start py-2 mx-4">
            <VBtn variant="outlined" @click="isAddCustomerDrawerOpen = !isAddCustomerDrawerOpen">
              Add Tags
            </VBtn>
          </div>
        </VCard>
      </VCol>
    </VRow>
  </div>
</template>
