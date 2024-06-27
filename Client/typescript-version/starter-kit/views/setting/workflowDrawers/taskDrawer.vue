<script setup>
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'

const props = defineProps({
  isDrawerOpen: { type: Boolean, required: true },
  editingTaskId: { type: Number, default: null },
  taskData: { type: Array, required: true },
})

const emit = defineEmits(['update:isDrawerOpen', 'add-task'])

const handleDrawerModelValueUpdate = val => {
  emit('update:isDrawerOpen', val)
}

const refVForm = ref()
const task = ref('')
const department = ref([])

const requiredValidator = value => !!value || 'This field is required'

const resetForm = () => {
  refVForm.value?.reset()
  task.value = ''
  department.value = []
  emit('update:isDrawerOpen', false)
}

const saveChanges = () => {
  if (refVForm.value?.validate()) {
    const newTask= {
      id: props.editingTaskId || Date.now(),
      task: task.value,
      department: department.value,
    }
    emit('add-task', newTask)
    resetForm()
  }
}

const loadTaskData = (taskId) => {
  const data = props.taskData.find(task => task.id === taskId);
  if (data) {
    task.value = data.task
    department.value = data.department
  }
}

onMounted(() => {
  if (props.editingTaskId) {
    loadTaskData(props.editingTaskId);
  }
})

watch(() => props.editingTaskId, (newTaskId) => {
  if (newTaskId) {
    loadTaskData(newTaskId);
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
                    {{ props.editingTaskId ? 'Edit' : 'Add' }} a Season
                  </div>
                </VCol>
                <VCol cols="12">
                  <VTextField
                    v-model="task"
                    label="Task Name"
                    :rules="[requiredValidator]"
                    placeholder="Task Name"
                  />
                </VCol>
                <VCol cols="12">
                  <VCombobox
                    v-model="department"
                    label="Department"
                    chips
                    clearable
                    multiple
                    closable-chips
                    clear-icon="ri-close-circle-line"
                  />
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
