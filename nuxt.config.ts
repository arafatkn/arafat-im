import { defineNuxtConfig } from 'nuxt3'

// https://v3.nuxtjs.org/docs/directory-structure/nuxt.config
export default defineNuxtConfig({
    ssr: false,
    head: {
        viewport: 'width=device-width, initial-scale=1, maximum-scale=1',
        charset: 'utf-8',
    },
})
