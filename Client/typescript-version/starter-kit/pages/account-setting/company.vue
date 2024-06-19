<script setup lang="ts">
import { ref } from 'vue';
import CompanyDrawer from '@/views/account/CompanyDrawer.vue';
import { VCardText } from 'vuetify/lib/components/index.mjs';

const isAddLocationDrawerOpen = ref(false);
const editingLocationId = ref<number | null>(null);
const locationData = ref([]);

const addLocation = (newLocation) => {
  if (editingLocationId.value !== null) {
    const index = locationData.value.findIndex(location => location.id === editingLocationId.value);
    if (index !== -1) {
      locationData.value[index] = newLocation;
    }
  } else {
    locationData.value.push(newLocation);
  }
  editingLocationId.value = null;
}

const editLocation = (location) => {
  editingLocationId.value = location.id;
  isAddLocationDrawerOpen.value = true;
}

const deletelocation = (id) => {
  locationData.value = locationData.value.filter(location => location.id !== id);
}

definePageMeta({
  layout: 'account',
});
</script>

<template>
  <VContainer class="accountUser">
    <VRow justify="end">
      <VCol cols="9">
        <!-- Company Info Card -->
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
            <VCol cols="6">
              <VTextField
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

        <!-- Brands Card -->
        <VCard class="pb-8 mt-6">
          <VCardTitle class="mt-3">Brands</VCardTitle>
          <VCardSubtitle>Add brands under your company</VCardSubtitle>
          <VCol cols="11">
            <VCardTitle class="mt-3 sub-heading">Brands Name</VCardTitle>
            <VRow class="ml-1 pt-2">
              <VTextField
                autofocus
                placeholder="Matter"
              />
              <VBtn class="p-0 comp-btn1">
                <img src="@/assets/images/icons/brands/Icon.png" alt="Add Brand" />
              </VBtn>
              <VBtn class="p-0 comp-btn2">
                <img src="@/assets/images/icons/brands/user-add-line.png" alt="Add User" />
              </VBtn>
            </VRow>
          </VCol>
        </VCard>

        <!-- Company Locations Card -->
        <VCard class="mt-6">
          <VRow justify="space-between" align="center" class="mt-2 mr-3">
            <VCol class="d-flex align-center">
              <VCardText class="permission-header">Company Locations</VCardText>
            </VCol>
            <VCol class="d-flex justify-end">
              <VBtn variant="outlined" @click="isAddLocationDrawerOpen = !isAddLocationDrawerOpen">
                Add New Location
              </VBtn>
            </VCol>
          </VRow>
          <VDivider class="mx-5 mt-2"/>
          <VCardText v-if="locationData && locationData.length === 0">
            No Data Available
          </VCardText>
          <VExpansionPanels v-else variant="accordion" multiple>
            <VExpansionPanel
              v-for="(item, index) in locationData"
              :key="index"
              :title="item.type"
              >
              <VIcon size="20px" icon="ri-delete-bin-7-line" @click="deletelocation(item.id)" style="position: absolute; right: 3rem; top: 0.7rem;"/>
              <VIcon size="20px" icon="ri-pencil-line" @click="editLocation(item)" style="position: absolute; right: 5rem; top: 0.7rem;"/>
              <VExpansionPanelText>
                <p>{{ item.addressLine1 }}</p>
                <p>{{ item.addressLine2 }}</p>
                <p>{{ item.town }}</p>
                <p>{{ item.city }}</p>
                <p>{{ item.zipCode }}</p>
                <p>{{ item.selectedCountry }}</p>
              </VExpansionPanelText>
            </VExpansionPanel>
          </VExpansionPanels>
        </VCard>
      </VCol>
      <!-- Company Drawer -->
      <CompanyDrawer 
        v-model:is-drawer-open="isAddLocationDrawerOpen" 
        :editing-location-id="editingLocationId" 
        :location-data="locationData" 
        @add-location="addLocation"       
      />
    </VRow>
  </VContainer>
</template>

<style scoped lang="scss">
@use "assets/styles/styles.scss";
</style>
