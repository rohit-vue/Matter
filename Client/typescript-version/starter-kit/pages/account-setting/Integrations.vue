<template>
  <VContainer>
    <VRow justify="end">
      <VCol cols="9">
        <VCard>
          <VRow justify="space-between" align="center" class="mx-8 mt-2">
            <VCol class="d-flex align-center">
              <VCardText class="permission-header">Integrations</VCardText>
            </VCol>
            <VCol class="d-flex justify-end">
              <VBtn variant="tonal" class="btn3">
                Add Integrations
              </VBtn>
            </VCol>
          </VRow>
          <VRow justify="space-between" align="center" class="mx-8">
            <img src="@/assets/images/icons/brands/google.png" alt="Chat GPT" class="mr-2" />
            <VCardText class="permission-header">Google</VCardText>
            <VSwitch></VSwitch>
          </VRow>
          <VRow justify="space-between" align="center" class="mx-8">
            <img src="@/assets/images/icons/brands/slack.png" alt="Chat GPT" class="mr-2" />
            <VCardText class="permission-header">Midjourney</VCardText>
            <VSwitch></VSwitch>
          </VRow>
          <VRow justify="space-between" align="center" class="mx-8">
            <img src="@/assets/images/icons/brands/github.png" alt="Chat GPT" class="mr-2" />
            <VCardText class="permission-header">Chat GPT</VCardText>
            <VSwitch></VSwitch>
          </VRow>
          <VRow justify="space-between" align="center" class="mx-8">
            <img src="@/assets/images/icons/brands/laravel.png" alt="Chat GPT" class="mr-2" />
            <VCardText class="permission-header">Klaviyo</VCardText>
            <VSwitch></VSwitch>
          </VRow>
          <VRow justify="space-between" align="center" class="mx-8 mb-5">
            <img src="@/assets/images/icons/brands/instagram.png" alt="Chat GPT" class="mr-2" />
            <VCardText class="permission-header">Instagram</VCardText>
            <VSwitch></VSwitch>
          </VRow>
        </VCard>
      </VCol>
    </VRow>
  </VContainer>
</template>
<script lang="ts" setup>
import { VImg } from 'vuetify/lib/components/index.mjs';


definePageMeta({
  layout: "account",
})
</script>
<style lang="scss">
@use "assets/styles/styles.scss";
</style>
