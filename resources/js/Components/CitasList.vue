<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { computed, onMounted, reactive, watch } from "vue";
import { usePage } from "@inertiajs/vue3";

const data = reactive({
    citas: [],
    mostrar: 'actuales'
});

const onCancel = ((cita, index) => {
    if (confirm('Desea cancelar la cita?') !== true) {
        return;
    }

    axios.delete(route('citas.destroy', { cita: cita.id }))
        .then(response => {
            data.citas.splice(index, 1);
        });
});

const getName = (cita) => {
    return isPaciente.value ? cita.doctor.name : cita.paciente.name;
};

watch(() => data.mostrar, async() => {
    loadCitas();
});

onMounted(async() => {
    loadCitas();
});

const isPaciente = computed(() => {
    return usePage().props?.auth?.user?.tipo_usuario === 'paciente';
});

const loadCitas = () => {
    fetch(route('citas.list', { mostrar: data.mostrar }))
        .then(res => res.json())
        .then(response => data.citas = response.citas);
};

</script>
<template>
    <div class="row">
        <div class="col-lg-2">
            <select v-model="data.mostrar">
                <option value="actuales">Actuales</option>
                <option value="pasadas">Pasadas</option>
                <option value="canceladas">Canceladas</option>
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div
            v-for="(cita, index) of data.citas"
            :key="index"
            class="col-lg-4 mt-0 mt-lg-3">
            <div class="card">
                <div class="card-body pe-0">
                    <div class="row">
                        <div class="col-lg-3">
                            <img :src="cita.doctor.profile_photo_url" class="img-fluid rounded-full mx-auto d-block" />
                        </div>
                        <div class="col-lg-8 text-center flex justify-between pe-0">
                            <div>
                                <p v-if="isPaciente" class="fs-5 fw-bold">{{ getName(cita) }}</p>
                                <p v-else class="underline">
                                    <a :href="route('pacientes.show', { paciente: cita.usuario_id })">
                                        <span class="fs-5 fw-bold">{{ getName(cita) }}</span>
                                        <i class="fa fa-external-link ms-2 text-blue-500"></i>
                                    </a>
                                </p>
                                <p class="fw-bold">{{ cita.hospital.nombre }}</p>
                                <span>{{ cita.fecha }} - {{ cita.hora }}</span>
                            </div>
                            <div>
                                <button v-if="data.mostrar === 'actuales'" type="button" @click.prevent="onCancel(cita)">
                                    <i class="fa fa-xl fa-close text-red-500"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
