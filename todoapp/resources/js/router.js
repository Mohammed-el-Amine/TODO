import { createRouter, createWebHistory } from 'vue-router'
import Show from './Pages/Event/Show.vue'
import Create from './Pages/Event/Create.vue'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/event/:id', component: Show },
    { path: '/event' },
    { path: '/add/event' }
  ]
});

export default router