<script setup>
import SettingDocumentStyleTemplate from "@/views/pages/setting/documents/styleTemplate/index.vue"
import SettingDocumentComponentTemplate from "@/views/pages/setting/documents/componentTemplate/index.vue"
import SettingDocumentSupplyTemplate from "@/views/pages/setting/documents/supplyTemplate/index.vue"

definePageMeta({
  layout: "setting",
  navActiveLink: 'setting-documents-tab',
  key: 'tab',

})

const route = useRoute('setting-documents-tab')

const activeTab = computed({
  get: () => route.params.tab,
  set: () => route.params.tab,
})

// tabs
const tabs = [
  {
    title: 'Style Templates',
    icon: 'ri-user-line',
    tab: 'style-template',
  },
  {
    title: 'Component Templates',
    icon: 'ri-team-line',
    tab: 'component-template',
  },
  {
    title: 'Supply Chain Templates',
    icon: 'ri-team-line',
    tab: 'supply-template',
  },
]
</script>

<template>
  <VRow class="ml-10 mt-2">
    <VCol cols="3">
      <h3 class="ml-2">Documents Settings</h3>
      <VTabs
        v-model="activeTab"
        direction="vertical"
        class="mt-4"
      >
        <VTab
          v-for="item in tabs"
          :key="item.icon"
          :value="item.tab"
          :to="{ name: 'setting-documents-tab', params: { tab: item.tab } }"
        >
          <VIcon
            start
            :icon="item.icon"
          />
          {{ item.title }}
        </VTab>
      </VTabs>
    </VCol>

    <VCol cols="8" class="mt-5 mr-4">
      <template v-if="activeTab === 'style-template'">
        <SettingDocumentStyleTemplate />
      </template>
      <template v-else-if="activeTab === 'component-template'">
        <SettingDocumentComponentTemplate />
      </template>
      <template v-else-if="activeTab === 'supply-template'">
        <SettingDocumentSupplyTemplate />
      </template>
    </VCol>
  </VRow>
</template>
