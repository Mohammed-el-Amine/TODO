<template>
    <div class="event-index">
        <h2>Liste des événements</h2>

        <div class="add-event">
            <button class="button is-success" @click="toggleCreateModal">
                Ajouter un événement
            </button>
        </div>

        <div>
            <DateRangePickerEvent />
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
                    <td>{{ moment(my_event.start_date).local().format('D MMMM YYYY à HH:mm') }}</td>
                    <td>{{ moment(my_event.end_date).local().format('D MMMM YYYY à HH:mm') }}</td>
                    <td>{{ my_event.description }}</td>
                    <td>
                        <button class="button is-info" @click="toggleShowModal(my_event)">voir</button>

                        <div class="show-event">
                            <button class="button is-warning" @click="toggleEditModal(my_event)">Modifier</button>
                        </div>

                        <button class="button is-danger" @click="deleteEvent(my_event.id)">Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- MODAL -->

        <div class="modal" :class="{ 'is-active': createModal }" @click.self="toggleCreateModal">
            <div class="modal-background" @click="toggleCreateModal"></div>
            <div class="modal-card">
                <section class="modal-card-body">
                    <CreateEvent />
                </section>
            </div>
        </div>

        <div class="modal" :class="{ 'is-active': editModal }" @click.self="toggleEditModal">
            <div class="modal-background" @click="toggleEditModal"></div>
            <div class="modal-card">
                <section class="modal-card-body">
                    <Update :my_event="event" />
                </section>
            </div>
        </div>

        <div class="modal" :class="{ 'is-active': showModal }" @click.self="toggleShowModal">
            <div class="modal-background" @click="toggleShowModal"></div>
            <div class="modal-card">
                <section class="modal-card-body">
                    <Show :my_event="event" />
                </section>
            </div>
        </div>

    </div>
</template> 
  
<script setup>
import { defineProps, ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import moment from 'moment'
import CreateEvent from './Create.vue'
import Update from './Update.vue'
import Show from './Show.vue'
import DateRangePickerEvent from './DateRangePicker.vue';
moment.locale('fr')

const props = defineProps({
    my_events: {
        type: Array,
        required: true,
    },
})

const event = ref({});
const createModal = ref(false)
const editModal = ref(false)
const showModal = ref(false)

const deleteEvent = (eventId) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')) {
        Inertia.delete(`/events/${eventId}`).then(() => {
            location.reload()
        })
    }
}

const toggleCreateModal = () => {
    createModal.value = !createModal.value
}

const toggleEditModal = (eventId) => {
    editModal.value = !editModal.value
    event.value = eventId
}

const toggleShowModal = (eventId) => {
    showModal.value = !showModal.value
    event.value = eventId
}
</script>

<style scoped>
.crud-container {
    margin: 20px auto;
    max-width: 800px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background-color: #f8fafc;
    color: #718096;
}

th {
    text-align: left;
    padding: 12px;
}

td {
    padding: 10px 12px;
    border-bottom: 1px solid #edf2f7;
}

td:last-child {
    text-align: right;
}

.add-button {
    text-align: right;
    margin-bottom: 10px;
}

.add-button button {
    background-color: #48bb78;
    color: #fff;
    padding: 8px 12px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.add-button button:hover {
    background-color: #38a169;
}

.edit-button,
.delete-button {
    background-color: #4299e1;
    color: #fff;
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.edit-button:hover,
.delete-button:hover {
    background-color: #3182ce;
}

.show-button {
    background-color: #e53e3e;
    color: #fff;
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.show-button:hover {
    background-color: #c53030;
}

.is-danger {
    background-color: #ff3860;
}

.is-warning {
    background-color: #ffdd57;
}

.is-info {
    background-color: #209cee;
}

.form-container {
    margin: 20px auto;
    max-width: 800px;
    padding: 20px;
    background-color: #f8fafc;
    border-radius: 3px;
}

.form-container h2 {
    margin-top: 0;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 10px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group input[type="date"],
.form-group textarea {
    width: 100%;
    padding: 10px;
    border-radius: 3px;
    border: 1px solid #cbd5e0;
    box-sizing: border-box;
    font-size: 16px;
}

.form-group textarea {
    height: 150px;
}

.form-group input[type="submit"] {
    background-color: #48bb78;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.form-group input[type="submit"]:hover {
    background-color: #38a169;
}

.modal {
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: none;
}

.modal.is-active {
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-card {
    width: 50%;
    max-width: 800px;
    background-color: #fff;
    border-radius: 3px;
    overflow: hidden;
}
</style>
  