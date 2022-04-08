<script lang="ts">
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    text: {
      type: String,
      default: '',
    },
  },
})
</script>

<template>
  <button type="">{{ text }}</button>
</template>
