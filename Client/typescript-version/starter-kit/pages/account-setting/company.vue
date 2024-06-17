<template>
  <VContainer class="accountUser">
    <VRow justify="end">
      <VCol cols="9">
        <!-- 1st Card  -->
        <VCard class="pb-8">
          <v-card-title class="mt-3">Company Info</v-card-title>
          <VRow justify="center" class="mt-1 pl-4 pr-4">
            <VCol cols="12">
              <VTextField
                autofocus
                label="Company Name"
                placeholder="Materio"
              />
            </VCol>

          </VRow>
          <VRow justify="center" class="mt-2 pl-4 pr-4">
            <VCol cols="6">
              <VTextField
                autofocus
                label="VAT Number"
                placeholder="GB177932036"
              />
            </VCol>
            <VCol cols="6">
              <VTextField
                label="EORI Number"
                placeholder="GB177932036"
              />
            </VCol>
          </VRow>
        </VCard>
        <!-- 2nd Card  -->
        <VCard class="pb-8 mt-6">
          <VCardTitle class="mt-3">Brands</VCardTitle>
          <VCardSubtitle class="">Add brands under your company</VCardSubtitle>
          <VCol cols="11">
            <VCardTitle class="mt-3 sub-heading">Brands Name</VCardTitle>
            <VRow class="ml-1 pt-2">
              <VTextField
                autofocus
                label="Brand Name"
                placeholder="Materio"
              />
              <button class="p-0 comp-btn1">
                <img src="@/assets/images/icons/brands/Icon.png" alt="Chat GPT" class="" />
              </button>
              <button class="p-0 comp-btn2">
                <img src="@/assets/images/icons/brands/user-add-line.png" alt="Chat GPT" class="" />
              </button>
            </VRow>
          </VCol>
        </VCard>
        <VCard class="mt-6">
          <VRow justify="space-between" align="center" class="mt-2 mr-3">
            <VCol class="d-flex align-center">
              <VCardText class="permission-header">Company Location</VCardText>
            </VCol>
            <VCol class="d-flex justify-end">
              <VBtn variant="outlined" class="">
                Add New Location
              </VBtn>
            </VCol>
          </VRow>
          <VDivider class="mx-5 mt-2"/>
        </VCard>

      </VCol>
    </VRow>
  </VContainer>
</template>
<script lang="ts" setup>
import { VCardSubtitle, VDivider } from 'vuetify/lib/components/index.mjs';

definePageMeta({
  layout: "account",
})
</script>

<style lang="scss">
@use "assets/styles/styles.scss";
</style>
