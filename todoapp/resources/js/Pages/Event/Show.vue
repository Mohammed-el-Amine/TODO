<template>
  <div class="event-show">
    <h1>{{ event ? event.title : 'Aucun événement trouvé' }}</h1>
    <p>salut</p>
    <p>Date de début : {{ event ? event.start_date : 'Inconnue' }}</p>
    <p>{{ event ? event.description : 'Aucune description disponible' }}</p>
  </div>
</template>



<script>
import { defineComponent, computed } from 'vue';
import { useRoute } from 'vue-router';
import { usePage } from '@inertiajs/inertia-vue3';

export default defineComponent({
  setup() {
    const { event } = usePage().props;
    const route = useRoute();

    const isEventDefined = computed(() => !!event);

    return {
      event,
      route,
      isEventDefined,
    };
  },
});
</script>


