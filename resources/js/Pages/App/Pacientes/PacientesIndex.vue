<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

const indicadores = [
    { img: '../../../../images/icons/Altura.png', texto: 'Altura', valor: '1.78 m' },
    { img: '../../../../images/icons/Peso.png', texto: 'Peso', valor: '55.1 Kg' },
    { img: '../../../../images/icons/IMC.png', texto: 'Masa Corporal', valor: '21.60 IMC' },
    { img: '../../../../images/icons/Presion.png', texto: 'Presión Arterial', valor: '120/80' },
];

const myProfile = true;

const getImg = ((img) => {
    return new URL(img, import.meta.url).href;
});

</script>
<template>
    <AppLayout>
        <div class="row container-fluid py-2">
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 border-end">
                                <img
                                    src="https://source.boringavatars.com/beam/120/Eunice%20Kennedy?colors=264653,f4a261,e76f51"
                                    class="mx-auto d-block img-fluid">
                                <h3 class="fw-bolder text-center mt-2">John Doe</h3>
                                <p class="fw-bold fs-5 text-center text-danger">Alergias</p>
                                <div class="row text-center text-lg-start">
                                    <div class="col-lg-6">
                                        <span class="text-muted text-secondary fs-6">Fecha de Nacimiento</span>
                                        <p class="text-muted text-secondary fw-bold">26/11/1992</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="text-muted text-secondary fs-6">Edad</span>
                                        <p class="text-muted text-secondary fw-bold">31 años</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="text-muted text-secondary fs-6">Genero</span>
                                        <p class="text-muted text-secondary fw-bold">Hombre</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="text-muted text-secondary fs-6">Dirección</span>
                                        <p class="text-muted text-secondary fw-bold">Edificio #1, Calle Ficticia, Siempre Viva</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="text-muted text-secondary fs-6"># Celular</span>
                                        <p class="text-muted text-secondary fw-bold">+507 999-9999</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="text-muted text-secondary fs-6"># Teléfono</span>
                                        <p class="text-muted text-secondary fw-bold">+507 999-9999</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="text-muted text-secondary fs-6">E-mail</span>
                                        <p class="text-muted text-secondary fw-bold">
                                            <a href="mailto:john.doe@domain.com" class="text-decoration-none">
                                                {{ 'john.doe@domain.com' }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div v-if="!myProfile" class="row">
                                    <div class="col-12">
                                        <button class="btn btn-blue w-100 text-uppercase">Enviar Mensaje</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-2">

                                <div class="mt-3" v-for="(indicador, index) of indicadores" :key="index">
                                    <img :src="getImg(indicador.img)" class="img-fluid d-block mx-auto p-2" style="max-height: 50px;">
                                    <span class="text-body-tertiary fw-bold fs-5 text-center w-100 d-block">{{ indicador.texto }}</span>
                                    <span class="fw-bolder fs-4 text-center w-100 d-block">{{ indicador.valor }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mt-3 mt-xl-0">
                <!-- Medicamentos -->
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-4 text-body-tertiary fw-bold">Medicamentos</span>
                            <button class="btn">
                                <i class="fa fa-plus-circle text-blue fa-xl"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group border-0">
                            <li class="list-group-item border-0">
                                <i class="fa fa-tablets text-secondary fa-xl me-3"></i>
                                <span class="fs-5">Medicamento #1</span>
                            </li>
                            <li class="list-group-item border-0">
                                <i class="fa fa-tablets text-secondary fa-xl me-3"></i>
                                <span class="fs-5">Medicamento #1</span>
                            </li>
                            <li class="list-group-item border-0">
                                <i class="fa fa-tablets text-secondary fa-xl me-3"></i>
                                <span class="fs-5">Medicamento #1</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-4 text-body-tertiary fw-bold">Notas</span>
                            <button class="btn">
                                <i class="fa fa-plus-circle text-blue fa-xl"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-body-tertiary">06/12/2023</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                            scrambled it to make a type specimen book.</p>
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.</p>
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
                        <ul class="list-group border-0">
                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-user-md text-blue fa-xl me-3"></i>
                                    <span class="fs-5">Dr. John Doe</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-body-tertiary">06/12/2023</span>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-user-md text-blue fa-xl me-3"></i>
                                    <span class="fs-5">Dra. Jane Doe</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-body-tertiary">06/12/2023</span>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-user-md text-blue fa-xl me-3"></i>
                                    <span class="fs-5">Lic. Jake Doe</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-body-tertiary">06/12/2023</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-4 text-body-tertiary fw-bold">Historial</span>
                            <button class="btn">
                                <i class="fa fa-plus-circle text-blue fa-xl"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group border-0">
                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-file text-blue fa-xl me-3"></i>
                                    <span class="fs-5">Examen de Rayos X</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-body-tertiary">06/12/2023</span>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-file text-blue fa-xl me-3"></i>
                                    <span class="fs-5">Examen de Sangre</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-body-tertiary">06/12/2023</span>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-file text-blue fa-xl me-3"></i>
                                    <span class="fs-5">Examen de Alergenos</span>
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

