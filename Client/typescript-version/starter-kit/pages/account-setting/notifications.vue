<template>
  <VContainer>
    <VRow justify="end">
      <VCol cols="9">
        <VCard>
          <VCardTitle class="mt-3">Notifications</VCardTitle>
          <VDivider />
          <VCardSubtitle class="mt-5 mb-5">
            You will receive notifications for the selected items below.
          </VCardSubtitle>
          <VDataTableVirtual :items="items" :header="headers">
            <template v-slot:item.EMAIL="{ item }">
              <v-checkbox></v-checkbox>
            </template>
            <template v-slot:item.APP="{ item }">
              <v-checkbox></v-checkbox>
            </template>
          </VDataTableVirtual>
        </VCard>
      </VCol>
    </VRow>
  </VContainer>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const items = ref([
  {
    TYPE: 'Product Updates',
    EMAIL: 'Loxodonta africana',
    APP: 'Herbivore',
  },
  {
    TYPE: 'Comments',
    EMAIL: 'Loxodonta africana',
    APP: 'Herbivore',
  },
  {
    TYPE: 'Status Updates',
    EMAIL: 'Loxodonta africana',
    APP: 'Herbivore',
  },
  // add more items as needed
]);

const headers = [
  { text: 'Type', value: 'TYPE', width: '15%'}, // adjust width as needed
  { text: 'Email', value: 'EMAIL', align: 'start', sortable: false },
  { text: 'App', value: 'APP', align: 'start', sortable: false },
];
definePageMeta({
  layout: "account",
})
</script>

<style scoped lang="scss">
/* Add any custom styles here */
</style>


