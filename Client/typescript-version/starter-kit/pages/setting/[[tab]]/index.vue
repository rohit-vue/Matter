<script setup>
import SettingWorkflows from '@/views/pages/setting/workflows/index.vue'
import SettingStyles from '@/views/pages/setting/styles/index.vue'
import SettingComponents from '@/views/pages/setting/components/index.vue'
import SettingDocuments from '@/views/pages/setting/documents/index.vue'

definePageMeta({
  navActiveLink: 'setting-tab',
  key: 'tab',

})

const route = useRoute('setting-tab')

const activeTab = computed({
  get: () => route.params.tab,
  set: () => route.params.tab,
})

// tabs
const tabs = [
  {
    title: 'Workflows',
    icon: 'ri-user-line',
    tab: 'workflows',
  },
  {
    title: 'Styles',
    icon: 'ri-team-line',
    tab: 'styles',
  },
  {
    title: 'Components',
    icon: 'ri-computer-line',
    tab: 'components',
  },
  {
    title: 'Documents',
    icon: 'ri-link',
    tab: 'documents',
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
        :to="{ name: 'setting-tab', params: { tab: item.tab } }"
      >
        <VIcon
          start
          :icon="item.icon"
        />
        {{ item.title }}
      </VTab>
    </VTabs>

    <div class="mt-5">
      <template v-if="activeTab === 'workflows'">
        <SettingWorkflows />
      </template>
      <template v-else-if="activeTab === 'styles'">
        <SettingStyles />
      </template>
      <template v-else-if="activeTab === 'components'">
        <SettingComponents />
      </template>
      <template v-else-if="activeTab === 'documents'">
        <SettingDocuments />
      </template>
    </div>
  </div>
</template>
