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
          <VExpansionPanels variant="accordion" multiple>
            <VExpansionPanel
              v-for="(item, index) in dummyData"
              :key="index"
              :title="item.title"
              :text="item.text"
            ></VExpansionPanel>
          </VExpansionPanels>
        </VCard>
      </VCol>
    </VRow>
  </VContainer>
</template>
<script lang="ts" setup>

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

<style lang="scss">
@use "assets/styles/styles.scss";
</style>





<!-- <template>
  <v-card>
    <v-layout>
      <v-navigation-drawer v-model="drawer" :rail="rail" permanent>
        <v-list-item
          prepend-avatar="https://randomuser.me/api/portraits/men/85.jpg"
          title="John Leider"
          nav
        >
          <template v-slot:append>
            <v-btn
              icon="mdi-chevron-left"
              variant="text"
              @click.stop="rail = !rail"
            ></v-btn
          ></template>
        </v-list-item>
      </v-navigation-drawer>
      <v-main style="height: 250px"></v-main>
    </v-layout>
  </v-card>
  <v-card>
    <VCardTitle @click="rail = false">asdfasf</VCardTitle>
  </v-card>
</template>

<script>
  export default {
    data() {
      return {
        drawer: true,
        rail: true,
      }
    },
  }
</script> -->
