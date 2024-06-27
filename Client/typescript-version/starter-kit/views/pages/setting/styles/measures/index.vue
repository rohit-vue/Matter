<!-- eslint-disable @typescript-eslint/quotes -->
<script setup lang="ts">
import PomTopDrawer from "@/views/setting/stylesDrawers/PomTopDrawer.vue"
import PomBottomDrawer from "@/views/setting/stylesDrawers/PomBottomDrawer.vue"
import PomMiscDrawer from "@/views/setting/stylesDrawers/PomMiscDrawer.vue"

const isAddNewTopDrawerVisible = ref(false)
const isAddNewBottomDrawerVisible = ref(false)
const isAddNewMiscDrawerVisible = ref(false)
const editingTopId = ref<number | null>(null);
const editingBottomId = ref<number | null>(null);
const editingMiscId = ref<number | null>(null);

const headers = [
  { title: 'POM ID', key: 'POMId' },
  { title: 'Position', key: 'placement' },
  { title: 'POM', key: 'name' },
  { title: 'Description', key: 'description', sortable: false },
  { title: '+/-', key: 'tolerance', sortable: false },
  { title: 'Garment Type', key: 'type', sortable: false },
  { title: 'Default', key: 'default', sortable: false },
  { title: 'Setting', key: 'setting', sortable: false, },
]

const topData = ref([])
const bottomData = ref([])
const miscData = ref([])
const addTop = (newTop) => {
  if (editingTopId.value !== null) {
    const index = topData.value.findIndex(top => top.id === editingTopId.value)
    if (index !== -1) {
      topData.value[index] = newTop;
    }
  } else {
    topData.value.push(newTop);
  }
  editingTopId.value = null;
}
const addBottom = (newBottom) => {
  if (editingBottomId.value !== null) {
    const index = bottomData.value.findIndex(bottom => bottom.id === editingBottomId.value)
    if (index !== -1) {
      bottomData.value[index] = newBottom;
    }
  } else {
    bottomData.value.push(newBottom);
  }
  editingBottomId.value = null;
}
const addMisc = (newMisc) => {
  if (editingMiscId.value !== null) {
    const index = miscData.value.findIndex(misc => misc.id === editingMiscId.value)
    if (index !== -1) {
      miscData.value[index] = newMisc;
    }
  } else {
    miscData.value.push(newMisc);
  }
  editingMiscId.value = null;
}

const editTop = (top) => {
  editingTopId.value = top.id
  isAddNewTopDrawerVisible.value = true;
}
const editBottom = (bottom) => {
  editingBottomId.value = bottom.id
  isAddNewBottomDrawerVisible.value = true;
}
const editMisc = (misc) => {
  editingMiscId.value = misc.id
  isAddNewMiscDrawerVisible.value = true;
}

const deleteTop = (id) => {
  topData.value = topData.value.filter(top => top.id !== id);
}
const deleteBottom = (id) => {
  bottomData.value = bottomData.value.filter(bottom => bottom.id !== id);
}
const deleteMisc = (id) => {
  miscData.value = miscData.value.filter(misc => misc.id !== id);
}
</script>

<template>
  <div>
    <VRow justify="end">
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Points of Measure - Tops</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Choose where you ship and how much you charge for shipping at checkout.</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="topData" item-value="id" class="text-no-wrap">
              <!-- ID -->
              <template #item.POMId="{ item }">
                {{ item.POMId }}
              </template>

              <!-- Position -->
              <template #item.placement="{ item }">
                <VChip>
                  {{ item.placement }}
                </VChip>
              </template>

              <!-- POM -->
              <template #item.name="{ item }">
                {{ item.name }}
              </template>

              <!-- Description -->
              <template #item.description="{ item }">
                {{ item.description }}
              </template>

              <!-- Tolerance -->
              <template #item.tolerance="{ item }">
                {{ item.tolerance }}
              </template>

              <!-- Default -->
              <template #item.default="{ item }">
                <VSwitch v-model="item.default"></VSwitch>
              </template>

              <!-- Setting -->
              <template #item.setting="{ item }">
                <IconBtn size="small" @click="editTop(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteTop(item.id)" />
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
            <VDataTable :headers="headers" :items="bottomData" item-value="id" class="text-no-wrap billing-history-table">
              <!-- ID -->
              <template #item.POMId="{ item }">
                {{ item.POMId }}
              </template>

              <!-- Position -->
              <template #item.placement="{ item }">
                <VChip>
                  {{ item.placement }}
                </VChip>
              </template>

              <!-- POM -->
              <template #item.name="{ item }">
                {{ item.name }}
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
                <IconBtn size="small" @click="editBottom(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteBottom(item.id)" />
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewBottomDrawerVisible = !isAddNewBottomDrawerVisible">
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
            <VDataTable :headers="headers" :items="miscData" item-value="id" class="text-no-wrap">
              <!-- ID -->
              <template #item.POMId="{ item }">
                {{ item.POMId }}
              </template>

              <!-- Position -->
              <template #item.placement="{ item }">
                <VChip>
                  {{ item.placement }}
                </VChip>
              </template>

              <!-- POM -->
              <template #item.name="{ item }">
                {{ item.name }}
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
                <IconBtn size="small" @click="editMisc(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteMisc(item.id)" />
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewMiscDrawerVisible = !isAddNewMiscDrawerVisible">
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
        :editing-top-id="editingTopId"
        :top-data="topData"
        @add-top="addTop"
      />
      <PomBottomDrawer
        v-model:isDrawerOpen="isAddNewBottomDrawerVisible"
        :editing-bottom-id="editingBottomId"
        :bottom-data="bottomData"
        @add-bottom="addBottom"
      />
      <PomMiscDrawer
        v-model:isDrawerOpen="isAddNewMiscDrawerVisible"
        :editing-misc-id="editingMiscId"
        :misc-data="miscData"
        @add-misc="addMisc"
      />
    </VRow>
  </div>
</template>

<style lang="scss">

</style>
