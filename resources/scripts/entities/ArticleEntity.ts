import { UserEntity } from '@/scripts/entities/UserEntity'

export interface ArticleEntity {
  article_id: number
  name: string
  body: string
  user_id?: number
  created_at: string
  updated_at: string
  user?: UserEntity
}
