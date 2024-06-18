<script setup lang="ts">
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'
import { VForm } from 'vuetify/components/VForm'

const selectedCountry = ref<string | null>(null);
const typeOfCountry = ref<string[]>([
  'United Kingdom',
  'United States',
  'China',
  'Russia',
]);

const props = defineProps({
  isDrawerOpen: {
    type: Boolean,
    required: true,
  },
})

const emit = defineEmits(['update:isDrawerOpen'])

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}

const refVForm = ref()
const addressLine1 = ref()
const addressLine2 = ref()
const town = ref()
const type = ref()
const city = ref()
const zipCode = ref()

const resetForm = () => {
  refVForm.value?.reset()
  emit('update:isDrawerOpen', false)
}

</script>

<template>
  <VNavigationDrawer
    :model-value="props.isDrawerOpen"
    temporary
    location="end"
    width="420"
    @update:model-value="handleDrawerModelValueUpdate"
  >
    <!-- 👉 Header -->
    <VRow justify="space-between" align="center" class="mx-2">
      <AppDrawerHeaderSection
        class="mt-6"
        @cancel="$emit('update:isDrawerOpen', false)"
      />
      <div class="custom-btn">
        <VBtn variant="outlined" class="btn1">
          Discard
        </VBtn>
        <VBtn variant="tonal" class="btn2">
          Save Changes
        </VBtn>
      </div>

      <VCard flat>
        <PerfectScrollbar
          :options="{ wheelPropagation: false }"
          class="h-100"
        >
          <VCardText style="block-size: calc(100vh - 5rem);">
            <VForm
              ref="refVForm"
              @submit.prevent=""
            >
              <VRow class="mt-5">
                <VCol>
                  <div style="font-size: 21px; font-weight: 600;">
                    Add a Location
                  </div>
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="type"
                    label="Type"
                    :rules="[requiredValidator]"
                    placeholder="Billing, Shipping, Warehouse"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="addressLine1"
                    label="Address Line 1"
                    :rules="[requiredValidator]"
                    placeholder="264 Company Street"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="addressLine2"
                    label="Address Line 2"
                    placeholder="Materio Industrial Estate"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="town"
                    :rules="[requiredValidator]"
                    label="Town"
                    placeholder="Matter"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="city"
                    :rules="[requiredValidator]"
                    label="City"
                    placeholder="London"
                  />
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="zipCode"
                    :rules="[requiredValidator]"
                    label="Zip Code"
                    placeholder="KW5 8NW"
                  />
                </VCol>

                <VCol cols="12">
                  <v-select
                    v-model="selectedCountry"
                    :rules="[requiredValidator]"
                    :items="typeOfCountry"
                    label="Country"
                    placeholder="Select a Country"
                  ></v-select>
                </VCol>
              </VRow>
            </VForm>
          </VCardText>
        </PerfectScrollbar>
      </VCard>
    </VRow>
  </VNavigationDrawer>
</template>

<style lang="scss">
.v-navigation-drawer__content {
  overflow-y: hidden !important;
}
</style>
