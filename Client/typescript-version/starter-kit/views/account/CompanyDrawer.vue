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
  editingLocationId: {
    type: Number,
    default: null,
  },
  locationData: {
    type: Array as PropType<{ id: number; user: { name: string; companyEmail: string }; role: string }[]>,
    required: true,
  },
})

const emit = defineEmits(['update:isDrawerOpen', 'add-location'])

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}

const refVForm = ref();
const addressLine1 = ref('');
const addressLine2 = ref('');
const town = ref('');
const type = ref('');
const city = ref('');
const zipCode = ref('');

const capitalize = (text) => {
  return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
}

watch(type, (newValue) => {
  if (newValue) {
    type.value = capitalize(newValue);
  }
});

watch(addressLine1, (newValue) => {
  if (newValue) {
    addressLine1.value = capitalize(newValue);
  }
});

watch(addressLine2, (newValue) => {
  if (newValue) {
    addressLine2.value = capitalize(newValue);
  }
});

watch(town, (newValue) => {
  if (newValue) {
    town.value = capitalize(newValue);
  }
});

watch(city, (newValue) => {
  if (newValue) {
    city.value = capitalize(newValue);
  }
});

const requiredValidator = (v: string) => !!v || 'Field is required';

const resetForm = () => {
  refVForm.value?.reset();
  emit('update:isDrawerOpen', false);
};

const validateForm = () => {
  return refVForm.value?.validate();
};

const handleSaveChanges = () => {
  if (validateForm()) {
    const newLocation = {
      id: props.editingLocationId || Date.now(),
      type: type.value,
      addressLine1: addressLine1.value,
      addressLine2: addressLine2.value,
      town: town.value,
      city: city.value,
      zipCode: zipCode.value,
      selectedCountry: selectedCountry.value,
    };
    emit('add-location', newLocation);
    resetForm();
  }
};

const loadLocationData = (locationId) => {
  // Load user data based on userId. This is a placeholder for actual data loading logic.
  const data = props.locationData.find(location => location.id === locationId);
  if (data) {
    type.value = data.type;
    addressLine1.value = data.addressLine1;
    addressLine2.value = data.addressLine2;
    town.value = data.town;
    city.value = data.city;
    zipCode.value = data.zipCode;
    selectedCountry.value = data.selectedCountry;
  }
}

onMounted(() => {
  if (props.editingLocationId) {
    loadLocationData(props.editingLocationId);
  }
})

watch(() => props.editingLocationId, (newLocationId) => {
  if (newLocationId) {
    loadLocationData(newLocationId);
  } else {
    resetForm();
  }
})

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
        <VBtn variant="outlined" @click="resetForm">
          Cancel
        </VBtn>
        <VBtn variant="tonal" class="btn" @click="handleSaveChanges">
          Save Changes
        </VBtn>
      </div>

      <VCard flat>
        <PerfectScrollbar
          :options="{ wheelPropagation: false }"
          class="h-100"
        >
          <VCardText style="block-size: calc(100vh - 5rem);">
            <VForm ref="refVForm" lazy-validation @submit.prevent="">
              <VRow class="mt-5">
                <VCol>
                  <div style="font-size: 21px; font-weight: 600;">
                    {{ props.editingLocationId ? 'Edit' : 'Add' }} a Location
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
.btn {
  color: white;
  background: #9b9a9a;
}
</style>
