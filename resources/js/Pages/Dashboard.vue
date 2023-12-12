<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PacienteDashboard from "@/Components/Dashboards/PacienteDashboard.vue";
import DoctorDashboard from "@/Components/Dashboards/DoctorDashboard.vue";


</script>

<template>
    <AppLayout title="Dashboard">
        <div class="w-100 p-3 mb-3 bg-baby-blue">
            <div class="container">
                <span class="fw-bolder fs-4">Bienvenido {{ $page.props.auth.user.name }},</span>
                <span class="fs-5 ms-2">¿Como podemos ayudarte?</span>
            </div>
        </div>
        <PacienteDashboard v-if="$page.props.auth.user.tipo_usuario === 'paciente'" />
        <DoctorDashboard v-if="$page.props.auth.user.tipo_usuario === 'doctor'" />
    </AppLayout>
</template>
