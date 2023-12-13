<script setup>
import { Head, Link } from '@inertiajs/vue3';
import TeamMember from "@/Components/TeamMember.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

const teamList = [
    { name: 'Jonathan Chanis', rol: 'Backend', photo_url: 'https://source.boringavatars.com/beam/120/Mary Baker?colors=264653,f4a261,e76f51' },
    { name: 'Enrique García', rol: 'Backend/DevOps', photo_url: 'https://source.boringavatars.com/beam/120/Eunice Kennedy?colors=264653,f4a261,e76f51' },
    { name: 'Joseph Boden', rol: 'Backend', photo_url: 'https://source.boringavatars.com/beam/120/Sarah Winnemucca?colors=264653,f4a261,e76f51' },
    { name: 'Miguel Tamburrelli', rol: 'Frontend', photo_url: 'https://source.boringavatars.com/beam/120/Coretta Scott?colors=264653,f4a261,e76f51' },
    { name: 'Julio Sanchez', rol: 'Frontend', photo_url: 'https://source.boringavatars.com/beam/120/Willa Cather?colors=264653,f4a261,e76f51' },
    { name: 'Jose Dondis', rol: 'Marketing', photo_url: 'https://source.boringavatars.com/beam/120/Grace Hopper?colors=264653,f4a261,e76f51' },
    { name: 'Jordan Rodriguez', rol: 'UI/UX', photo_url: 'https://source.boringavatars.com/beam/120/Florence Chadwick?colors=264653,f4a261,e76f51' },
    { name: 'Urbano Iguala', rol: 'UI/UX', photo_url: 'https://source.boringavatars.com/beam/120/Harriet Tubman?colors=264653,f4a261,e76f51' },
    { name: 'Antony Jones', rol: 'UI/UX', photo_url: 'https://source.boringavatars.com/beam/120/Sacagawea?colors=264653,f4a261,e76f51' },
    { name: 'Oniel Arias', rol: 'UI/UX', photo_url: 'https://source.boringavatars.com/beam/120/Ma Rainey?colors=264653,f4a261,e76f51' },
];

</script>

<template>
    <DefaultLayout :can-login="canLogin" :can-register="canRegister">
        <Head title="Inicio" />

        <section id="home" class="section home-half">
            <div class="bg-overlay"></div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ">
                        <h1 class="home-title fw-bolder">
                            Encuentra un doctor y haz tu cita
                        </h1>
                        <p class="pt-3 home-desc fw-bold fs-3">Accede a la excelencia médica: los mejores hospitales y especialistas del país a tu servicio. Tu salud merece lo mejor.</p>
                        <button class="btn btn-primary fw-bolder text-uppercase">Agendar Cita</button>

                    </div>
                    <img src="https://citavitalassets.s3.amazonaws.com/images/doctor.png" class="doctor-img" style="height: 400px;">
                </div>
            </div>

            <div class="bg-pattern-effect"><svg width="100%" height="43" viewBox="0 0 2002 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 9.49999V42L1998.5 40V23H1962L1879 33L1758.5 36L1703 29.5L1304.5 21.5C1285.3 15.5 1183.83 24 1135.5 29L636 35.5C455.2 1.89999 136.667 4.16665 0 9.49999Z"
                    fill="white" fill-opacity="0.1"></path>
                <path opacity="0.1"
                      d="M0 33.5V41.5L1997.5 42V27H1972.5C1585.3 -21.8 1403.17 6.66666 1360.5 27C1299.7 13.4 1035.17 6 910.5 4C856.1 -6.8 597.5 8.5 475 17.5L0 33.5Z"
                      fill="white"></path>
                <path
                    d="M0 31.6689V42.1689L2001.5 41.6689V11.6689L1942.25 18.3143C1910.49 21.8758 1879.21 29.7147 1847.38 32.5593C1799.52 36.8366 1750.41 29.3968 1727 23.6689C1577.8 -8.33114 1367.17 10.3355 1280.5 23.6689C1199.3 40.8689 1126.17 30.8355 1106 23.6689C1023.13 -2.89279 818.252 7.7814 689.669 19.2529C659.224 21.9691 629.271 29.2178 598.77 31.21C559.856 33.7516 520.953 28.0794 502 23.6689C395.2 -8.73115 122.833 15.1689 0 31.6689Z"
                    fill="white"></path>
            </svg></div>
        </section>
        <section id="services" class="section pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h1 class="section-title text-center fw-bolder fs-1">Como Funciona</h1>
                        <div class="section-title-border mt-3"></div>
                        <p class="section-subtitle text-muted text-center pt-4 font-secondary fs-3">3 pasos para agendar tu cita</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-4 mt-3">
                        <div class="services-box text-center hover-effect"><i class="fa-solid fa-user-doctor fs-1"></i>
                            <h4 class="pt-3">Busca un doctor</h4>
                            <p class="pt-3 text-muted">Mantenerte sano es nuestra maxima prioridad.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="services-box text-center hover-effect"><i class="fa-solid fa-user-doctor fs-1"></i>
                            <h4 class="pt-3">Mira el perfil de tu doctor</h4>
                            <p class="pt-3 text-muted">Escoge cualquiera de los doctores en nuestro directorio</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="services-box text-center hover-effect">
                            <i class="fa-regular fa-calendar fs-1"></i>
                            <h4 class="pt-3">Agenda tu cita</h4>
                            <p class="pt-3 text-muted">Agenda tu cita en las fechas disponibles</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section pt-5 bg-gray-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <h1 class="fw-bolder text-center">Conoce a Nuestro Equipo</h1>
                        <div class="row mt-2 mt-lg-4">
                            <TeamMember v-for="member of teamList" :info="member"></TeamMember>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </DefaultLayout>
</template>

