<script lang="ts" setup>
import TeamDrawer from "@/views/account/TeamDrawer.vue"
import { ref } from 'vue';

const selectedRole = ref<string | null>(null);
const isAddCustomerDrawerOpen = ref(false)
const typeOfRole = ref<string[]>([
  'Admin',
  'Read Only',
]);


// 👉 headers
const headers = [
  {
    title: 'User',
    key: 'user',
  },
  {
    title: 'Role',
    key: 'role',
  },
  {
    title: 'Setting',
    key: 'setting',
    sortable: false,
  },
]

// Dummy data for the table
const teamMembers = ref([
  {
    id: 1,
    user: {
      name: 'John Doe',
      companyEmail: 'johndoe@example.com',
      avatar: '', // URL to the avatar image if available, otherwise empty string
    },
    role: 'Read Only',
  },
  {
    id: 2,
    user: {
      name: 'Jane Smith',
      companyEmail: 'janesmith@example.com',
      avatar: '', // URL to the avatar image if available, otherwise empty string
    },
    role: 'Admin',
  },
  // Add more members as needed
]);

definePageMeta({
  layout: "account",
});
</script>


<template>
  <VContainer>
    <VRow justify="end">
      <VCol cols="9">
        <VCard class="mt-6">
          <VCardItem>
            <VCardTitle class="mt-2">Invite Team Members</VCardTitle>
            <p>Get your projects up and running faster by inviting your team to collaborate.</p>
            <VCol cols="12">
              <VRow class="ml-1">
                <VTextField
                  class="text-field"
                  autofocus
                  placeholder="johndoe@gmail.com"
                />
                <v-select
                  v-model="selectedRole"
                  :items="typeOfRole"
                  label="Role"
                  placeholder="Select a Role"
                />
              </VRow>
            </VCol>
            <VBtn variant="tonal" class="btn mt-5">
              <VIcon
                size="20"
                class="mr-1"
                icon="ri-mail-open-line"  
              /> Send Invite
            </VBtn>
          </VCardItem>
        </VCard>
          <VCard class="mt-6">
            <VCardTitle class="mt-2">Team Members</VCardTitle>
            <VCardSubtitle class="pb-2">Manage your existing team and change roles/permissions.</VCardSubtitle>
            <VCol>
            <VDataTable
              :headers="headers"
              :items="teamMembers"
              item-value="id"
              class="text-no-wrap billing-history-table"
            >
              <!-- User -->
              <template #item.user="{ item }">
                <div class="d-flex align-center pt-2 pb-3">
                  <VAvatar
                    size="34"
                    :color="!item.user.avatar.length ? 'grey' : undefined"
                    :variant="!item.user.avatar.length ? 'tonal' : undefined"
                    class="me-3"
                  >
                    <VImg
                      v-if="item.user.avatar.length"
                      :src="item.user.avatar"
                    />
                    <span v-else>{{ item.user.name.charAt(0) }}</span>
                  </VAvatar>
                  <div class="d-flex flex-column">
                    {{ item.user.name }}
                    <div class="text-body-2">
                      {{ item.user.companyEmail }}
                    </div>
                  </div>
                </div>
              </template>

              <!-- Role -->
              <template #item.role="{ item }">
                <span>{{ item.role }}</span>
              </template>

              <!-- Actions -->
              <template #item.setting="{ item }">
                <IconBtn
                  size="small"
                >
                  <VIcon icon="ri-pencil-line" />
                </IconBtn>
                <IconBtn
                  size="small"
                  icon="ri-delete-bin-7-line"
                />
              </template>
              <template #bottom>
                <div class="d-flex justify-start py-2">
                  <VBtn variant="outlined" @click="isAddCustomerDrawerOpen = !isAddCustomerDrawerOpen" >Add User</VBtn>
                </div>
              </template>
            </VDataTable>
          </VCol>
        </VCard>
      </VCol>
      <TeamDrawer v-model:is-drawer-open="isAddCustomerDrawerOpen" />
    </VRow>
  </VContainer>
</template>
<style scoped lang="scss">
.text-field {
  margin-left: -1rem;
  margin-right: 1rem;
}
.btn{
  background-color: #9a9b9b;
  color: white;
  border-radius: 2rem;
}
</style>
