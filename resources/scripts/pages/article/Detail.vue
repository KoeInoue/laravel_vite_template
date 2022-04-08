<script setup lang="ts">
import { defineProps } from 'vue'
import { useArticleComposables } from '@/scripts/composables/ArticleComposable'
const { item, getOne } = useArticleComposables()
const props = defineProps({
  id: {
    type: [String],
    required: true,
  },
})
getOne(parseInt(props.id))
</script>

<template>
  <div v-if="item" class="container">
    <h1>{{ item.name }}</h1>
    <div>{{ item.body }}</div>
  </div>
</template>
