<template>
  <div class="event-show">
    <p>Vue d'un évènement</p>
    <h2>{{ my_event ? my_event.title : 'Aucun événement trouvé' }}</h2>
    <p>Date de début : {{ my_event ? my_event.start_date : 'Inconnue' }}</p>
    <p>{{ my_event ? my_event.description : 'Aucune description disponible' }}</p>

    <p>Date de fin : {{ my_event ? my_event.end_date : 'Inconnue' }}</p>

    <div class="button-group">
      <button class="button is-info" @click="goBack">Retour</button>
      <button class="button is-danger" @click="deleteEvent">Supprimer</button>
    </div>
  </div>
</template>

<style>
.event-show {
  padding: 20px;
  background-color: #f2f2f2;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  max-width: 600px;
  margin: 0 auto;
  text-align: center;
}

.event-show h2 {
  font-size: 2rem;
  margin-top: 20px;
  margin-bottom: 10px;
}

.event-show p {
  font-size: 1.2rem;
  margin-top: 10px;
  margin-bottom: 10px;
}
</style>

<script setup>
import router from '../../router'

const props = defineProps({ my_event: Object })

const deleteEvent = () => {
  // TODO: Implémenter la suppression de l'événement sélectionné
}

const goBack = () => {
  router.go(-1)
}
</script>