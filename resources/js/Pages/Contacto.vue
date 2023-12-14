<script setup>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import { Head, Link, useForm } from '@inertiajs/vue3';


const contactoForm = useForm({
    nombre: '',
    email: '',
    celular: '',
    mensaje: '',
});

const enviarContacto = () => {
    contactoForm.post(route('contacto.mail'), {
        preserveScroll: true,
        onSuccess: (res) => {
            alert('Se ha enviado el correo exitosamente.');
        },
        onFinish: (res) => {
            contactoForm.reset();
        }
    });
};

</script>
<template>
    <DefaultLayout>
        <Head title="Contacto" />

        <div class="pb-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.908849657965!2d-79.51214557414275!3d8.980534889743964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8faca91c7834c9bb%3A0xc95b7089e324a79a!2sOceania%20Business%20Center!5e0!3m2!1sen!2spa!4v1702528050218!5m2!1sen!2spa"
                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <section class="container py-4 px-3">
            <div class="row">
                <section class="col-lg-6 col-12">
                    <div class="contact-form">
                        <h1 class="fs-1 fw-bold">Contáctenos hoy!</h1>
                        <h2 class="fs-2 fw-bold">Permítanos contarle cómo modernizaremos su consultorio</h2>
                        <form @submit.prevent="enviarContacto" class="pt-5">
                            <div class="row">
                                <div class="col-12"></div>
                                <label for="name">Nombre Completo</label>
                                <input type="text" class="form-control" id="name" v-model="contactoForm.nombre">
                            </div>
                            <div class="row mt-3">
                                <div class="col-12"></div>
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" v-model="contactoForm.email">
                            </div>
                            <div class="row mt-3">
                                <div class="col-12"></div>
                                <label for="phone">Teléfono/Celular</label>
                                <input type="text" class="form-control" id="phone" v-model="contactoForm.celular">
                            </div>
                            <div class="row mt-3">
                                <div class="col-12"></div>
                                <label>Mensaje</label>
                                <textarea type="text" class="form-control" v-model="contactoForm.mensaje"></textarea>
                            </div>

                            <button class="btn btn-blue">ENVIAR</button>
                        </form>
                    </div>
                </section>
                <section class="col-lg-4 offset-lg-2 col-12 mt-3">
                    <div class="card shadow">
                        <img class="card-img-top" src="https://citavitalassets.s3.amazonaws.com/images/Oceania-Business-Plaza-mainimg.jpg" alt="Card image cap">
                        <div class="card-body">
                            <ul>
                                <li>Oceanía Business Plaza Torre 2 Piso 43</li>
                                <li>
                                    999-9999

                                </li>
                                <li>
                                    info@citavital.com
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </DefaultLayout>
</template>
<style>
ul{
    list-style: none;
    font-family: Figtree,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji";
    font-size: 18px;
    color: #585454;
    font-weight: 500;
}

</style>
