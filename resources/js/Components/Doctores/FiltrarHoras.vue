<script setup>
import { ref } from 'vue';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

const date = ref();

const props = defineProps({
    doctor: Object,
});

</script>
<template>
    <div class="row">
        <div class="col-lg-6 border-r">
            <VueDatePicker menu-class-name="w-full" v-model="date" :inline="{ input: true }" text-input auto-apply :min-date="new Date()" :enable-time-picker="false"/>
        </div>
        <div class="col-lg-6">
            <button class="btn btn-dark-blue me-2">9:00 AM</button>
            <button class="btn btn-dark-blue me-2">10:00 AM</button>
            <button class="btn btn-dark-blue me-2">11:00 AM</button>
            <button class="btn btn-dark-blue me-2">12:00 PM</button>
            <button class="btn btn-dark-blue me-2">01:00 PM</button>
            <button class="btn btn-dark-blue me-2">02:00 PM</button>
            <button class="btn btn-dark-blue me-2">03:00 PM</button>
            <button class="btn btn-dark-blue me-2">04:00 PM</button>
            <button class="btn btn-dark-blue me-2">05:00 PM</button>
            <button class="btn btn-dark-blue me-2">06:00 PM</button>
        </div>
    </div>
</template>
