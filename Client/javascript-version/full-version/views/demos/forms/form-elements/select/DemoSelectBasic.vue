<script setup>
const items = [
  'Foo',
  'Bar',
  'Fizz',
  'Buzz',
]
</script>

<template>
  <VSelect
    :items="items"
    label="Standard"
    placeholder="Select Item"
    eager
  />
</template>
