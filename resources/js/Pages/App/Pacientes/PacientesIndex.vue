<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PacienteCard from "@/Components/PacienteCard.vue";

const props = defineProps({
    me: Object,
    myProfile: {
       type: Boolean,
        default: true,
    },
    medicamentos: {
        type: Array,
        default: [],
    },
    visitas: {
        type: Array,
        default: [],
    },
    notas: {
        type: Array,
        default: [],
    },
    historialList: {
        type: Array,
        default: [],
    },
});

</script>
<template>
    <AppLayout title="Perfil de Paciente">
        <div class="row container-fluid py-2">
            <div class="col-xl-5">
                <PacienteCard :me="me" :my-profile="myProfile"></PacienteCard>
            </div>
            <div class="col-xl-3 mt-3 mt-xl-0">
                <!-- Medicamentos -->
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-4 text-body-tertiary fw-bold">Medicamentos</span>
                            <button class="btn" v-if="!myProfile">
                                <i class="fa fa-plus-circle text-blue fa-xl"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">

                        <h4
                            v-if="medicamentos.length === 0"
                            class="fw-bold p-3 fs-5 text-center underline">
                            No se le ha prescrito medicamentos.
                        </h4>
                        <ul v-else class="list-group border-0">
                            <li
                                v-for="(medicamento, index) of medicamentos"
                                :key="index"
                                class="list-group-item border-0">
                                <i class="fa fa-tablets text-secondary fa-xl me-3"></i>
                                <span class="fs-5">{{ medicamento.nombre }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-4 text-body-tertiary fw-bold">Notas</span>
                            <button class="btn" v-if="!myProfile">
                                <i class="fa fa-plus-circle text-blue fa-xl"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <h4
                            v-if="notas.length === 0"
                            class="fw-bold p-3 fs-5 text-center underline">
                            No cuenta con notas.
                        </h4>
                        <div
                            v-else
                            v-for="(nota, index) of notas"
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
                            v-if="visitas.length === 0"
                            class="fw-bold p-3 fs-5 text-center underline">
                            No cuenta con visitas.
                        </h4>
                        <ul v-else class="list-group border-0">
                            <li
                                v-for="(visita, index) of visitas"
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
                            <button class="btn" v-if="!myProfile">
                                <i class="fa fa-plus-circle text-blue fa-xl"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <h4
                            v-if="historialList.length === 0"
                            class="fw-bold p-3 fs-5 text-center underline">
                            No cuenta con historial.
                        </h4>
                        <ul
                            v-else
                            v-for="(historial, index) of historialList"
                            :key="historial"
                            class="list-group border-0">
                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-file text-blue fa-xl me-3"></i>
                                    <span class="fs-5">Examen de Rayos X</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-body-tertiary">06/12/2023</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

