<script lang="ts" setup>
</script>

<template>
<VList class="horizontal-list" style="background-color: inherit;">
  <VListItem class="vlist" link to="/setting/workflow">
    <VIcon icon='ri-user-line' class="mr-2" size="18px"/>
    <span>Workflows</span>
  </VListItem>
  <VListItem class="vlist" link to="/setting/styles">
    <VIcon icon='ri-team-line' class="mr-2" size="18px"/>
    <span>Styles</span>
  </VListItem>
  <VListItem class="vlist" link to="/setting/components">
    <VIcon icon='ri-computer-line' class="mr-2" size="18px"/>
    <span>Components</span>
  </VListItem>
  <VListItem class="vlist" link to="/setting/documents">
    <VIcon icon='ri-link' class="mr-2" size="18px"/>
    <span>Documents</span>
  </VListItem>
</VList>
</template>

<style lang="scss">
@use "assets/styles/styles.scss";
.horizontal-list {
  display: flex;
  flex-direction: row;
}
</style>
