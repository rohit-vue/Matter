<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const activeTab = ref('workflows'); // Initialize with default tab
const router = useRouter();

const navigateToTab = (tab: string) => {
  activeTab.value = tab;
  router.push({ name: 'setting-tab', params: { tab } });
};
</script>

<template>
  <!-- <div> -->
    <!-- Sidebar navigation -->
    <!-- <div class="sidebar">
      <ul>
        <li>
          <button @click="navigateToTab('workflows')" :class="{ active: activeTab === 'workflows' }">
            <span class="icon ri-user-line"></span>
            Workflows
          </button>
        </li>
        <li>
          <button @click="navigateToTab('styles')" :class="{ active: activeTab === 'styles' }">
            <span class="icon ri-team-line"></span>
            Styles
          </button>
        </li>
        <li>
          <button @click="navigateToTab('components')" :class="{ active: activeTab === 'components' }">
            <span class="icon ri-computer-line"></span>
            Components
          </button>
        </li>
        <li>
          <button @click="navigateToTab('documents')" :class="{ active: activeTab === 'documents' }">
            <span class="icon ri-link"></span>
            Documents
          </button>
        </li>
      </ul>
    </div> -->

    <!-- Main content area -->
    <!-- <div class="main-content"> -->
      <!-- Content based on activeTab -->
      <!-- <template v-if="activeTab === 'workflows'">
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
    </div> -->
  <!-- </div> -->


  <VCol cols="2" class="sidebar-container">
    <VCard style="background-color: inherit; box-shadow: none; margin-left: -1.6rem; margin-top: -0.5rem;">
      <VCardText style="background-color: inherit;">
        <VList style="background-color: inherit;">
          <VListItem class="vlist" link to="/setting/workflows/">
            <!-- <button @click="navigateToTab('styles')" :class="{ active: activeTab === 'styles' }"> -->
              <span class="icon ri-user-line"></span>
              Styles
            <!-- </button> -->
          </VListItem>
          <VListItem class="vlist" link to="/account-setting/company">
            <VIcon name="mdi-account" />
            <span>Company</span>
          </VListItem>
          <VListItem class="vlist" link to="/account-setting/team">
            <VIcon name="mdi-settings" />
            <span>Team</span>
          </VListItem>
          <VListItem class="vlist" link to="/account-setting/permissions">
            <VIcon name="mdi-settings" />
            <span>Permissions</span>
          </VListItem>
          <VListItem class="vlist" link to="/account-setting/notifications">
            <VIcon name="mdi-settings" />
            <span>Notifications</span>
          </VListItem>
          <VListItem class="vlist" link to="/account-setting/billing">
            <VIcon name="mdi-settings" />
            <span>Billing</span>
          </VListItem>
          <VListItem class="vlist" link to="/account-setting/security">
            <VIcon name="mdi-settings" />
            <span>Security</span>
          </VListItem>
          <VListItem class="vlist" link to="/account-setting/integrations">
            <VIcon name="mdi-settings" />
            <span>Integrations</span>
          </VListItem>
          <!-- Add more items here -->
        </VList>
      </VCardText>
    </VCard>
  </VCol>
</template>

<style lang="scss">
@use "assets/styles/styles.scss";

.sidebar {
  width: 200px;
  height: 100%;
  background-color: #f0f0f0;
  padding: 20px;
  position: fixed;
  top: 0;
  left: 0;
  overflow-y: auto;
}

.sidebar ul {
  list-style-type: none;
  padding: 0;
}

.sidebar li {
  margin-bottom: 10px;
}

.sidebar button {
  display: block;
  width: 100%;
  padding: 10px;
  text-align: left;
  border: none;
  background-color: transparent;
  cursor: pointer;
}

.sidebar button:hover {
  background-color: #ddd;
}

.sidebar .icon {
  margin-right: 10px;
}

.main-content {
  margin-left: 220px; /* Adjust as per sidebar width */
  padding: 20px;
}
</style>
