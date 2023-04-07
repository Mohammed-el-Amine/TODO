import { createRouter, createWebHistory } from 'vue-router'
import Show from './Pages/Event/Show.vue'
import Index from './Pages/Event/Index.vue'
import Update from './Pages/Event/Update.vue';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/event/:id', component: Show },
    { path: '/event', component: Index },
    { path: '/add/event' },
    { path: '/', component: Index},
    { path: '/update/event/:id', component: Update }
  ]
});

export default router