<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PacienteCard from "@/Components/PacienteCard.vue";
import DialogModal from "@/Components/DialogModal.vue";
import { onMounted, reactive, ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import Medicamentos from "@/Components/Pacientes/Medicamentos.vue";
import Notas from "@/Components/Pacientes/Notas.vue";
import Examenes from "@/Components/Pacientes/Examenes.vue";

const props = defineProps({
    me: Object,
    myProfile: {
       type: Boolean,
        default: true,
    },
});

const data = reactive({
    medicamentos: [],
    mostrarMedicinaForm: false,
    visitas: [],
    notas: [],
    mostrarNota: false,
    historialList: [],
    mostrarExamen: false,
});

const loadMedicamentos = () => {
    fetch(route('medicamentos.list', { paciente: props.me.id }))
        .then(res => res.json())
        .then(response => {
            data.medicamentos = response.data;
        });
};

const loadNotas = () => {
    fetch(route('notas.list', { paciente: props.me.id }))
        .then(res => res.json())
        .then(response => {
            data.notas = response.data;
        });
};

const loadExamenes = () => {
    fetch(route('examenes.list', { paciente: props.me.id }))
        .then(res => res.json())
        .then(response => {
            data.historialList = response.data;
        });
};

const loadCitas = () => {

    fetch(route('citas.list', { paciente: props.me.id }))
        .then(res => res.json())
        .then(response => {
            data.visitas = response.citas;
        });
};

const onMostrarMedicina = () => {
    data.mostrarMedicinaForm = true;
};

const onCloseMedicina = () => {
    data.mostrarMedicinaForm = false;
};

const onMostrarNota = () => {
    data.mostrarNota = true;
};

const onCloseNota = () => {
    data.mostrarNota = false;
};

const onMostrarExamen = () => {
    data.mostrarExamen = true;
};

const onCloseExamen = () => {
    data.mostrarExamen = false;
};

const onDownloadFile = (historial) => {
    window.open(route('examenes.show', { paciente: props.me.id, examen: historial.id }), '_blank');
};

onMounted(async() => {
    loadMedicamentos();
    loadNotas();
    loadExamenes();
    loadCitas();
});

</script>
<template>
    <AppLayout title="Perfil de Paciente">
        <Medicamentos
            :me="me"
            :mostrar-medicina-form="data.mostrarMedicinaForm"
            @load="loadMedicamentos"
            @close="onCloseMedicina"
        />
        <Notas
            :me="me"
            :mostrar-form="data.mostrarNota"
            @load="loadNotas"
            @close="onCloseNota"
        />
        <Examenes
            :me="me"
            :mostrar-form="data.mostrarExamen"
            @load="loadExamenes"
            @close="onCloseExamen"
        />

        <div class="row container-fluid py-2">
            <div class="col-xl-5">
                <PacienteCard :me="me" :my-profile="myProfile" />
            </div>
            <div class="col-xl-3 mt-3 mt-xl-0">
                <!-- Medicamentos -->
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-4 text-body-tertiary fw-bold">Medicamentos</span>
                            <button v-if="!myProfile" type="button" class="btn" @click.prevent="onMostrarMedicina">
                                <i class="fa fa-plus-circle text-blue fa-xl"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">

                        <h4
                            v-if="data.medicamentos.length === 0"
                            class="fw-bold p-3 fs-5 text-center underline">
                            No se le ha prescrito medicamentos.
                        </h4>
                        <ul v-else class="list-group border-0">
                            <li
                                v-for="(medicamento, index) of data.medicamentos"
                                :key="index"
                                class="list-group-item border-0">
                                <i class="fa fa-tablets text-secondary fa-xl me-3"></i>
                                <span class="fs-5">{{ medicamento.comentarios }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-4 text-body-tertiary fw-bold">Notas</span>
                            <button v-if="!myProfile" class="btn" @click.prevent="onMostrarNota">
                                <i class="fa fa-plus-circle text-blue fa-xl"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4
                            v-if="data.notas.length === 0"
                            class="fw-bold p-3 fs-5 text-center underline">
                            No cuenta con notas.
                        </h4>
                        <div
                            v-else
                            v-for="(nota, index) of data.notas"
                            :key="index"
                            class="mt-2"
                        >
                            <p class="text-body-tertiary">{{ nota.fecha }}</p>
                            <p v-html="nota.comentarios"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mt-3 mt-xl-0">
                <div class="card mt-3 mt-xl-0">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-4 text-body-tertiary fw-bold">Visitas</span>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <h4
                            v-if="data.visitas.length === 0"
                            class="fw-bold p-3 fs-5 text-center underline">
                            No cuenta con visitas.
                        </h4>
                        <ul v-else class="list-group border-0">
                            <li
                                v-for="(visita, index) of data.visitas"
                                :key="index"
                                class="list-group-item border-0 d-flex justify-content-between align-items-center"
                            >
                                <div>
                                    <i class="fa fa-user-md text-blue fa-xl me-3"></i>
                                    <span class="fs-5">{{ visita.doctor.name }}</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-body-tertiary">{{ visita.fecha }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-4 text-body-tertiary fw-bold">Historial</span>
                            <button v-if="!myProfile" class="btn" @click.prevent="onMostrarExamen">
                                <i class="fa fa-plus-circle text-blue fa-xl"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <h4
                            v-if="data.historialList.length === 0"
                            class="fw-bold p-3 fs-5 text-center underline">
                            No cuenta con historial.
                        </h4>
                        <ul
                            v-else
                            v-for="(historial, index) of data.historialList"
                            :key="historial"
                            class="list-group border-0">
                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-file text-blue fa-xl me-3"></i>
                                    <button @click.prevent="onDownloadFile(historial)">
                                        <span class="fs-5">
                                            {{ historial.comentarios }}
                                        </span>
                                        <i v-if="historial.file_url" class="ms-2 fa fa-lg fa-external-link text-blue-500"></i>
                                    </button>
                                </div>
                                <div>
                                    <span class="fw-bold text-body-tertiary">{{ historial.fecha }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

