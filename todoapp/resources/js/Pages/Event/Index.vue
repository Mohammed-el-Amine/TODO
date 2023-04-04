<template>
    <div class="event-index">
        <h2>Liste des événements</h2>

        <div class="add-event">
            <button class="button is-success" @click="addEvent">Ajouter un événement</button>
        </div>


        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="my_event in my_events" :key="my_event.id">
                    <td>{{ my_event.title }}</td>
                    <td>{{ my_event.start_date }}</td>
                    <td>{{ my_event.end_date }}</td>
                    <td>{{ my_event.description }}</td>
                    <td>
                        <button @click="showEvent(my_event.id)">Voir</button>
                        <button @click="editEvent(my_event.id)">Modifier</button>
                        <button @click="deleteEvent(my_event.id)">Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
  
<style scoped>
.event-index {
    margin: 20px auto;
    max-width: 800px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background-color: #eee;
}

th {
    text-align: left;
    padding: 10px;
}

td {
    padding: 5px 10px;
    border-bottom: 1px solid #ccc;
}

td:last-child {
    text-align: right;
}

.button-group {
    display: inline-block;
    margin-right: 5px;
}

.button-group button {
    margin-right: 5px;
}

.add-event {
    text-align: center;
}
</style>
  
<script setup>
import router from '../../router'
import { defineProps } from 'vue'

const props = defineProps({
    my_events: {
        type: Array,
        required: true
    }
})
const showEvent = (eventId) => {
    router.push({ path: `/event/${eventId}` })
        .then(() => {
            // rafraîchir la page après modification
            location.reload();
        })
}

const editEvent = (eventId) => {
    // TODO: Implémenter l'affichage de la page Edit pour l'événement sélectionné
}

const deleteEvent = (eventId) => {
    // TODO: Implémenter la suppression de l'événement sélectionné
}
const addEvent = () => {
    router.push({ path: '/add/event' })
        .then(() => {
            location.reload();
        });
}

</script>
  