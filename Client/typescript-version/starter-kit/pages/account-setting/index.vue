<template>
  <VContainer class="accountUser">
    <VRow justify="end">
      <VCol cols="9">
        <!-- 1st card -->
        <VCard class="pb-8">
          <v-card-title class="mt-3">User Details</v-card-title>
          <VRow justify="center" class="mt-2 pl-4 pr-4">
            <VCol cols="6">
              <VTextField
                autofocus
                label="Firstname"
                placeholder="John"
              />
            </VCol>
            <VCol cols="6">
              <VTextField
                label="Surname"
                placeholder="Doe"
              />
            </VCol>
          </VRow>
          <VRow justify="center" class="mt-2 pl-4 pr-4">
            <VCol cols="6">
              <VTextField
                autofocus
                label="Email Address"
                placeholder="John"
              />
            </VCol>
            <VCol cols="6">
              <VTextField
                label="Phone Number"
                placeholder="Doe"
              />
            </VCol>
          </VRow>
        </VCard>
        <!-- 2nd card -->
        <VCard class="pb-8 mt-6">
          <v-card-title class="mt-3">Time zone and units of measurement</v-card-title>
          <v-card-subtitle>
            Used to calculate product prices, shipping weights, and order times.
          </v-card-subtitle>
          <VRow justify="center" class="mt-2 pl-4 pr-4">
            <VCol cols="6">
              <v-select
                v-model="selectedTimezone"
                :items="timezones"
                label="Time Zone"
                placeholder="Select Time Zone"
              ></v-select>
            </VCol>
            <VCol cols="6">
              <v-select
                v-model="selectedDateFormat"
                :items="dateFormats"
                label="Date Format"
                placeholder="Select Date Format"
              ></v-select>
            </VCol>
          </VRow>
          <VRow justify="center" class="mt-2 pl-4 pr-4">
            <VCol cols="6">
              <v-select
                v-model="selectedUnitOfMeasure"
                :items="unitsOfMeasure"
                label="Unit of Measure"
                placeholder="Select Unit of Measure"
              ></v-select>
            </VCol>
            <VCol cols="6">
              <v-select
                v-model="selectedDefaultWeightUnit"
                :items="weightUnits"
                label="Default Weight Unit"
                placeholder="Select Default Weight Unit"
              ></v-select>
            </VCol>
          </VRow>
        </VCard>
        <!-- 3rd card -->
        <VCard class="pb-8 mt-6">
          <v-card-title class="mt-3">Currency</v-card-title>
          <v-card-subtitle>Your default currency</v-card-subtitle>
          <VRow justify="center" class="mt-2 pl-4 pr-4">
            <VCol cols="12">
              <v-select
                v-model="selectedDefaultCurrency"
                :items="currencies"
                label="Default Currency"
                placeholder="Select Default Currency"
              ></v-select>
            </VCol>
          </VRow>
        </VCard>
        <!-- 4th card -->
        <VCard class="pb-8 mt-6">
          <v-card-title class="mt-3">Languages</v-card-title>
          <v-card-subtitle>Shown on the Orders page, customer pages, and customer order notifications to identify orders.</v-card-subtitle>
          <VRow justify="center" class="mt-2 pl-4 pr-4">
            <VCol cols="6">
              <v-select
                v-model="selectedAppLanguage"
                :items="appLanguages"
                label="App Language"
                placeholder="Select App Language"
              ></v-select>
            </VCol>
            <VCol cols="6">
              <v-select
                v-model="selectedCommentsLanguage"
                :items="commentsLanguages"
                label="Comments Language"
                placeholder="Select Comments Language"
              ></v-select>
            </VCol>
          </VRow>
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
import { ref } from 'vue';
const selectedTimezone = ref<string | null>(null);
const selectedDateFormat = ref<string | null>(null);
const selectedUnitOfMeasure = ref<string | null>(null);
const selectedDefaultWeightUnit = ref<string | null>(null);
const selectedDefaultCurrency = ref<string | null>(null);
const selectedAppLanguage = ref<string | null>(null);
const selectedCommentsLanguage = ref<string | null>(null);

const timezones = ref<string[]>([
  'UTC-12:00',
  'UTC-11:00',
  'UTC-10:00',
  'UTC-09:00',
  'UTC-08:00',
]);

const dateFormats = ref<string[]>([
  'YYYY-MM-DD',
  'MM/DD/YYYY',
  'DD/MM/YYYY',
]);

const unitsOfMeasure = ref<string[]>([
  'Metric',
  'Imperial',
]);

const weightUnits = ref<string[]>([
  'kg',
  'lbs',
]);

const currencies = ref<string[]>([
  'USD',
  'EUR',
  'GBP',
]);

const appLanguages = ref<string[]>([
  'English',
  'Spanish',
  'French',
  // Add more app languages as needed
]);

const commentsLanguages = ref<string[]>([
  'English',
  'Spanish',
  'French',
  // Add more comments languages as needed
]);

definePageMeta({
  layout: "account",
})
</script>

<style lang="scss">
@use "assets/styles/styles.scss";

</style>
