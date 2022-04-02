<script lang="ts">
import { computed, defineComponent, PropType } from 'vue'
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
