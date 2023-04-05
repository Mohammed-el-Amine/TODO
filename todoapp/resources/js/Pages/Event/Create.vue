<template>
    <div class="event-create">
        <h2>Créer un événement</h2>

        <form @submit.prevent="submitForm">
            <div class="field">
                <label class="label">Titre</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Titre d'évènement" v-model="form.title" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea class="textarea" placeholder="Description" v-model="form.description" required></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Date et heure de début</label>
                <div class="control">
                    <input class="input" type="datetime-local" v-model="form.start_date" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Date et heure de fin</label>
                <div class="control">
                    <input class="input" type="datetime-local" v-model="form.end_date" required>
                </div>
            </div>

            <div class="button-group">
                <button class="button is-primary">Créer</button>
                <button class="button is-info" @click="goBack">Retour</button>
            </div>

        </form>


    </div>
</template>
  
<script setup>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import moment from 'moment'
import router from '../../router'

const form = reactive({
    title: '',
    start_date: '',
    end_date: '',
    description: ''
})

const submitForm = () => {
    if (form.title && form.start_date && form.end_date && form.description) {
        // formate la date de début et de fin à l'aide de Moment.js
        form.start_date =moment(form.start_date).format(); 
        form.end_date = moment(form.end_date).format();

        Inertia.post('/add/event', form)
    }
}

const goBack = () => {
    router.go(-1)
}
</script>
  
<style>
.event-create {
    padding: 20px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
}

.event-create h2 {
    font-size: 2rem;
    margin-top: 20px;
    margin-bottom: 10px;
}

.event-create .field {
    margin-bottom: 20px;
}

.event-create .label {
    font-weight: bold;
    font-size: 1.2rem;
}

.event-create .input,
.event-create .textarea {
    width: 100%;
    font-size: 1.2rem;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.event-create .button-group {
    margin-top: 20px;
}

.button-group {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
}

.button-group button {
    flex: 1;
    margin: 0 5px;
}

.button-group button:first-child {
    margin-left: 0;
}

.button-group button:last-child {
    margin-right: 0;
}

.event-create .button-group .button.is-info {
    background-color: #f7d025;
    color: #000;
}
</style>
  