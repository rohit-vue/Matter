<template>
  <VContainer>
    <VRow justify="end">
      <VCol cols="9">
        <VCard>
          <VCardText class="permission-header">Permissions</VCardText>
          <VDivider/>
          <VCardText class="permission-header">Tasks</VCardText>
          <v-radio-group class="pl-5 mb-3">
            <v-radio label="Access to all tasks" value="one"></v-radio>
            <v-radio label="Grant access tasks individually" value="two"></v-radio>
            <v-radio label="No access to tasks" value="three"></v-radio>
          </v-radio-group>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5" label="Edit tasks"></VCheckbox>
          <VCheckbox class="pl-5 mb-10" label="Delete tasks"></VCheckbox>
          <VDivider/>
          <VCardText class="permission-header">Seasons</VCardText>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <v-radio label="Grant access tasks individually" class="pl-5" value="two"></v-radio>
          <VCheckbox class="pl-5 mb-5" label="Create new tasks"></VCheckbox>
          <v-radio label="Grant access tasks individually" class="pl-5" value="two"></v-radio>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <v-radio label="Grant access tasks individually" class="pl-5 mb-10" value="two"></v-radio>
          <VDivider/>
          <VCardText class="permission-header">Products</VCardText>
          <v-radio-group class="pl-5 mb-10">
            <v-radio label="Access to all tasks" value="one"></v-radio>
            <v-radio label="Grant access tasks individually" value="two"></v-radio>
            <v-radio label="No access to tasks" value="three"></v-radio>
          </v-radio-group>
          <VDivider/>
          <VCardText class="permission-header">Suppliers</VCardText>
          <v-radio-group class="pl-5 mb-3">
            <v-radio label="Access to all tasks" value="one"></v-radio>
            <v-radio label="Grant access tasks individually" value="two"></v-radio>
            </v-radio-group>
            <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
            <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
            <VCheckbox class="pl-5 mb-10" label="Create new tasks"></VCheckbox>
          <VDivider/>
          <VCardText class="permission-header">Components</VCardText>
          <v-radio-group class="pl-5 mb-3">
            <v-radio label="Grant access tasks individually" value="two"></v-radio>
            <v-radio label="Access to all tasks" value="one"></v-radio>
            <v-radio label="Grant access tasks individually" value="two"></v-radio>
            </v-radio-group>
            <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
            <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
            <VCheckbox class="pl-5 mb-10" label="Create new tasks"></VCheckbox>
            <VDivider/>
          <VCardText class="permission-header">Purchase Orders</VCardText>
          <v-radio-group class="pl-5 mb-3">
            <v-radio label="Grant access tasks individually" value="two"></v-radio>
            <v-radio label="Access to all tasks" value="one"></v-radio>
            <v-radio label="Grant access tasks individually" value="two"></v-radio>
          </v-radio-group>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5 mb-10" label="Create new tasks"></VCheckbox>
          <VDivider/>
          <VCardText class="permission-header">Sample Reviews</VCardText>
          <v-radio-group class="pl-5 mb-3">
            <v-radio label="Grant access tasks individually" value="two"></v-radio>
            <v-radio label="Access to all tasks" value="one"></v-radio>
            <v-radio label="Grant access tasks individually" value="two"></v-radio>
          </v-radio-group>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5 mb-10" label="Create new tasks"></VCheckbox>
          <VDivider/>
          <VCardText class="permission-header">Libraries</VCardText>
          <v-radio-group class="pl-5 mb-3">
            <v-radio label="Access to all tasks" value="one"></v-radio>
            <v-radio label="Grant access tasks individually" value="two"></v-radio>
          </v-radio-group>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5" label="Create new tasks"></VCheckbox>
          <VCheckbox class="pl-5 mb-10" label="Create new tasks"></VCheckbox>
        </VCard>
        <!-- button -->
        <div class="custom-btn">
          <v-btn variant="outlined" class="btn1">
            Discard
          </v-btn>
          <v-btn variant="tonal" class="btn2">
            Save Changes
          </v-btn>
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
