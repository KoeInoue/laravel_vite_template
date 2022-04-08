import { ref } from 'vue'
import { ArticleEntity } from '@/scripts/entities/ArticleEntity'
import { ArticleService } from '@/scripts/services/ArticleService'

export function useArticleComposables() {
  const items = ref<ArticleEntity[]>()
  const item = ref<Partial<ArticleEntity>>()
  const articleService: ArticleService = new ArticleService()

  const getOne = async (id: number) => {
    try {
      item.value = await articleService.getOne(id)
    } catch (e) {
      //
    }
  }

  const getMany = async () => {
    try {
      const { data } = await articleService.getMany()
      items.value = data
    } catch (e) {
      //
    }
  }

  const destroy = async (id: number): Promise<void> => {
    await articleService.destroy(id)
  }

  const update = async (article: ArticleEntity): Promise<ArticleEntity> => {
    return await articleService.update(article, article.article_id)
  }

  const create = async (article: ArticleEntity): Promise<ArticleEntity> => {
    return await articleService.create(article)
  }

  return { items, item, getOne, getMany, create, update, destroy }
}
