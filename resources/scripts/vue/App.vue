<script setup>
  import { ref } from 'vue'

  const count = ref(0)
  const addCount = () => {
    count.value++
  }
</script>

<template>
  <button @click="addCount">clicked{{ count }} time</button>
</template>