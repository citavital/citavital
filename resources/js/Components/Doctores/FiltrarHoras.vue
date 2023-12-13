<script setup>
import { onMounted, reactive, ref, watch } from 'vue';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

const emit = defineEmits(['submit']);

const props = defineProps({
    doctor: Object,
});

const data = reactive({
    horas: [],
    date: new Date(),
});

watch(() => data.date, async (newDate, oldDate) => {
    getCitas();
});

onMounted(() => {
   getCitas();
});

const getCitas = () => {
    console.log(new Date(data.date).toISOString().split('T')[0]);

    let params = {
        doctor: props.doctor.id,
        fecha: new Date(data.date).toISOString().split('T')[0],
        hospital: props.doctor.doctor_hospital[0]?.hospital_id,
    };

    fetch(
        route('doctores.agendar', params))
        .then(res => res.json())
        .then(response => {
            data.horas = response.horas;
        });
};

const agregarCita = (time) => {
    if(confirm('Desea agendar la fecha seleccionada?') !== true) {
        return;
    }

    let params = {
        doctor: props.doctor.id,
        fecha: new Date(data.date).toISOString().split('T')[0],
        hospital: props.doctor.doctor_hospital[0]?.hospital_id,
        hora: time,
    };

    axios.post(route('citas.store'), params)
        .then(res => {
            alert('Se ha agendado su cita.');
            emit('submit');
        });
};

</script>
<template>
    <div class="row">
        <div class="col-lg-6 border-r">
            <VueDatePicker
                menu-class-name="w-full"
                v-model="data.date"
                :inline="{ input: true }"
                text-input
                auto-apply
                :min-date="new Date()"
                :enable-time-picker="false"
            />
        </div>
        <div class="col-lg-6">
            <template
                v-for="(row, index) of data.horas"
                :key="index"
            >
                <button
                    @click.prevent="agregarCita(row)"
                    class="btn btn-dark-blue me-2"
                >
                    {{ row }}
                </button>
            </template>
        </div>
    </div>
</template>
