<template>
    <div class="event-create">
        <h2>Créer un événement</h2>

        <form @submit.prevent="submitForm">
            <div class="field">
                <label class="label">Titre</label>
                <div class="control">
                    <input class="input" type="text" v-model="form.title">
                </div>
            </div>

            <div class="field">
                <label class="label">Date de début</label>
                <div class="control">
                    <input class="input" type="date" v-model="form.start_date">
                </div>
            </div>

            <div class="field">
                <label class="label">Date de fin</label>
                <div class="control">
                    <input class="input" type="date" v-model="form.end_date">
                </div>
            </div>

            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea class="textarea" v-model="form.description"></textarea>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-primary">Créer</button>
                </div>
                <div class="button-group">
                    <button class="button is-info" @click="goBack">Retour</button>
                </div>
            </div>
        </form>
    </div>
</template>
  
<script setup>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import router from '../../router'


const form = reactive({
    title: '',
    start_date: '',
    end_date: '',
    description: ''
})

const submitForm = () => {
    Inertia.post('/add/event', form)
}
const goBack = () => {
    router.go(-1)
}
</script>
  