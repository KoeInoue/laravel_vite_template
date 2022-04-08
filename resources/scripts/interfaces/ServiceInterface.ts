import { GetManyResponse } from '@/scripts/interfaces/GetManyResponse'

export interface ServiceInterface<T> {
  getOne(id: number): Promise<T>
  getMany(): Promise<GetManyResponse<T>>
  create(entity: T): Promise<T>
  update(entity: T, id: number): Promise<T>
  destroy(id: number): Promise<void>
}
