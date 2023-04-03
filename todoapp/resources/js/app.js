import { createApp } from 'vue'
import Show from './Pages/Event/Show.vue'
import router from './router.js'


const app = createApp({})

app.use(router)

app.component('show',Show)

app.mount('#app')