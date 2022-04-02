<script setup lang="ts">
import { ref } from 'vue'

const count = ref(0)
const addCount = (): void => {
  count.value++
}
</script>

<template>
  <button @click="addCount()">Clicked{{ count }} time</button>
</template>
