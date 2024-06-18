<script lang="ts" setup>
import { ref } from 'vue'
import CompanyDrawer from '@/views/account/CompanyDrawer.vue';
const isAddCustomerDrawerOpen = ref(false)

const dummyData = [
  {
    title: 'Location 1',
    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
  },
  {
    title: 'Location 2',
    text: 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
  },
  {
    title: 'Location 3',
    text: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
  },
];

definePageMeta({
  layout: "account",
})
</script>
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
                placeholder="Matter"
              />
              <!-- <VIcon icon="ri-user-add-line" /> -->
              <button class="p-0 comp-btn1">
                <img src="@/assets/images/icons/brands/Icon.png" alt="Chat GPT" class="" />
              </button>
              <button class="p-0 comp-btn2">
                <img src="@/assets/images/icons/brands/user-add-line.png" alt="Chat GPT" class="" />
              </button>
            </VRow>
          </VCol>
        </VCard>
        <!-- 3rd Card -->
        <VCard class="mt-6">
          <VRow justify="space-between" align="center" class="mt-2 mr-3">
            <VCol class="d-flex align-center">
              <VCardText class="permission-header">Company Location</VCardText>
            </VCol>
            <VCol class="d-flex justify-end">
              <VBtn variant="outlined" @click="isAddCustomerDrawerOpen = !isAddCustomerDrawerOpen">
                Add New Location
              </VBtn>
            </VCol>
          </VRow>
          <VDivider class="mx-5 mt-2"/>
          <VExpansionPanels variant="accordion" multiple>
            <VExpansionPanel
              v-for="(item, index) in dummyData"
              :key="index"
              :title="item.title"
              :text="item.text"
            ></VExpansionPanel>
          </VExpansionPanels>
        </VCard>
        <!-- bottom buttons -->
        <div class="custom-btn">
          <VBtn variant="outlined" class="btn1">
            Discard
          </VBtn>
          <VBtn variant="tonal" class="btn2">
            Save Changes
          </VBtn>
        </div>
      </VCol>
      <!-- right-drawer -->
      <CompanyDrawer v-model:is-drawer-open="isAddCustomerDrawerOpen" />
    </VRow>
  </VContainer>
</template>

<style lang="scss">
@use "assets/styles/styles.scss";
</style>
