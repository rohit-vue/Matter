<template>
  <VContainer>
    <VRow justify="end">
      <VCol cols="9">
        <VCard>
          <v-row justify="space-between" align="center" class="mx-8 mt-2">
            <v-col class="d-flex align-center">
              <v-card-text class="permission-header">Integrations</v-card-text>
            </v-col>
            <v-col class="d-flex justify-end">
              <v-btn variant="tonal" class="btn3">
                Add Integrations
              </v-btn>
            </v-col>
          </v-row>
          <v-row justify="space-between" align="center" class="mx-8">
            <v-card-text class="permission-header">Google</v-card-text>
            <v-switch></v-switch>
          </v-row>
          <v-row justify="space-between" align="center" class="mx-8">
            <v-card-text class="permission-header">Midjourney</v-card-text>
            <v-switch></v-switch>
          </v-row>
          <v-row justify="space-between" align="center" class="mx-8">
            <v-card-text class="permission-header">Chat GPT</v-card-text>
            <v-switch></v-switch>
          </v-row>
          <v-row justify="space-between" align="center" class="mx-8">
            <v-card-text class="permission-header">Klaviyo</v-card-text>
            <v-switch></v-switch>
          </v-row>
          <v-row justify="space-between" align="center" class="mx-8">
            <v-card-text class="permission-header">Instagram</v-card-text>
            <v-switch></v-switch>
          </v-row>
        </VCard>
      </VCol>
    </VRow>
  </VContainer>
</template>
<script lang="ts" setup>
definePageMeta({
  layout: "account",
})
</script>
<style lang="scss">
@use "assets/styles/styles.scss";
</style>
