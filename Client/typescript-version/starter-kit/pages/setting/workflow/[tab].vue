<script setup>
import SettingSampling from "@/views/pages/setting/sampling/index.vue"
import SettingSeasons from "@/views/pages/setting/seasons/index.vue"
import SettingQuality from "@/views/pages/setting/quality/index.vue"
import SettingTasks from "@/views/pages/setting/tasks/index.vue"

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
    title: 'Sampling',
    icon: 'ri-user-line',
    tab: 'sampling',
  },
  {
    title: 'Seasons',
    icon: 'ri-team-line',
    tab: 'seasons',
  },
  {
    title: 'Quality',
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
  <div>
    <VTabs
      v-model="activeTab"
      class="v-tabs-pill"
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

    <div class="mt-5">
      <template v-if="activeTab === 'sampling'">
        <SettingSampling/>
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
    </div>
  </div>
</template>
