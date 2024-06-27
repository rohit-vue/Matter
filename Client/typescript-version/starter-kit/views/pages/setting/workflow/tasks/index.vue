<!-- eslint-disable @typescript-eslint/quotes -->
<script setup lang="ts">
import { ref } from 'vue'
import TaskDrawer from "@/views/setting/workflowDrawers/taskDrawer.vue"

const isAddNewTaskDrawerVisible = ref(false)
const editingTaskId = ref<number | null>(null);

const headers = [
  { title: 'Task Name', key: 'task', width: '40%' },
  { title: 'Department', key: 'department' },
  { title: 'Setting', key: 'setting', sortable: false },
]

const taskData = ref([])
const addTask = (newTask) => {
  if (editingTaskId.value !== null) {
    const index = taskData.value.findIndex(task => task.id === editingTaskId.value)
    if (index !== -1) {
      taskData.value[index] = newTask;
    }
  } else {
    taskData.value.push(newTask);
  }
  editingTaskId.value = null;
}

const editTask = (task) => {
  editingTaskId.value = task.id
  isAddNewTaskDrawerVisible.value = true;
}

const deleteTask = (id) => {
  taskData.value = taskData.value.filter(task => task.id !== id);
}
</script>

<template>
  <div>
    <VRow justify="end">
      <VCol cols="12">
        <VCard>
          <VCardTitle style="padding: 1rem;">Tasks Setup</VCardTitle>
          <VCardSubtitle style="margin-top: -1rem;">Define common tasks within your workflow</VCardSubtitle>
          <VCol class="mx-1">
            <VDataTable :headers="headers" :items="taskData" item-value="id" class="text-no-wrap billing-history-table">
              <!-- Task -->
              <template #item.task="{ item }">
                {{ item.task }}
              </template>

              <!-- Description -->
              <template #item.department="{ item }">
                <div class="chip-wrapper">
                  <VChip
                    v-for="(departmentItem, index) in item.department"
                    :key="index"
                  >
                    {{ departmentItem }}
                  </VChip>
                </div>
              </template>

              <!-- Setting -->
              <template #item.setting="{ item }">
                <IconBtn size="small" @click="editTask(item)">
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn size="small" icon="ri-delete-bin-7-line" @click="deleteTask(item.id)" />
              </template>

              <!-- Bottom -->
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddNewTaskDrawerVisible = !isAddNewTaskDrawerVisible">
                    Add Task Type
                  </VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
      </VCol>
      <TaskDrawer
        v-model:isDrawerOpen="isAddNewTaskDrawerVisible"
        :editing-task-id="editingTaskId"
        :task-data="taskData"
        @add-task="addTask"
      />
    </VRow>
  </div>
</template>

<style lang="scss">

</style>
