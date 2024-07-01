<script setup>
import { PerfectScrollbar } from 'vue3-perfect-scrollbar'
import { VCardTitle, VSelect, VTextField } from 'vuetify/lib/components/index.mjs';

const props = defineProps({
  isDrawerOpen: { type: Boolean, required: true },
  editingTaskId: { type: Number, default: null },
  taskData: { type: Array, required: true },
})
const taskSelected = ref('')
const tasks = ref([
  'Style Updated',
  'Task 2',
  'Task 3',
])

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
                    {{ props.editingTaskId ? 'Edit' : 'Add' }} a Task
                  </div>
                </VCol>
                <VCol cols="12">
                  <VSelect
                    v-model="taskSelected"
                    :items="tasks"
                    label="Task Template"
                    :rules="[requiredValidator]"
                    placeholder="Choose your Task"
                  />
                </VCol>
                <VCol cols="12">
                  <VTextField 
                    v-model="Name"
                    label="Task Name"
                    placeholder="Update the measurements"
                  />
                </VCol>
                <VCol cols="12">
                  <VSelect
                    v-model="season"
                    :items="tasks"
                    label="Season"
                    :rules="[requiredValidator]"
                    placeholder="Choose your Season"
                  />
                </VCol>
                <VCol cols="12">
                  <VSelect
                    v-model="style"
                    :items="tasks"
                    label="Style"
                    :rules="[requiredValidator]"
                    placeholder="Choose your Style"
                  />
                </VCol>
                <VCol cols="12">
                  <VRow>
                    <VCol cols="6">
                      <VSelect
                        v-model="priority"
                        :items="tasks"
                        label="Priority"
                        :rules="[requiredValidator]"
                        placeholder="Priority"
                      />
                    </VCol>
                    <VCol cols="6">
                      <VTextField
                        v-model="deadline"
                        :items="tasks"
                        label="Deadline"
                        :rules="[requiredValidator]"
                        placeholder="Deadline"
                      />
                    </VCol>
                  </VRow>
                </VCol>
                <VCol cols="12">
                  <VRow>
                    <VCol cols="6">
                      <VSelect
                        v-model="by"
                        :items="tasks"
                        label="Assigned By"
                        :rules="[requiredValidator]"
                        placeholder="Select"
                      />
                    </VCol>
                    <VCol cols="6">
                      <VSelect
                        v-model="to"
                        :items="tasks"
                        label="Assigned By"
                        :rules="[requiredValidator]"
                        placeholder="Select"
                      />
                    </VCol>
                  </VRow>
                </VCol>
                <VCardTitle class="mt-2">Task Updates</VCardTitle>     
                <VDivider />       
                <VCardText>No Updates Found</VCardText>
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
