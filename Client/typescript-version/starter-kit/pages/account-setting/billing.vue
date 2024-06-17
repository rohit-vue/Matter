<template>
  <VContainer class="accountUser">
    <VRow justify="end">
      <VCol cols="9">
        <VCard title="Current Plan">
          <VCardText>
            <VRow>
              <VCol cols="12" md="6">
                <div class="d-flex flex-column gap-y-6">
                  <div class="d-flex flex-column gap-y-1">
                    <h6 class="text-h6">
                      Your Current Plan is Basic
                    </h6>
                    <div>
                      A simple start for everyone
                    </div>
                  </div>

                  <div class="d-flex flex-column gap-y-1">
                    <h6 class="text-h6">
                      Active until Dec 09, 2021
                    </h6>
                    <div>
                      We will send you a notification upon Subscription expiration
                    </div>
                  </div>

                  <div class="d-flex flex-column gap-y-1">
                    <div class="d-flex align-center gap-x-2">
                      <h6 class="text-h6">
                        $199 Per Month
                      </h6>
                      <VChip color="primary" size="small">
                        Popular
                      </VChip>
                    </div>
                    <p class="text-base mb-0">
                      Standard plan for small to medium businesses
                    </p>
                  </div>
                </div>
              </VCol>

              <VCol cols="12" md="6">
                <VAlert type="warning" variant="tonal" title="We need your attention!"
                  text="Your plan requires update" />

                <!-- progress -->
                <h6 class="d-flex text-h6 justify-space-between mt-6 mb-1">
                  <div>Days</div>
                  <div>12 of 30 Days</div>
                </h6>
                <VProgressLinear color="primary" rounded height="6" model-value="75" />
                <p class="text-base mt-1">
                  18 days remaining until your plan requires update
                </p>
              </VCol>

              <VCol cols="12">
                <div class="d-flex flex-wrap gap-4">
                  <VBtn @click="isPricingPlanDialogVisible = true">
                    upgrade plan
                  </VBtn>

                  <VBtn color="error" variant="outlined" @click="isConfirmDialogVisible = true">
                    Cancel Subscription
                  </VBtn>
                </div>
              </VCol>
            </VRow>

            <!-- 👉 Confirm Dialog -->
            <ConfirmDialog v-model:isDialogVisible="isConfirmDialogVisible"
              confirmation-question="Are you sure to cancel your subscription?" cancel-msg="Unsubscription Cancelled!!"
              cancel-title="Cancelled" confirm-msg="Your subscription cancelled successfully."
              confirm-title="Unsubscribed!" />

            <!-- 👉 plan and pricing dialog -->
            <PricingPlanDialog v-model:is-dialog-visible="isPricingPlanDialogVisible" />
          </VCardText>
        </VCard>
        <VCard class="mt-6">
          <VRow justify="space-between" align="center" class="mr-5 ml-1 mt-2">
            <VCol class="d-flex align-center">
              <VCardText class="permission-header">Paymemt Method</VCardText>
            </VCol>
            <VCol class="d-flex justify-end">
              <VBtn variant="tonal" class="btn3">
                + Add Card 
              </VBtn>
            </VCol>
          </VRow>
          <VCardText>
              <!-- 👉 Saved Cards -->
              <VCol cols="12">
                <div class="d-flex flex-column gap-y-4">
                  <VCard v-for="card in creditCards" :key="card.name"
                    color="rgba(var(--v-theme-on-surface), var(--v-hover-opacity))" flat>
                    <VCardText class="d-flex flex-sm-row flex-column">
                      <div class="text-no-wrap">
                        <img :src="card.image">
                        <div class="d-flex align-center gap-x-4">
                          <h6 class="text-h6 my-2">
                            {{ card.name }}
                          </h6>
                          <VChip v-if="card.isPrimary" color="primary" size="small">
                            Primary
                          </VChip>
                        </div>
                        <div>**** **** **** {{ card.number.substring(card.number.length - 4) }}</div>
                      </div>

                      <VSpacer />

                      <div class="d-flex flex-column text-sm-end">
                        <div class="d-flex flex-wrap gap-4 order-sm-0 order-1">
                          <VBtn variant="outlined" @click="openEditCardDialog(card)">
                            Edit
                          </VBtn>
                          <VBtn color="error" variant="outlined">
                            Delete
                          </VBtn>
                        </div>
                        <div class="my-4 text-body-2 order-sm-1 order-0">
                          Card expires at {{ card.expiry }}
                        </div>
                      </div>
                    </VCardText>
                  </VCard>
                </div>

                <!-- 👉 Add Edit Card Dialog -->
                <CardAddEditDialog v-model:isDialogVisible="isCardEditDialogVisible"
                  :card-details="currentCardDetails" />
              </VCol>
          </VCardText>
        </VCard>
      </VCol>
    </VRow>
  </VContainer>
</template>
<script lang="ts" setup>
// import BillingHistoryTable from './BillingHistoryTable.vue'
import mastercard from '@images/icons/payments/mastercard.png'
import visa from '@images/icons/payments/visa.png'
import { VCardTitle } from 'vuetify/lib/components/index.mjs';

const selectedPaymentMethod = ref('credit-debit-atm-card')
const isPricingPlanDialogVisible = ref(false)
const isConfirmDialogVisible = ref(false)
const isCardEditDialogVisible = ref(false)
const isCardDetailSaveBilling = ref(false)


const creditCards = [
  {
    name: 'Tom McBride',
    number: '5531234567899856',
    expiry: '12/23',
    isPrimary: true,
    type: 'visa',
    cvv: '456',
    image: mastercard,
  },
  {
    name: 'Mildred Wagner',
    number: '4851234567895896',
    expiry: '10/27',
    isPrimary: false,
    type: 'mastercard',
    cvv: '123',
    image: visa,
  },
]

const countryList = [
  'United States',
  'Canada',
  'United Kingdom',
  'Australia',
  'New Zealand',
  'India',
  'Russia',
  'China',
  'Japan',
]

const currentCardDetails = ref()

const openEditCardDialog = cardDetails => {
  currentCardDetails.value = cardDetails
  isCardEditDialogVisible.value = true
}

const cardNumber = ref(135632156548789)
const cardName = ref('john Doe')
const cardExpiryDate = ref('05/24')
const cardCvv = ref(420)



definePageMeta({
  layout: "account",
})
</script>
