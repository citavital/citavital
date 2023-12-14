<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const onCancel = ((cita, index) => {
    if (confirm('Desea cancelar la cita?') !== true) {
        return;
    }

    axios.delete(route('citas.destroy', { cita: cita.id }))
        .then(response => {
            location.reload();
        });
});

const isPaciente = computed(() => {
    return usePage().props?.auth?.user?.tipo_usuario === 'paciente';
});

const getImage = (cita, doctor, paciente) => {
    return isPaciente.value ? doctor.profile_photo_url : paciente.profile_photo_url;
};

</script>
<template>
    <AppLayout title="Cita">
        <div class="container py-4">
            <div v-if="!$page.props.cita.cancelada" class="flex justify-end">
                <button class="btn btn-danger" @click.prevent="onCancel($page.props.cita)">Cancelar</button>
            </div>
            <img :src="getImage($page.props.cita, $page.props.doctor, $page.props.paciente)" class="shadow img-fluid rounded-full d-block h-32" />
            <h1 class="fs-1 fw-bolder mt-3">
                <template v-if="$page.props.auth.user.tipo_usuario === 'paciente'">Dr(a). {{ $page.props.doctor.name }}</template>
                <template v-else>{{ $page.props.paciente.name }}</template>
            </h1>
            <p class="fs-5">{{ $page.props.cita.fecha }} - {{ $page.props.cita.hora }}</p>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
