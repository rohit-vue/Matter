<!-- eslint-disable vue/max-attributes-per-line -->
<!-- eslint-disable vue/html-self-closing -->
<!-- eslint-disable vue/html-self-closing -->
<script setup lang="ts">
import AuthProvider from '@/views/pages/authentication/AuthProvider.vue'
import { themeConfig } from '@themeConfig'
import { VNodeRenderer } from '@layouts/components/VNodeRenderer'

const router = useRouter()
const route = useRoute()

const form = ref({
  email: '',
  password: '',
  remember: false,
})

const isPasswordVisible = ref(false)
const isLoading = ref(false)
const error = ref('')

async function handleLogin() {
  try {
    isLoading.value = true
    error.value = ''

    console.log(form.value.remember);
    const response = await fetch("http://localhost:8000/api/login", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ email: form.value.email, password: form.value.password, remember: form.value.remember }),
    })

    if (!response.ok) {
      throw new Error('Invalid email or password')
    }

    router.push({
      name: "index"
    })
  } catch (e: any) {
    error.value = e.message
    console.error(e)
  } finally {
    isLoading.value = false
  }
}

onMounted(async () => {
try {
  const token = route.query.token;
  if (token) {
    const response = await fetch(`http://localhost:8000/api/verify/${token}`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      // Optionally, you may need to send additional data along with the token
      // body: JSON.stringify({  }),
    });

    if (response.ok) {
      // Email successfully verified, you can redirect or show a success message
      console.log("Email verified successfully!");
    } else {
      // Handle error if verification fails
      console.error("Email verification failed:", response.statusText);
    }
  } else {
    // Token not found in URL params
    console.log("Token not found in URL params.");
  }
} catch (error) {
  console.error("Error occurred during email verification:", error);
}
});

definePageMeta({
  layout: "blank",
})
</script>


<template>
  <VContainer>
    <VRow class="my-container">
      <VCol
        cols="12"
        md="4"
        class="auth-card-v2 d-flex align-center justify-center"
        style="background-color: rgb(var(--v-theme-surface))"
      >
        <VCard flat :max-width="700" class="mt-5">
          <div class="d-flex align-center justify-center gap-x-3">
            <VNodeRenderer :nodes="themeConfig.app.logo" />
            <h1 class="auth-title">
              matter
            </h1>
          </div>
          <VCardText class="mt-1">
            <h4 class="text-h4 mb-1">Welcome to {{ themeConfig.app.title }}! 👋🏻</h4>
            <p class="mb-0">Please sign-in to your account and start the adventure</p>
          </VCardText>
          <VCardText>
            <VForm @submit.prevent="handleLogin()">
              <VRow>
                <!-- email -->
                <VCol cols="12">
                  <VTextField
                    v-model="form.email"
                    autofocus
                    label="Email"
                    type="email"
                    placeholder="johndoe@email.com"
                  />
                </VCol>

                <!-- password -->
                <VCol cols="12" class="my-component">
                  <VTextField
                    v-model="form.password"
                    label="Password"
                    placeholder="············"
                    :type="isPasswordVisible ? 'text' : 'password'"
                    :append-inner-icon="
                      isPasswordVisible ? 'ri-eye-off-line' : 'ri-eye-line'
                    "
                    @click:append-inner="isPasswordVisible = !isPasswordVisible"
                  />

                  <div
                    class="d-flex align-center flex-wrap justify-space-between my-5 gap-4"
                  >
                    <VCheckbox
                      v-model="form.remember"
                      label="Remember me"
                    />
                    <NuxtLink
                      style="color: gray"
                      :to="{ name: 'forget-password' }"
                    >
                      Forget Password?
                    </NuxtLink>
                  </div>
                  <button class="myBtn" type="submit">
                    Login
                  </button>
              
                </VCol>

                <!-- create account -->
                <VCol cols="12" class="text-center text-base">
                  <span style="color: black">New on our platform?</span>
                  <NuxtLink
                    style="color: gray"
                    :to="{ name: 'register' }"
                  >
                    Create an account
                  </NuxtLink>
                </VCol>

                <VCol cols="12" class="d-flex align-center">
                  <VDivider />
                  <span class="mx-2 text-high-emphasis">or</span>
                  <VDivider />
                </VCol>

                <!-- auth providers -->
                <VCol cols="12" class="text-center">
                  <AuthProvider />
                </VCol>
              </VRow>
            </VForm>
          </VCardText>
        </VCard>
      </VCol>
    </VRow>
  </VContainer>
</template>


<style lang="scss">
@use "assets/styles/styles.scss";
</style>
