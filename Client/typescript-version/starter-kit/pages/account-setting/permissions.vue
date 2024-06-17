<template>
  <VContainer>
    <VRow justify="end">
      <VCol cols="9">
        <VCard>
          <VCardText class="permission-header">Permissions</VCardText>
          <VDivider />
          <VCardText class="permission-header">Tasks</VCardText>
          <VRadioGroup class="pl-5 mb-3">
            <VRadio label="Access to all tasks" value="one"></VRadio>
            <VRadio label="Grant access tasks individually" value="two"></VRadio>
            <VRadio label="No access to tasks" value="three"></VRadio>
          </VRadioGroup>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5" label="Edit tasks"></VCheckbox>
          <VCheckbox class="pl-5 mb-10" label="Delete tasks"></VCheckbox>
          <VDivider />
          <VCardText class="permission-header">Seasons</VCardText>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VRadio label="Grant access tasks individually" class="pl-5" value="two"></VRadio>
          <VCheckbox class="pl-5 mb-5" label="Create new tasks"></VCheckbox>
          <VRadio label="Grant access tasks individually" class="pl-5" value="two"></VRadio>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VRadio label="Grant access tasks individually" class="pl-5 mb-10" value="two"></VRadio>
          <VDivider />
          <VCardText class="permission-header">Products</VCardText>
          <VRadioGroup class="pl-5 mb-10">
            <VRadio label="Access to all tasks" value="one"></VRadio>
            <VRadio label="Grant access tasks individually" value="two"></VRadio>
            <VRadio label="No access to tasks" value="three"></VRadio>
          </VRadioGroup>
          <VDivider />
          <VCardText class="permission-header">Suppliers</VCardText>
          <VRadioGroup class="pl-5 mb-3">
            <VRadio label="Access to all tasks" value="one"></VRadio>
            <VRadio label="Grant access tasks individually" value="two"></VRadio>
          </VRadioGroup>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5 mb-10" label="Create new tasks"></VCheckbox>
          <VDivider />
          <VCardText class="permission-header">Components</VCardText>
          <VRadioGroup class="pl-5 mb-3">
            <VRadio label="Grant access tasks individually" value="two"></VRadio>
            <VRadio label="Access to all tasks" value="one"></VRadio>
            <VRadio label="Grant access tasks individually" value="two"></VRadio>
          </VRadioGroup>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5 mb-10" label="Create new tasks"></VCheckbox>
          <VDivider />
          <VCardText class="permission-header">Purchase Orders</VCardText>
          <VRadioGroup class="pl-5 mb-3">
            <VRadio label="Grant access tasks individually" value="two"></VRadio>
            <VRadio label="Access to all tasks" value="one"></VRadio>
            <VRadio label="Grant access tasks individually" value="two"></VRadio>
          </VRadioGroup>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5 mb-10" label="Create new tasks"></VCheckbox>
          <VDivider />
          <VCardText class="permission-header">Sample Reviews</VCardText>
          <VRadioGroup class="pl-5 mb-3">
            <VRadio label="Grant access tasks individually" value="two"></VRadio>
            <VRadio label="Access to all tasks" value="one"></VRadio>
            <VRadio label="Grant access tasks individually" value="two"></VRadio>
          </VRadioGroup>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5 mb-10" label="Create new tasks"></VCheckbox>
          <VDivider />
          <VCardText class="permission-header">Libraries</VCardText>
          <VRadioGroup class="pl-5 mb-3">
            <VRadio label="Access to all tasks" value="one"></VRadio>
            <VRadio label="Grant access tasks individually" value="two"></VRadio>
          </VRadioGroup>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5 mb-10" label="Create new tasks"></VCheckbox>
        </VCard>
        <!-- button -->
        <div class="custom-btn">
          <VBtn variant="outlined" class="btn1">
            Discard
          </VBtn>
          <VBtn variant="tonal" class="btn2">
            Save Changes
          </VBtn>
        </div>
      </VCol>
    </VRow>
  </VContainer>
</template>
<script setup lang="ts">
definePageMeta({
  layout: "account",
})
</script>

<style lang="scss">
@use "assets/styles/styles.scss";
</style>
