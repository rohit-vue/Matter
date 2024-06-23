<script setup>
import SettingStyles from "@/views/pages/setting/styles/styles/index.vue"
import SettingMeasures from "@/views/pages/setting/styles/measures/index.vue"

definePageMeta({
  layout: "setting",
  navActiveLink: 'setting-styles-tab',
  key: 'tab',

})

const route = useRoute('setting-styles-tab')

const activeTab = computed({
  get: () => route.params.tab,
  set: () => route.params.tab,
})

// tabs
const tabs = [
  {
    title: 'Styles Settings',
    icon: 'ri-user-line',
    tab: 'styles',
  },
  {
    title: 'Points of Measure',
    icon: 'ri-team-line',
    tab: 'measures',
  },
]
</script>

<template>
  <VRow class="ml-10 mt-2">
    <VCol cols="3">
      <h3 class="ml-2">Styles Setup</h3>
      <VTabs
        v-model="activeTab"
        direction="vertical"
        class="mt-4"
      >
        <VTab
          v-for="item in tabs"
          :key="item.icon"
          :value="item.tab"
          :to="{ name: 'setting-styles-tab', params: { tab: item.tab } }"
        >
          <VIcon
            start
            :icon="item.icon"
          />
          {{ item.title }}
        </VTab>
      </VTabs>
    </VCol>

    <VCol cols="14" class="mt-5 mr-4">
      <template v-if="activeTab === 'styles'">
        <SettingStyles />
      </template>
      <template v-else-if="activeTab === 'measures'">
        <SettingMeasures />
      </template>
    </VCol>
  </VRow>
</template>
