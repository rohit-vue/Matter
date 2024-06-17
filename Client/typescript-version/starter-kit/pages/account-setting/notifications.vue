<template>
  <v-container>
    <v-row justify="end">
      <v-col cols="9">
        <v-card>
          <v-card-title class="mt-3">Notifications</v-card-title>
          <v-divider />
          <v-card-subtitle class="mt-5 mb-5">
            You will receive notifications for the selected items below.
          </v-card-subtitle>
          <v-data-table-virtual :items="items" :header="headers">
            <template v-slot:item.EMAIL="{ item }">
              <v-checkbox></v-checkbox>
            </template>
            <template v-slot:item.APP="{ item }">
              <v-checkbox></v-checkbox>
            </template>
          </v-data-table-virtual>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const items = ref([
  {
    TYPE: 'Product Updates fakjenfkjaenfkjnekajfnenwakofje',
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


