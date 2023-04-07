<template>
    <div class="event-index">
        <div class="date-picker">
            <label for="date-range">Sélectionnez une plage de dates :</label>
            <VueDatePicker v-model="selectedDates" range></VueDatePicker>
            <button class="button is-primary" @click="getEventsByDateRange">Chercher</button>
        </div>

        <div class="event-list">
            <h2>Liste des évènements</h2>
            <ul>
                <li v-for="event in my_events" :key="event.id">
                    <router-link :to="{ name: 'showEvent', params: { id: event.id } }">
                        {{ event.title }} ({{ formatDate(event.start_date) }})
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import moment from 'moment';
import { Inertia } from '@inertiajs/inertia';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';

const selectedDates = ref([]);
const my_events = ref([]);

const getEventsByDateRange = () => {
    if (selectedDates.value.length !== 2) {
        return;
    }
    const start_date = moment(selectedDates.value[0]).format('YYYY-MM-DD');
    const end_date = moment(selectedDates.value[1]).format('YYYY-MM-DD');

    Inertia.get('/event', { start_date, end_date });
}

const formatDate = (dateString) => {
    return moment(dateString).format('DD MMMM YYYY');
}
</script>

<style scoped>
.date-picker {
    margin-bottom: 20px;
}

.VueDatePicker {
    display: inline-block;
}
</style>
