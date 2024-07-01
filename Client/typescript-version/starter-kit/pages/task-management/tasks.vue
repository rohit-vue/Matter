<script setup lang="ts">
import TaskDrawer from "@/views/task/myTaskDrawer.vue"

const headers = [
  { title: '', key: 'checkbox', sortable: false }, // Checkbox header
  { title: 'Flag', key: 'flag', sortable: false },
  { title: 'Done', key: 'done', sortable: false },
  { title: 'Task', key: 'tasks', width: '50%', sortable: false },
  { title: 'Season', key: 'season', sortable: false },
  { title: 'Dept', key: 'dept', sortable: false },
  { title: 'Priority', key: 'priority', sortable: false },
  { title: 'Deadline', key: 'deadline', sortable: false },
  { title: 'Time', key: 'time', sortable: false },
  { title: 'Assigned by', key: 'by', sortable: false },
  { title: 'Assigned to', key: 'to', sortable: false },
  { title: 'Latest update', key: 'update', sortable: false },
]

const categoryData = ref([
  { id: 1, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Summer', dept: 'Dept 1', priority: 'High', deadline: '2024-07-01', time: '12:00', by: 'Sarah Jones A', to: 'Sarah Jones B', update: '2024-06-20' },
  { id: 2, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Winter', dept: 'Dept 2', priority: 'Medium', deadline: '2024-07-02', time: '13:00', by: 'Sarah Jones C', to: 'Sarah Jones D', update: '2024-06-21' },
  { id: 3, flag: true, done: true, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Spring', dept: 'Dept 3', priority: 'Low', deadline: '2024-07-03', time: '14:00', by: 'Sarah Jones E', to: 'Sarah Jones F', update: '2024-06-22' },
  { id: 4, flag: false, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Fall', dept: 'Dept 4', priority: 'High', deadline: '2024-07-04', time: '15:00', by: 'Sarah Jones G', to: 'Sarah Jones H', update: '2024-06-23' },
  { id: 5, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Summer', dept: 'Dept 5', priority: 'Medium', deadline: '2024-07-05', time: '16:00', by: 'Sarah Jones I', to: 'Sarah Jones J', update: '2024-06-24' },
  { id: 6, flag: true, done: true, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Winter', dept: 'Dept 6', priority: 'Low', deadline: '2024-07-06', time: '17:00', by: 'Sarah Jones K', to: 'Sarah Jones L', update: '2024-06-25' },
  { id: 7, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Spring', dept: 'Dept 7', priority: 'High', deadline: '2024-07-07', time: '18:00', by: 'Sarah Jones M', to: 'Sarah Jones N', update: '2024-06-26' },
  { id: 8, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Fall', dept: 'Dept 8', priority: 'Medium', deadline: '2024-07-08', time: '19:00', by: 'Sarah Jones O', to: 'Sarah Jones P', update: '2024-06-27' },
  { id: 9, flag: true, done: true, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Summer', dept: 'Dept 9', priority: 'Low', deadline: '2024-07-09', time: '20:00', by: 'Sarah Jones Q', to: 'Sarah Jones R', update: '2024-06-28' },
  { id: 10, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Winter', dept: 'Dept 10', priority: 'High', deadline: '2024-07-10', time: '21:00', by: 'Sarah Jones S', to: 'Sarah Jones T', update: '2024-06-29' },
  { id: 11, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Spring', dept: 'Dept 11', priority: 'Medium', deadline: '2024-07-11', time: '22:00', by: 'Sarah Jones U', to: 'Sarah Jones V', update: '2024-06-30' },
  { id: 12, flag: true, done: true, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Fall', dept: 'Dept 12', priority: 'Low', deadline: '2024-07-12', time: '23:00', by: 'Sarah Jones W', to: 'Sarah Jones X', update: '2024-07-01' },
  { id: 13, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Summer', dept: 'Dept 13', priority: 'High', deadline: '2024-07-13', time: '00:00', by: 'Sarah Jones Y', to: 'Sarah Jones Z', update: '2024-07-02' },
  { id: 14, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Winter', dept: 'Dept 14', priority: 'Medium', deadline: '2024-07-14', time: '01:00', by: 'Sarah Jones AA', to: 'Sarah Jones BB', update: '2024-07-03' },
  { id: 15, flag: true, done: true, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Spring', dept: 'Dept 15', priority: 'Low', deadline: '2024-07-15', time: '02:00', by: 'Sarah Jones CC', to: 'Sarah Jones DD', update: '2024-07-04' },
  { id: 16, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Fall', dept: 'Dept 16', priority: 'High', deadline: '2024-07-16', time: '03:00', by: 'Sarah Jones EE', to: 'Sarah Jones FF', update: '2024-07-05' },
  { id: 17, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Summer', dept: 'Dept 17', priority: 'Medium', deadline: '2024-07-17', time: '04:00', by: 'Sarah Jones GG', to: 'Sarah Jones HH', update: '2024-07-06' },
  { id: 18, flag: true, done: true, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Winter', dept: 'Dept 18', priority: 'Low', deadline: '2024-07-18', time: '05:00', by: 'Sarah Jones II', to: 'Sarah Jones JJ', update: '2024-07-07' },
  { id: 19, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Spring', dept: 'Dept 19', priority: 'High', deadline: '2024-07-19', time: '06:00', by: 'Sarah Jones KK', to: 'Sarah Jones LL', update: '2024-07-08' },
  { id: 20, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Fall', dept: 'Dept 20', priority: 'Medium', deadline: '2024-07-20', time: '07:00', by: 'Sarah Jones MM', to: 'Sarah Jones NN', update: '2024-07-09' },
  { id: 21, flag: true, done: true, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Summer', dept: 'Dept 21', priority: 'Low', deadline: '2024-07-21', time: '08:00', by: 'Sarah Jones OO', to: 'Sarah Jones PP', update: '2024-07-10' },
  { id: 22, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Winter', dept: 'Dept 22', priority: 'High', deadline: '2024-07-22', time: '09:00', by: 'Sarah Jones QQ', to: 'Sarah Jones RR', update: '2024-07-11' },
  { id: 23, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Spring', dept: 'Dept 23', priority: 'Medium', deadline: '2024-07-23', time: '10:00', by: 'Sarah Jones SS', to: 'Sarah Jones TT', update: '2024-07-12' },
  { id: 24, flag: true, done: true, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Fall', dept: 'Dept 24', priority: 'Low', deadline: '2024-07-24', time: '11:00', by: 'Sarah Jones UU', to: 'Sarah Jones VV', update: '2024-07-13' },
  { id: 25, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Summer', dept: 'Dept 25', priority: 'High', deadline: '2024-07-25', time: '12:00', by: 'Sarah Jones WW', to: 'Sarah Jones XX', update: '2024-07-14' },
  { id: 26, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Winter', dept: 'Dept 26', priority: 'Medium', deadline: '2024-07-26', time: '13:00', by: 'Sarah Jones YY', to: 'Sarah Jones ZZ', update: '2024-07-15' },
  { id: 27, flag: true, done: true, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Spring', dept: 'Dept 27', priority: 'Low', deadline: '2024-07-27', time: '14:00', by: 'Sarah Jones AAA', to: 'Sarah Jones BBB', update: '2024-07-16' },
  { id: 28, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Fall', dept: 'Dept 28', priority: 'High', deadline: '2024-07-28', time: '15:00', by: 'Sarah Jones CCC', to: 'Sarah Jones DDD', update: '2024-07-17' },
  { id: 29, flag: true, done: false, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Summer', dept: 'Dept 29', priority: 'Medium', deadline: '2024-07-29', time: '16:00', by: 'Sarah Jones EEE', to: 'Sarah Jones FFF', update: '2024-07-18' },
  { id: 30, flag: true, done: true, tasks: 'Select looks for SS24 Lookbook Shoot', season: 'Winter', dept: 'Dept 30', priority: 'Low', deadline: '2024-07-30', time: '17:00', by: 'Sarah Jones GGG', to: 'Sarah Jones HHH', update: '2024-07-19' },
]);

const isAddNewTaskDrawerVisible = ref(false)
const editingTaskId = ref<number | null>(null);

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

const selectedItems = ref<number[]>([]);
const selectAll = ref(false);

// Computed property for indeterminate state
const indeterminate = computed(() => {
  return selectedItems.value.length > 0 && selectedItems.value.length < categoryData.value.length;
});

// Method to toggle select all
const toggleSelectAll = () => {
  if (selectAll.value) {
    selectedItems.value = categoryData.value.map(item => item.id);
  } else {
    selectedItems.value = [];
  }
};

</script>
<template>
  <VCard>
    <VCardTitle class="mt-2 ml-2">
      My tasks
    </VCardTitle>
    <VRow class="ml-3 mr-6">
      <VCol>
        <VSelect
          placeholder="Select Status"
        />
      </VCol>
      <VCol>
        <VSelect
          placeholder="Category"
        />
      </VCol>
      <VCol class="mb-2">
        <VSelect
          placeholder="Supplier"
        />
      </VCol>
      <VDivider/>
    </VRow>
    <VRow class="mt-5 ml-3 mb-5">
      <VCol cols="4">
        <VTextField
          placeholder="Search"
        />
      </VCol>
      <VRow justify="end" class="mt-3">
        <VBtn variant="outlined" @click="resetForm" class="mr-2">
          <VIcon icon="ri-upload-2-line" class="mr-2"/>
          Export
        </VBtn>
        <VBtn variant="tonal" class="btn mr-14" @click="isAddNewTaskDrawerVisible = !isAddNewTaskDrawerVisible">
          <VIcon icon="ri-add-line" class="mr-1"/>
          Add Task
        </VBtn>
      </VRow>
    </VRow>
    <VDataTable :headers="headers" :items="categoryData" item-value="id" class="text-no-wrap" fixed-header>
      <!-- Checkbox Header -->
      <template #header.checkbox>
        <VCheckbox
          class="mr-4"
          v-model="selectAll"
          :indeterminate="indeterminate"
          @change="toggleSelectAll"
        />
      </template>
      
      <!-- Row Checkbox -->
      <template #item.checkbox="{ item }">
        <VCheckbox v-model="selectedItems" :value="item.id" />
      </template>

      <!-- Flag -->
      <template #item.flag="{ item }">
        <span v-if="item.flag == true"><VIcon icon='ri-flag-line'/></span>
        <span v-else></span>
      </template>

      <!-- Done -->
      <template #item.done="{ item }">
        <VCheckbox v-model="item.done" />
      </template>

      <!-- Task -->
      <template #item.tasks="{ item }">
        <span>{{ item.tasks }}</span>
      </template>

      <!-- Season -->
      <template #item.season="{ item }">
        <VChip>{{ item.season }}</VChip>
      </template>

      <!-- Dept -->
      <template #item.dept="{ item }">
        <VChip>{{ item.dept }}</VChip>
      </template>

      <!-- Priority -->
      <template #item.priority="{ item }">
        <VChip>{{ item.priority }}</VChip>
      </template>

      <!-- Deadline -->
      <template #item.deadline="{ item }">
        <span>{{ item.deadline }}</span>
      </template>

      <!-- Time -->
      <template #item.time="{ item }">
        <span>{{ item.time }}</span>
      </template>

      <!-- Assigned by -->
      <template #item.by="{ item }">
        <span>{{ item.by }}</span>
      </template>

      <!-- Assigned to -->
      <template #item.to="{ item }">
        <span>{{ item.to }}</span>
      </template>

      <!-- Latest update -->
      <template #item.update="{ item }">
        <span>{{ item.update }}</span>
      </template>

      <!-- Footer  -->
      <template #bottom>
        <div></div>
      </template>
    </VDataTable>
  </VCard>
  <TaskDrawer
    v-model:isDrawerOpen="isAddNewTaskDrawerVisible"
    :editing-task-id="editingTaskId"
    :task-data="taskData"
    @add-task="addTask"
  />
</template>
<style lang="scss">
.btn {
  color: white;
  background: #9b9a9a;
}
</style>
