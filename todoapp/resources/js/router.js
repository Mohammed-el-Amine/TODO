import { createRouter, createWebHistory } from 'vue-router'
import Show from './Pages/Event/Show.vue'

// const routes = [
//   {
//     path: '/event/:id',
//     name: 'event.show',
//     component: Show,
//     props: true
//   }
// ]

const router = createRouter({
  history: createWebHistory(),
  routes :[
  { path : '/event/:id', component: Show },
  ]
})

export default router