<script setup>
import SettingSampling from "@/views/pages/setting/workflow/sampling/index.vue"
import SettingSeasons from "@/views/pages/setting/workflow/seasons/index.vue"
import SettingQuality from "@/views/pages/setting/workflow/quality/index.vue"
import SettingTasks from "@/views/pages/setting/workflow/tasks/index.vue"

definePageMeta({
  layout: "setting",
  navActiveLink: 'setting-workflow-tab',
  key: 'tab',

})

const route = useRoute('setting-workflow-tab')

const activeTab = computed({
  get: () => route.params.tab,
  set: () => route.params.tab,
})

// tabs
const tabs = [
  {
    title: 'Sampling Stage',
    icon: 'ri-user-line',
    tab: 'sampling',
  },
  {
    title: 'Seasons',
    icon: 'ri-team-line',
    tab: 'seasons',
  },
  {
    title: 'Quality Control',
    icon: 'ri-computer-line',
    tab: 'quality',
  },
  {
    title: 'Tasks',
    icon: 'ri-link',
    tab: 'tasks',
  },
]
</script>

<template>
  <VRow class="ml-10 mt-2">
    <VCol cols="3">
      <h3 class="ml-2">Workflow Setup</h3>
      <VTabs
        v-model="activeTab"
        direction="vertical"
        class="mt-4"
      >
        <VTab
          v-for="item in tabs"
          :key="item.icon"
          :value="item.tab"
          :to="{ name: 'setting-workflow-tab', params: { tab: item.tab } }"
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
      <template v-if="activeTab === 'sampling'">
        <SettingSampling />
      </template>
      <template v-else-if="activeTab === 'seasons'">
        <SettingSeasons />
      </template>
      <template v-else-if="activeTab === 'quality'">
        <SettingQuality />
      </template>
      <template v-else-if="activeTab === 'tasks'">
        <SettingTasks />
      </template>
    </VCol>
  </VRow>
</template>
