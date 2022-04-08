<template>
  <div class="container">
    <router-link :to="{ name: 'article.create' }" class="btn btn-primary"
      >Add</router-link
    >
    <table class="table">
      <thead>
        <th>#</th>
        <th>name</th>
        <th>action</th>
      </thead>
      <tbody>
        <tr v-for="(item, key) in items" :key="key">
          <td>{{ item.article_id }}</td>
          <td>{{ item.name }}</td>
          <td>
            <router-link
              class="btn btn-primary btn-sm me-3"
              :to="{ name: 'article.detail', params: { id: item.article_id } }"
              >Detail
            </router-link>
            <router-link
              class="btn btn-secondary btn-sm me-3"
              :to="{ name: 'article.update', params: { id: item.article_id } }"
              >Edit
            </router-link>
            <button
              class="btn btn-danger btn-sm"
              @click="deleteArticle(item.article_id)"
            >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import { useArticleComposables } from '../../composables/ArticleComposable'

const { items, getMany, destroy } = useArticleComposables()

onMounted(getMany)

function deleteArticle(id: number) {
  if (confirm('Are your want delete')) {
    destroy(id).then(getMany)
  }
}
</script>
