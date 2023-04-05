<template>
    <div class="event-update">
        <h2>Modifier un évènement</h2>
        <form @submit.prevent="updateEvent">

            <div class="field">
                <label class="label">Titre :</label>
                <div class="control">
                    <input class="input" type="text" v-model="form.title" :placeholder=my_event.title required>
                </div>
            </div>

            <div class="field">
                <label class="label">Description :</label>
                <div class="control">
                    <textarea class="textarea" v-model="form.description" :placeholder=my_event.description
                        required></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Date et heure de début :</label>
                <div class="control">
                    <input class="input" type="datetime-local" v-model="form.start_date" :placeholder=my_event.start_date
                        required>
                </div>
            </div>

            <div class="field">
                <label class="label">Date et heure de fin :</label>
                <div class="control">
                    <input class="input" type="datetime-local" v-model="form.end_date" :placeholder=my_event.end_date
                        required>
                </div>
            </div>

            <div class="button-group">
                <button class="button is-info" @click="goBack">Retour</button>
                <button class="button is-warning" type="submit">Modifier</button>
            </div>
        </form>

    </div>
</template>

<script setup>
import router from '../../router'
import moment from 'moment'
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
    my_event: {
        type: Object,
        required: true
    }
})

const form = reactive({
    title: '',
    description: '',
    start_date: '',
    end_date: '',
})

const goBack = () => {
    router.go(-1)
}

const updateEvent = () => {
    const eventId = props.my_event.id
    const start_date = moment(form.start_date).format()
    const end_date = moment(form.end_date).format()
    Inertia.put(`/update/event/${eventId}`, { id: eventId, ...form, start_date, end_date })
        .catch((error) => {
            console.log(error)
        })
}

</script>

<style>
.event-update {
    padding: 20px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
}

.event-update h2 {
    font-size: 2rem;
    margin-top: 20px;
    margin-bottom: 10px;
}

.event-update .field {
    margin-bottom: 20px;
}

.event-update .label {
    font-weight: bold;
    font-size: 1.2rem;
}

.event-update .input,
.event-update .textarea {
    width: 100%;
    font-size: 1.2rem;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.event-update .button-group {
    margin-top: 20px;
}

.event-update .button.is-info {
    background-color: #209cee;
    color: #fff;
}

.event-update .button.is-warning {
    background-color: #ffdd57;
    color: #000;
}
</style>