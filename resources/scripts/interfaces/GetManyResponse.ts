import { PaginationMetaInterface } from '@/scripts/interfaces/PaginationMetaInterface'

export interface GetManyResponse<T> {
  data: T[]
  meta: PaginationMetaInterface
}
