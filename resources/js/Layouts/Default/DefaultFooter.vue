<script setup>
</script>
<template>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="mt-4">
                    <h4>CITAVITAL </h4>
                    <div class="text-muted mt-4">
                        <ul class="list-unstyled footer-list">
                            <li><a
                                :href="route('home')"
                                class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Inicio</a>
                            </li>

                            <li><a
                                :href="route('contacto.index')"
                                class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Contactanos
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-4 text-white">
                    <a
                        href="https://www.google.com/maps/search/oceania+business+plaza/@8.9805296,-79.5121456,17z/data=!3m1!4b1?hl=en&entry=ttu"
                        class="text-white"
                    >
                        <i class="fa fa-map-marker fs-4 text-white"></i><span class="ms-2 fs-4 font-bold">Panamá</span>
                    </a>
                    <ul class="list-unstyled">
                        <li class="mt-2">Oceanía Business Plaza Torre 2 Piso 43</li>
                        <li class="mt-2"><i class="fa fa-phone me-2"></i>999-9999</li>
                        <li class="mt-2">
                            <i class="fa fa-envelope me-2"></i>
                            <a href="mailto:info@citavital.com" class="text-white">{{ "info@citavital.com" }}</a>
                        </li>
                    </ul>
                </div>
                <div class="mt-4">
                    <h4>Información</h4>
                    <div class="text-muted mt-4">
                        <ul class="list-unstyled footer-list">
                            <li><a
                                class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Terminos
                                &amp; condiciones</a></li>
                            <li><a
                                class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Sobre nosotros
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="https://www.instagram.com/citavitalapp"><i class="fa fa-instagram fs-1 text-white"></i></a>
                    <a href="https://twitter.com/citavital" class="ms-2"><i class="fa fa-twitter fs-1 text-white"></i></a>
                </div>
            </div>
            <p class="link-dark">© Cita Vital 2023. Todos los Derechos Reservados.</p>
        </div>
    </footer>

</template>

<style scoped>
a{
    cursor: pointer;
}

a.text-white:hover {
    color: #95a0ab !important;
}

.footer{
    padding: 50px 0;
    /*
    background-color: #272a33;
     */

    --tw-bg-opacity: 1;
    background-color: rgba(31, 41, 55, var(--tw-bg-opacity));
}

.footer h4{
    color: #ffffff;
}

.link-dark{
    color: #95a0ab !important;
    text-decoration: none;
}
.row>*{
    width: auto;

}
.row{
    justify-content: space-between;
}

</style>
