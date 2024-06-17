<script lang="ts" setup>
const recentDevicesHeaders = [
  {
    title: 'BROWSER',
    key: 'browser',
  },
  {
    title: 'DEVICE',
    key: 'device',
  },
  {
    title: 'LOCATION',
    key: 'location',
  },
  {
    title: 'RECENT ACTIVITY',
    key: 'recentActivity',
  },
]

const recentDevices = [
  {
    browser: 'Chrome on Windows',
    device: 'HP Spectre 360',
    location: 'New York, NY',
    recentActivity: '28 Apr 2022, 18:20',
    deviceIcon: {
      icon: 'ri-macbook-line',
      color: 'primary',
    },
  },
  {
    browser: 'Chrome on iPhone',
    device: 'iPhone 12x',
    location: 'Los Angeles, CA',
    recentActivity: '20 Apr 2022, 10:20',
    deviceIcon: {
      icon: 'ri-android-line',
      color: 'error',
    },
  },
  {
    browser: 'Chrome on Android',
    device: 'Oneplus 9 Pro',
    location: 'San Francisco, CA',
    recentActivity: '16 Apr 2022, 04:20',
    deviceIcon: {
      icon: 'ri-smartphone-line',
      color: 'success',
    },
  },
  {
    browser: 'Chrome on macOS',
    device: 'Apple iMac',
    location: 'New York, NY',
    recentActivity: '28 Apr 2022, 18:20',
    deviceIcon: {
      icon: 'ri-mac-line',
      color: 'secondary',
    },
  },
  {
    browser: 'Chrome on Windows',
    device: 'HP Spectre 360',
    location: 'Los Angeles, CA',
    recentActivity: '20 Apr 2022, 10:20',
    deviceIcon: {
      icon: 'ri-macbook-line',
      color: 'primary',
    },
  },
  {
    browser: 'Chrome on Android',
    device: 'Oneplus 9 Pro',
    location: 'San Francisco, CA',
    recentActivity: '16 Apr 2022, 04:20',
    deviceIcon: {
      icon: 'ri-android-line',
      color: 'success',
    },
  },
]

definePageMeta({
  layout: "account",
})
</script>
<template>
  <VContainer>
    <VRow justify="end">
      <VCol cols="9">
        <VCard>
        <VCardItem class="pb-6">
          <VCardTitle class="pb-6">Change Password</VCardTitle>
          <VAlert variant="tonal" title="Ensure that these requirements are met"
          text="Minimum 8 characters long, uppercase & symbol" dismissible/>
        </VCardItem>
        <VForm>
          <VCardText class="pt-0">
            <!-- 👉 New Password -->
            <VRow>
              <VCol
                cols="12"
                md="6"
              >
                <!-- 👉 new password -->
                <VTextField
                  v-model="newPassword"
                  :type="isNewPasswordVisible ? 'text' : 'password'"
                  :append-inner-icon="isNewPasswordVisible ? 'ri-eye-off-line' : 'ri-eye-line'"
                  label="New Password"
                  autocomplete="on"
                  placeholder="············"
                  @click:append-inner="isNewPasswordVisible = !isNewPasswordVisible"
                />
              </VCol>

              <VCol
                cols="12"
                md="6"
              >
                <!-- 👉 confirm password -->
                <VTextField
                  v-model="confirmPassword"
                  :type="isConfirmPasswordVisible ? 'text' : 'password'"
                  :append-inner-icon="isConfirmPasswordVisible ? 'ri-eye-off-line' : 'ri-eye-line'"
                  autocomplete="on"
                  label="Confirm New Password"
                  placeholder="············"
                  @click:append-inner="isConfirmPasswordVisible = !isConfirmPasswordVisible"
                />
              </VCol>
            </VRow>
          </VCardText>

          <!-- 👉 Password Requirements -->
          <VCardText>
            <!-- 👉 Action Buttons -->
            <div class="d-flex flex-wrap gap-4">
              <VBtn variant="tonal" class="btn3" style="font-weight: 300;">
                Change Password
              </VBtn>
            </div>
          </VCardText>
        </VForm>
      </VCard>
      <VCard class="mt-6">
        <VCardItem>
          <VCardTitle class="mt-2">Two-steps verification</VCardTitle>
          <p>Keep your account secure with authentication step.</p>
          <VCardTitle>Email</VCardTitle>
          <VCol cols="12">
            <VRow class="ml-1">
              <VTextField
                style="margin-left: -1rem"
                class="mt-3"
                autofocus
                label="Email Address"
                placeholder="johndoe@gmail.com"
              />
              <!-- <VIcon icon="ri-user-add-line" /> -->
              <button class="pl-4">
                <img src="@/assets/images/icons/brands/Icon.png" alt="Chat GPT" class="pt-3" />
              </button>
              <button class="pl-4">
                <img src="@/assets/images/icons/brands/user-add-line.png" alt="Chat GPT" class="pt-3" />
              </button>
            </VRow>
          </VCol>
        </VCardItem>
        <VCardText>Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in. Learn more.</VCardText>
      </VCard>
      <VCard
        title="Recent Devices"
        class="recentDeviceCard mt-6"
      >
        <VDataTable
          :headers="recentDevicesHeaders"
          :items="recentDevices"
          hide-default-footer
          class="text-no-wrap"
        >
          <template #item.browser="{ item }">
            <div class="d-flex gap-x-3">
              <VIcon
                size="20"
                :icon="item.deviceIcon.icon"
                :color="item.deviceIcon.color"
              />
              <h6 class="text-h6">
                {{ item.browser }}
              </h6>
            </div>
          </template>
          <!-- TODO Refactor this after vuetify provides proper solution for removing default footer -->
          <template #bottom />
        </VDataTable>
      </VCard>
      </VCol>
    </VRow>
  </VContainer>
</template>
