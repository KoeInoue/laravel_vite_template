interface ImportMetaEnv {
  readonly VITE_APP_TITLE: string
  readonly VUE_APP_BASE_URL: string
}

interface ImportMeta {
  readonly env: ImportMetaEnv
}
