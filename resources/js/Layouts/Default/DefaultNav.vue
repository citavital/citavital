<script setup>
import { router } from "@inertiajs/vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

const logout = () => {
    router.post(route('logout'));
};
</script>
<template>

    <nav id="navbar" class="navbar navbar-expand-lg navbar-custom shadow">
        <div class="container">
            <a href="/">
                <img src="https://citavitalassets.s3.amazonaws.com/images/logo.png" class="navbar-brand" style="height: 90px;" alt="">
            </a>

            <div id="navbarCollapse" class=" navbar-collapse">
                <ul id="mySidenav" class="navbar-nav navbar-center">
                    <li class="nav-item nav-link active">
                        <a href="/" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item nav-link">
                        <a :href="route('contacto.index')" class="nav-link">Contacto</a>
                    </li>
                </ul>
                <div class="nav-button ms-auto">
                    <ul class="nav navbar-nav navbar-right">
                        <template v-if="$page.props.auth.user">
                            <li>
                                <a :href="route('dashboard')"
                                   class="btn btn-primary me-4 navbar-btn btn-rounded"
                                >
                                    App
                                </a>
                            </li>
                            <li>
                                <form method="POST" @submit.prevent="logout">
                                    <button class="btn btn-primary me-4 navbar-btn btn-rounded">
                                        Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </template>
                        <template v-else>
                            <li>
                                <a
                                    :href="route('login')"
                                    class="btn btn-primary navbar-btn me-4 btn-rounded"
                                >
                                    Iniciar Sesión
                                </a>
                            </li>
                            <li>
                                <a
                                    :href="route('register')"
                                    class="btn btn-primary navbar-btn btn-rounded"
                                >
                                    Registro
                                </a>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

</template>


<style scoped>
.navbar{
    --bs-navbar-brand-margin-end: 5rem;
    font-family: "Rubik", sans-serif;
}

.btn{
    background-color: #fff;
    border-color: #fff;
    color: var(--bs-nav-link-color);
}
.btn:hover {
    color: var(--bs-btn-hover-color) !important;
    background-color: var(--bs-btn-hover-bg) !important;
    border-color: var(--bs-btn-hover-border-color) !important;
}
.nav-link{
    color: rgba(107, 114, 128, var(--tw-text-opacity))
}
.nav-link.active{
    color: rgba(107, 114, 128, var(--tw-text-opacity));
    font-weight: 600;
}
@media (min-width: 800px){
    .navbar-nav{
        flex-direction: row;
    }
    .navbar-expand-lg .navbar-collapse{
        display: flex!important;
        flex-basis: auto;
    }
    .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: var(--bs-navbar-nav-link-padding-x);
        padding-left: var(--bs-navbar-nav-link-padding-x);
    }
}

.shadow {
    --tw-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

</style>
