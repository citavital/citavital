<script setup>
import { computed, reactive } from "vue";
import NavTabs from "@/Components/NavTabs.vue";

const emit = defineEmits(['open']);

const props = defineProps({
   info: Object,
});

const data = reactive({
    tabs: [],
    currentTab: "",
});

const onOpen = () => {
    emit('open', props.info);
};

const onTabChanged = (tab) => {
    data.currentTab = tab;
};

const isCurrentTab = (tab) => {
    return data.currentTab === tab;
};

const tabClass = (tab) => {
    return isCurrentTab(tab) ? 'active' : '';
};

for (let hospital of props.info.doctor_hospital) {
    data.tabs.push({
        id: hospital.id,
        name: hospital.hospital.nombre,
    });
}

if (data.tabs !== undefined) {
    data.currentTab = data.tabs[0]?.id;
}

</script>
<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <img :src="info.profile_photo_url" class="rounded-circle mx-auto lg-mx-0 d-block img-fluid">
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <p class="mb-1 fw-bold fs-5">{{ info.name }}</p>
                    <span
                        v-for="(especialidad, index) of info.doctor_especialidad"
                        :key="index"
                        class="badge rounded-pill bg-blue-400 me-1">
                        {{ especialidad.especialidad.nombre }}
                    </span>
                </div>
                <div class="col-lg-3 text-center lg-text-left">
                    <button
                        type="button"
                        @click.prevent="onOpen"
                        class="btn btn-dark-blue float-center lg-float-end"
                    >
                        Reservar
                    </button>
                </div>
            </div>

            <!-- Tabs -->
            <div class="mt-3">

                <div class="sm:hidden">
                    <label class="sr-only">Seleccione un tab</label>
                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                    <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option v-for="tab in data.tabs" :value="tab.id">{{ tab.name }}</option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <ul class="nav nav-tabs">
                        <li
                            v-for="(tab, index) in data.tabs"
                            :key="tab.name" class="nav-item"
                        >
                            <a class="nav-link"
                               :href="'#' + tab.id"
                               :class="tabClass(tab.id)"
                               :aria-current="isCurrentTab(tab.id) ? 'page' : undefined"
                               @click.prevent="onTabChanged(tab.id)"
                            >
                                {{ tab.name }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <template
                v-for="(hospital, index) of info.doctor_hospital"
                :key="hospital.id + '-' + index">
                <div v-if="hospital.id === data.currentTab">
                    <p class="my-3 fs-6">{{ hospital.hospital.direccion }}</p>
                    <i class="fa fa-phone text-info fs-5"></i>
                    <span class="ms-2">{{ hospital.hospital.telefono_1 }}</span>
                    <template v-if="hospital.hospital.telefono_2">
                        <i class="fa fa-phone text-info fs-5 ms-2"></i><span class="ms-2">
                        {{ hospital.hospital.telefono_2 }}
                    </span>
                    </template>
                </div>
            </template>

        </div>
    </div>

</template>
