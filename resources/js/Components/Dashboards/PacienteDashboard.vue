<script setup>
import GenericCard from "@/Components/GenericCard.vue";
import { reactive } from "vue";


const misCitasLinks = [
    { texto: 'Ver Citas', link: 'citas.index', isExternalLink: false },
];

const miPerfilLinks = [
    { texto: 'Mi Historial', link: 'pacientes.index', isExternalLink: false },
    { texto: 'Buscar Doctor', link: 'doctores.index', isExternalLink: false },
];

const data = reactive({
    hospitales: []
});

fetch(route('hospitales.index'))
    .then(res => res.json())
    .then(response => {
        response.hospitales.forEach(item => {
            data.hospitales.push({
                texto: item.nombre,
                link: item.url,
                isExternalLink: true,
            });
        });
    });

</script>
<template>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6">
                    <GenericCard
                        title="Mis Citas"
                        backgroundImage="https://citavitalassets.s3.amazonaws.com/images/app/mis-citas.jpeg"
                        :onTop="true"
                        :links="misCitasLinks"
                    ></GenericCard>
                </div>
                <div class="col-lg-6">
                    <GenericCard
                        title="Agendar Visita"
                        backgroundColor="bg-baby-blue"
                        backgroundImage="https://citavitalassets.s3.amazonaws.com/images/doctor.png"
                        :links="miPerfilLinks"
                    ></GenericCard>
                </div>
            </div>
            <div class="card mt-4 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="https://citavitalassets.s3.amazonaws.com/images/app/checklist.png" class="img-fluid" />
                        </div>
                        <div class="col-lg-8">
                            <h2 class="fw-bolder">Último Diagnostico Médico</h2>
                            <h4>Medicina General</h4>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                scrambled it to make a type specimen book.
                            </p>
                            <a href="/app/historial" class="btn btn-blue">Ver Historial Completo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <GenericCard
                title="Clinicas Afiliadas"
                backgroundColor="bg-baby-blue"
                backgroundImage="https://citavitalassets.s3.amazonaws.com/images/app/clinicas-afiliadas.png"
                :links="data.hospitales">
            </GenericCard>
        </div>
    </div>
</div>


</template>
