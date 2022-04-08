<script lang="ts" setup>
import { useArticleComposables } from '@/scripts/composables/ArticleComposable'
import { useRouter } from 'vue-router'
import { ArticleEntity } from '@/scripts/entities/ArticleEntity'
import { ref } from 'vue'
const router = useRouter()
const { create } = useArticleComposables()
const item = ref({ name: '', body: '' })
function save() {
  create(item.value as ArticleEntity).then(() => {
    router.push({ name: 'article.index' })
  })
}
</script>

<template>
  <div class="container">
    <h1>Add</h1>
    <form @submit.prevent="save">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input v-model="item.name" type="text" class="form-control" />
      </div>
      <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea v-model="item.body" class="form-control" rows="3"></textarea>
      </div>
      <div class>
        <button class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</template>
