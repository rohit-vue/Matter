<template>
  <v-container>
    <v-row justify="end">
      <v-col cols="7">
        <v-card>
          <v-card-title>Game Consoles</v-card-title>
          <v-card-subtitle>
            You will receive notification for the below selected items.
          </v-card-subtitle>
          <v-card-text>
            <v-table :items-per-page="10" :items="consoles" :hide-default-footer="true">
              <template v-slot:item="{ item }">
                <tr>
                  <td>{{ item.name }}</td>
                  <td>{{ item.manufacturer }}</td>
                  <td>{{ item.year }}</td>
                  <td>{{ item.sales }}</td>
                  <td>
                    <v-checkbox v-model="item.exclusive" readonly></v-checkbox>
                  </td>
                </tr>
              </template>
            </v-table>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script setup lang="ts">
import { ref } from 'vue';

interface Console {
  name: string;
  manufacturer: string;
  year: number;
  sales: string;
  exclusive: boolean;
}

const consoles = ref<Console[]>([
  {
    name: 'PlayStation 5',
    manufacturer: 'Sony',
    year: 2020,
    sales: '10M',
    exclusive: true,
  },
  {
    name: 'Xbox Series X',
    manufacturer: 'Microsoft',
    year: 2020,
    sales: '6.5M',
    exclusive: false,
  },
  {
    name: 'Nintendo Switch',
    manufacturer: 'Nintendo',
    year: 2017,
    sales: '89M',
    exclusive: true,
  },
  {
    name: 'PlayStation 4',
    manufacturer: 'Sony',
    year: 2013,
    sales: '116M',
    exclusive: true,
  },
  {
    name: 'Xbox One',
    manufacturer: 'Microsoft',
    year: 2013,
    sales: '50M',
    exclusive: false,
  },
  {
    name: 'Nintendo Wii',
    manufacturer: 'Nintendo',
    year: 2006,
    sales: '101M',
    exclusive: true,
  },
]);

definePageMeta({
  layout: "account",
})
</script>

<style scoped lang="scss">
.v-data-table {
  width: 100%;
}
</style>
