import { Service } from '@/scripts/services/Service'
import { ArticleEntity } from '@/scripts/entities/ArticleEntity'

export class ArticleService extends Service<ArticleEntity> {
  constructor() {
    super('article')
  }
}
