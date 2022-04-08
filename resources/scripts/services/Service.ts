import { AxiosInstance } from 'axios'
import { createInstance } from '@/scripts/plugins/axios'
import { ServiceInterface } from '@/scripts/interfaces/ServiceInterface'
import { GetManyResponse } from '@/scripts/interfaces/GetManyResponse'

export class Service<T> implements ServiceInterface<T> {
  axios: AxiosInstance = createInstance()

  resource: string

  constructor(resource: string) {
    this.resource = resource
  }

  async create(entity: T): Promise<T> {
    const {
      data: { data },
    } = await this.axios.post(this.resource, entity)
    return data
  }

  async destroy(id: number): Promise<void> {
    const { data } = await this.axios.delete(
      `${this.resource}/${id.toString()}`,
    )
    return data
  }

  async getOne(id: number): Promise<T> {
    const {
      data: { data },
    } = await this.axios.get(`${this.resource}/${id.toString()}`)
    return data
  }

  async update(entity: T, id: number): Promise<T> {
    const {
      data: { data },
    } = await this.axios.put(`${this.resource}/${id.toString()}`, entity)
    return data
  }

  async getMany(): Promise<GetManyResponse<T>> {
    const { data } = await this.axios.get(this.resource)
    return data
  }
}
