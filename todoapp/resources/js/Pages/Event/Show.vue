<template>
  <div class="event-show">
    <p>Vue d'un évènement</p>
    <h2>{{ my_event ? my_event.title : 'Aucun événement trouvé' }}</h2>
    <p>Date de début : {{ my_event ? formatDate(my_event.start_date) : 'Inconnue' }}</p>
    <p>{{ my_event ? my_event.description : 'Aucune description disponible' }}</p>
    <p>Date de fin : {{ my_event ? formatEndDate(my_event.end_date) : 'Inconnue' }}</p>

    <div class="button-group">
      <button class="button is-danger" @click="deleteEvent(my_event.id)">Supprimer</button>
      <button class="button is-warning" @click="editEvent(my_event.id)">Modifier</button>
    </div>

  </div>
</template>

<script setup>
import moment from 'moment';
import router from '../../router'
import { Inertia } from '@inertiajs/inertia'
moment.locale('fr')

const props = defineProps({ my_event: Object })

const formatDate = (dateString) => {
  return moment(dateString).local().format('D MMMM YYYY à HH:mm');
}
const formatEndDate = (EndDateString) => {
  return moment(EndDateString).local().format('D MMMM YYYY à HH:mm');
}

const deleteEvent = (eventId) => {
  if (confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')) {
    Inertia.delete(`/events/${eventId}`)
      .then(() => {
      });
  }
};

const editEvent = (eventId) => {
  router.push({ path: `/update/event/${eventId}` })
    .then(() => {
      location.reload();
    })
}
</script>

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

.button-group {
  margin-top: 20px;
}

.button {
  margin-right: 10px;
}

.button.is-warning {
  background-color: #FFC107;
  color: #FFFFFF;
  border: none;
}

.button.is-danger {
  background-color: #F44336;
  color: #FFFFFF;
  border: none;
}

.button.is-primary {
  background-color: #209cee;
  color: #FFFFFF;
  border: none;
}
</style>