import { App } from 'vue'
import axios, { AxiosInstance } from 'axios'

export const http = {
  install: (app: App) => {
    const instance: AxiosInstance = createInstance()
    app.config.globalProperties.$http = instance
    app.provide('$http', instance)
  },
}

const createInstance = (): AxiosInstance => {
  const instance = axios.create({
    baseURL: import.meta.env.VUE_APP_BASE_URL,
    headers: {
      'Content-Type': 'application/json',
    },
    timeout: 2000,
  })

  return instance
}
