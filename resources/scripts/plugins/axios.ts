import { App } from 'vue'
import axios, { AxiosInstance } from 'axios'

export const http = {
  install: (app: App) => {
    const instance: AxiosInstance = createInstance()
    app.config.globalProperties.$http = instance
    app.provide('$http', instance)
  },
}

export const createInstance = (): AxiosInstance => {
  return axios.create({
    baseURL: '/api/',
    headers: {
      'Content-Type': 'application/json',
    },
    timeout: 2000,
  })
}
