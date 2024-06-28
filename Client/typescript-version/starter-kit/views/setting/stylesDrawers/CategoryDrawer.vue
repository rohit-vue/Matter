<script setup>
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'
const props = defineProps({
  isDrawerOpen: { type: Boolean, required: true },
  editingCategoryId: { type: Number, default: null },
  categoryData: { type: Array, required: true },
})

const emit = defineEmits(['update:isDrawerOpen', 'add-category'])

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}

const refVForm = ref()
const category = ref('')
const defaultCategory = ref(false)

const requiredValidator = value => !!value || 'This field is required'

const capitalize = (text) => {
  return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
}

watch(category, (newValue) => {
  if (newValue) {
    category.value = capitalize(newValue);
  }
});

const resetForm = () => {
  refVForm.value?.reset()
  category.value = ''
  defaultCategory.value = false
  emit('update:isDrawerOpen', false)
}

const saveChanges = () => {
  if (refVForm.value?.validate()) {
    const newCategory = {
      id: props.editingCategoryId || Date.now(),
      category: category.value,
      active: true, // assuming you want to set default active state
      default: defaultCategory.value,
    }
    emit('add-category', newCategory)
    resetForm()
  }
}

const loadUserData = (categoryId) => {
  // Load category data based on categoryId. This is a placeholder for actual data loading logic.
  const data = props.categoryData.find(category => category.id === categoryId);
  if (data) {
    category.value = data.category
    defaultCategory.value = data.default
  }
}

onMounted(() => {
  if (props.editingCategoryId) {
    loadUserData(props.editingCategoryId);
  }
})

watch(() => props.editingCategoryId, (newCategoryId) => {
  if (newCategoryId) {
    loadUserData(newCategoryId);
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
    <VRow justify="space-between" align="center" class="mx-2">
      <AppDrawerHeaderSection
        class="mt-6"
        @cancel="resetForm"
      />
      <div class="custom-btn">
        <VBtn variant="outlined" @click="resetForm">
          Cancel
        </VBtn>
        <VBtn variant="tonal" class="btn" @click="saveChanges">
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
                    {{ props.editingCategoryId ? 'Edit' : 'Add' }} Sampling Stage
                  </div>
                </VCol>

                <VCol cols="12">
                  <VTextField
                    v-model="category"
                    label="Stage Name"
                    :rules="[requiredValidator]"
                    placeholder="Outerwear"
                  />
                </VCol>

                <VCol cols="12">
                  <VSwitch v-model="defaultCategory" label="Set as default"></VSwitch>
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
