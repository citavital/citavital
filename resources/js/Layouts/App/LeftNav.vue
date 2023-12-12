<script setup>
import { computed } from "vue";

const props = defineProps({
   tipoUsuario: String
});

const isActive = (routeName) => {
    return [ route().current(routeName) ? 'active' : '' ];
}

const isPaciente = computed(() => {
    return props.tipoUsuario === 'paciente';
});

</script>

<template>
    <div class="bg-blue-500 min-h-screen d-none d-md-block">
        <div class="py-4 left-nav">
            <div class="py-2 w-100 nav-icon" :class="isActive('dashboard')">
                <a :href="route('dashboard')">
                <span class="text-center w-100">
                    <i class="fa fa-home fs-3 w-100"></i>
                </span>
                    <p class="text-center w-100 py-2">Inicio</p>
                </a>
            </div>
            <div v-if="isPaciente" class="py-2 w-100 nav-icon" :class="isActive('citas.index')">
                <a :href="route('citas.index')">
                <span class="text-center w-100">
                    <i class="fa fa-calendar fs-3 w-100"></i>
                </span>
                    <p class="text-center w-100 p-2">Citas</p>
                </a>
            </div>
            <div v-if="isPaciente" class="py-2 w-100 nav-icon" :class="isActive('doctores.index')">
                <a :href="route('doctores.index')">
              <span class="text-center w-100">
                <i class="fa fa-search fs-3 w-100"></i>
              </span>
                    <p class="text-center w-100 p-2">Buscar Doctores</p>
                </a>
            </div>
            <div v-if="isPaciente" class="py-2 w-100 nav-icon" :class="isActive('historial.index')">
                <a :href="route('historial.index')">
                <span class="text-center w-100">
                    <i class="fa fa-file-o fs-3 w-100"></i>
                </span>
                    <p class="text-center w-100 p-2">Ver Historial</p>
                </a>
            </div>
        </div>
    </div>

</template>

<style scoped>
a {
    text-decoration: none;
}

.nav-icon, .nav-icon a {
    color: white;
}

.nav-icon:hover, .nav-icon:hover > a, .nav-icon.active, .nav-icon.active > a {
    background: white;
    color: #3D6CB9!important;
}

.left-nav {
    width: 100px;
    height: 100%;
    background: #3D6CB9;
}
</style>
