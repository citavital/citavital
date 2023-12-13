<script setup>
import FiltrarHoras from "@/Components/Doctores/FiltrarHoras.vue";

const emit = defineEmits(['close']);
const props = defineProps({
    doctor: Object,
});

const onClose = () => {
    emit('close');
};

const openLink = ((link) => {
    window.open(link, '_blank');
});

</script>
<template>
    <div class="flex overflow-hidden">
        <div class="d-block w-100">
            <div class="overflow-hidden w-100" style="height: 100vh;">
                <div class="position-relative overflow-y-auto" style="height:90%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2">
                                    <img
                                        :src="doctor.profile_photo_url"
                                        class="img-fluid rounded-full mx-auto d-block h-24 w-24"
                                        :alt="doctor.name"
                                    >
                                </div>
                                <div class="col-lg-6">
                                    <h2 class="fs-2 fw-bolder">{{ doctor.name }}</h2>
                                    <div class="text-center text-lg-start">
                                        <span
                                            v-for="(especialidad, index) of doctor.doctor_especialidad"
                                            :key="index"
                                            class="badge rounded-pill bg-blue-400 fs-6 me-1">
                                            {{ especialidad.especialidad.nombre }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <a
                                        v-if="doctor.instagram"
                                        href="javascript:void(0);"
                                        @click.prevent="openLink(doctor.instagram)"
                                        class="me-1">
                                        <i class="fa fa-instagram text-red-500 fa-xl"></i>
                                    </a>
                                    <a
                                        v-if="doctor.facebook"
                                        href="javascript:void(0);"
                                        @click.prevent="openLink(doctor.facebook)"
                                        class="me-1">
                                        <i class="fa fa-facebook text-blue-600 fa-xl"></i>
                                    </a>
                                    <a
                                        v-if="doctor.website"
                                        href="javascript:void(0);"
                                        @click.prevent="openLink(doctor.website)"
                                        class="me-1">
                                        <i class="fa fa-globe fa-xl text-blue-500"></i>
                                    </a>
                                    <a :href="'mailto:' + doctor.email" class="me-1">
                                        <i class="fa fa-envelope-o text-blue-400 fa-xl"></i>
                                    </a>
                                </div>
                            </div>
                            <hr class="mt-4">
                            <div class="mt-3">
                                <i class="fa fa-xl fa-pencil me-2"></i><span class="fw-bolder fs-4">Información General</span>
                                <div class="pt-4 pb-2">
                                    <h4 class="fw-bolder fs-5">Enfoque</h4>
                                    <span class="fs-6">{{ doctor.enfoque }}</span>
                                </div>
                                <div class="py-2">
                                    <h4 class="fw-bolder fs-5">Idiomas</h4>
                                    <span class="fs-6">{{ doctor.idiomas }}</span>
                                </div>
                            </div>
                            <hr class="mt-4">
                            <div class="mt-3">
                                <i class="fa fa-xl fa-stethoscope me-2"></i><span class="fw-bolder fs-4">Tratamientos</span>
                                <ul class="pt-4 pb-2">
                                    <li v-for="(tratamiento, index) of doctor.doctor_tratamiento" :key="index">
                                        <i class="fa fa-check fa-xl text-success me-2"></i>
                                        <span class="fs-5">{{ tratamiento.tratamiento }}</span>
                                    </li>
                                </ul>
                            </div>
                            <hr class="mt-4">
                            <div class="my-3">
                                <!-- Calendario -->
                                <FiltrarHoras :doctor="doctor" @submit="onClose" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
