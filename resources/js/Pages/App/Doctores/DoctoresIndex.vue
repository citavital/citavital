<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { computed, reactive } from "vue";
import DoctorList from "@/Components/DoctorList.vue";

const data = reactive({
    hospitales: [],
    hospital: null,
    especialidades: [],
    especialidad: null,
    doctores: [],
});

const loadDoctores = () => {
    fetch(route('doctores.list', { hospital: data.hospital, especialidad: data.especialidad }))
        .then(res => res.json())
        .then(response => {
            data.doctores = response;
        });
};

const canSubmit = computed(() => {
    return data.especialidad !== null;
});

fetch(route('hospitales.index'))
    .then(res => res.json())
    .then(response => {
        response.hospitales.forEach(item => {
            data.hospitales.push({
                id: item.id,
                texto: item.nombre,
            });
        });
    });

fetch(route('especialidades.index'))
    .then(res => res.json())
    .then(response => {
        response.data.forEach(item => {
            data.especialidades.push({
                id: item.id,
                texto: item.nombre,
            });
        });
    });
</script>
<template>
    <AppLayout title="Buscar Doctores">
        <div class="container my-3">
            <div class="row">
                <div class="col-lg-3 offset-lg-2 px-1">
                    <select class="form-control py-2" v-model="data.especialidad">
                        <option :value="null">Especialidad</option>
                        <option
                            v-for="(especialidad, index) of data.especialidades"
                            :key="index"
                            :value="especialidad.id"
                        >
                            {{ especialidad.texto }}
                        </option>
                    </select>
                </div>

                <div class="col-lg-3 mt-2 mt-lg-0 px-1">
                    <select class="form-control py-2" v-model="data.hospital">
                        <option :value="null">Centro Medico (Opcional)</option>
                        <option
                            v-for="(hospital, index) of data.hospitales"
                            :key="index"
                            :value="hospital.id"
                        >
                            {{ hospital.texto }}
                        </option>
                    </select>
                </div>
                <div class="col-lg-1 mt-2 mt-lg-0 px-1">
                    <button class="btn btn-dark-blue py-2 mt-0" @click="loadDoctores" :disabled="!canSubmit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-10 offset-lg-1">
                    <div class="row">
                        <DoctorList
                            v-for="(doctor, index) in data.doctores"
                            :key="doctor.id + '-' + index"
                            :info="doctor"
                            class="mt-3 col-lg-5 mx-2" />
                    </div>
                </div>
            </div>
        </div>


    </AppLayout>
</template>
