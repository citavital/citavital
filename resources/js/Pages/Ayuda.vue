<script setup>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import { Head, Link, useForm } from '@inertiajs/vue3';
</script>
<template>
    <DefaultLayout>
        <Head title="Ayuda" />

        <section  class="section home-half">
            <img src="https://citavitalassets.s3.amazonaws.com/images/banner1.jpeg" class="bg-overlay" style="object-fit: cover; object-position: top center; transform:translateY(-15px)">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ">
                        <h1 class="home-title">
                            Transforme su
                            consultorio médico
                        </h1>
                        <p class="pt-3 home-desc">Citavital es una solución TODO EN UNO para modernizar totalmente su consultorio médico.</p>

                    </div>

                </div>
            </div>
        </section>

        <section id="services" class="section pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h1 class="fs-1 section-title text-center">¿Eres Doctor?</h1>
                        <div class="section-title-border mt-2"></div>
                        <p class="section-subtitle text-muted text-center pt-4 font-secondary">Así funciona nuestra app</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-4 mt-3">
                        <div class="services-box text-center hover-effect img-fluid">
                            <img src="https://citavitalassets.s3.amazonaws.com/images/icon/agenda.png" class="mx-auto" style="height: 50px" alt="">
                            <h4 class="pt-3">Agenda En linea</h4>
                            <p class="pt-3 text-muted">Manten tus citas online</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="services-box text-center hover-effect img-fluid">
                            <img src="https://citavitalassets.s3.amazonaws.com/images/icon/history.png" class="mx-auto" style="height: 50px" alt="">
                            <h4 class="pt-3">Historial Medico</h4>
                            <p class="pt-3 text-muted">Accede al historial del paciente en tiempo real</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="services-box text-center hover-effect">
                            <img src="https://citavitalassets.s3.amazonaws.com/images/icon/bullseye.png" class="mx-auto" style="height: 50px" alt="">
                            <h4 class="pt-3">Marketing online</h4>
                            <p class="pt-3 text-muted">Permite que sus pacientes lo encuentren por google</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section  class="section home-half">
            <img src="https://citavitalassets.s3.amazonaws.com/images/banner2.jpeg" class="bg-overlay" style="object-fit: cover; object-position: top center;    transform: translate(-61px,-139px);">


            <div class="container">
                <div class="row">
                    <div class="col-lg-8 " style="margin-left: auto;">
                        <h1 class="home-title">
                            Agenda electrónica y Citas en línea
                        </h1>
                        <p class="pt-3 home-desc">
                            Siempre a tiempo</p>
                        <button class="unete-btn"> Unete al Equipo!</button>

                    </div>

                </div>
            </div>
        </section>

        <section id="services" class="section pt-5">
            <div class="container">
                <div class="row" >
                    <div class="col-lg-8 offset-lg-2" >
                        <div class="section-title-border mt-2"></div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-4 mt-3" >
                        <div class="services-box text-center hover-effect">
                            <h4 class="underline pt-3">AGENDA EN LINEA</h4>
                            <p class="pt-3 text-muted">Ahorre tiempo y dinero: reduzca las llamadas de confirmación de citas !hasta un 70%!</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="services-box text-center hover-effect">
                            <h4 class="underline pt-3">PACIENTES SATISFECHOS</h4>
                            <p class="pt-3 text-muted">Informados de sus citas y controles médicos a través de recordatorios automáticos vía email.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="services-box text-center hover-effect">
                            <h4 class="underline pt-3">MÚLTIPLES AGENDAS</h4>
                            <p class="pt-3 text-muted">Puede administrar tantas agendas como necesite. Mejora la administración del tiempo e imagen de su consultorio.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section  class="section home-half">
            <img src="https://citavitalassets.s3.amazonaws.com/images/banner3.jpeg" class="bg-overlay" style="object-fit: cover; object-position: top center; transform:translateY(-15px)">


            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ">
                        <h1 class="home-title">
                            Historia clínica electrónica
                        </h1>
                        <p></p>
                        <button class="unete-btn"> Unete al Equipo!</button>
                    </div>

                </div>
            </div>
        </section>

        <section id="services" class="section pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="section-title-border mt-2"></div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-4 mt-3">
                        <div class="services-box text-center hover-effect">
                            <h4 class="underline pt-3">100% ADAPTABLE
                            </h4>
                            <p class="pt-3 text-muted">Formularios amigables y 100% personalizados a su especialidad.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="services-box text-center hover-effect">
                            <h4 class="underline pt-3">NUNCA SE PIERDA DETALLES</h4>
                            <p class="pt-3 text-muted">Acceso al historial de sus pacientes desde cualquier dispositivo las 24 horas al día, 365 días al año.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="services-box text-center hover-effect">
                            <h4 class="underline pt-3">FÁCIL Y AMIGABLE</h4>
                            <p class="pt-3 text-muted">Envío de estudios a los pacientes vía email. Generación de órdenes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </DefaultLayout>
</template>

<style scoped>
.bg-overlay {
    position: absolute;
    height: 130%;
    width: 100%;
    right: 0;
    bottom: 0;
    left: 0;
    top: 0;
    z-index: -1;
}

.section{
    padding-top: 80px;
    padding-bottom: 80px;
    position: relative;
    overflow: hidden;
}

.home-half {
    padding-bottom: 150px;
    padding-top: 220px;

}

.bg-pattern-effect {
    position: absolute;
    bottom: -11px;
    left: 0px;
    right: 0px;
}
.row{
    flex-wrap: nowrap;
}
.doctor-img{
    object-fit: contain;
    width: auto;
}

.home-title{
    font-family: "Rubik", sans-serif;
    font-size: 3.5rem;
    color:  rgba(0, 0, 0, 0.65);
}

.home-desc{
    font-family: "Rubik", sans-serif;
    color:  rgba(0, 0, 0, 0.65);
    font-size: 22px;
}

.underline{
    border-bottom: 1px solid #9e9e9e;
    padding-bottom: 10px;
}

.unete-btn{
    border: none;
    top: -32px;
    float: right;
    width: 200px;
    height: 64px;
    line-height: 64px;
    border-radius: 5px;
    background-color: #fff;
    font-family: Roboto;
    font-size: 20px !important;
    text-align: center;
    text-transform: initial;
    box-shadow: 4px 4.5px 16px 0 rgba(0,0,0,.4);
}
</style>
