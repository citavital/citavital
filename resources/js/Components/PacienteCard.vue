<script setup>
import { computed, reactive } from "vue";
import { useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Indicador from "@/Components/Indicador.vue";

const data = reactive({
    editMode: false,
});

const props = defineProps({
    'me': Object,
    'myProfile': {
        type: Boolean,
        default: true,
    }
});

const form = useForm({
    _method: 'PUT',
    nacimiento: props.me.nacimiento,
    genero: props.me.genero,
    direccion: props.me.direccion,
    celular: props.me.celular,
    telefono: props.me.telefono,
    altura: props.me.altura,
    tipo_altura: props.me.tipo_altura,
    peso: props.me.peso,
    tipo_peso: props.me.tipo_peso,
    imc: props.me.imc,
    presion_arterial: props.me.presion_arterial,
    alergias: props.me.alergias,
});

const nacimiento = computed(() => {
    return getKey('nacimiento');
});

const genero = computed(() => {
    if (hasEmpty('genero')) {
        return '-';
    }

    const word = props.me.genero;

    return word.charAt(0).toUpperCase() + word.slice(1);
});

const edad = computed(() => {
    if (hasEmpty('nacimiento')) {
        return '-';
    }

    const difference = new Date() - new Date(props.me.nacimiento);
    return Math.floor(difference/31557600000) + ' años';
});

const direccion = computed(() => {
    return getKey('direccion');
});

const celular = computed(() => {
    return getKey('celular');
});

const telefono = computed(() => {
    return getKey('telefono');
});

const email = computed(() => {
    return getKey('email');
});

const peso = computed(() => {
    return getKey('peso') + ' ' + getKey('tipo_peso', '');
});

const altura = computed(() => {
    return getKey('altura') + ' ' + getKey('tipo_altura', '');
});

const imc = computed(() => {
    return getKey('imc');
});

const presionArterial = computed(() => {
    return getKey('presion_arterial');
});

const sufreAlergias = computed(() => {
    return !hasEmpty('alergias');
});

const alergias = computed(() => {
    return getKey('alergias');
});

const getKey = (key, defaultVal = '-') => {
    return hasEmpty(key) ? defaultVal : props.me[key];
};

const hasEmpty = (key) => {
    return !props.me.hasOwnProperty(key) || (props.me.hasOwnProperty(key) && props.me[key] === null)
};

const getImg = ((img) => {
    return new URL(img, import.meta.url).href;
});

const indicadores = reactive([
    { key: 'altura', img: '../../images/icons/Altura.png', texto: 'Altura', valor: altura, type: 'number' },
    { key: 'peso', img: '../../images/icons/Peso.png', texto: 'Peso', valor: peso, type: 'number' },
    { key: 'imc', img: '../../images/icons/IMC.png', texto: 'Masa Corporal', valor: imc, type: 'number' },
    { key: 'presion_arterial', img: '../../images/icons/Presion.png', texto: 'Presión Arterial', valor: presionArterial, type: 'text' },
]);

const toggleEdit = () => {
    data.editMode = !data.editMode;
};

const submit = () => {
    form.transform(data => ({
        ...data,
    })).post(route('pacientes.update', { paciente: props.me.id }), {
    });
};

</script>
<template>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8 border-end">
                <button v-if="myProfile" @click="toggleEdit" class="btn p-0 border-0 float-end">
                    <i v-if="!data.editMode" class="fa fa-pencil text-success fa-lg"></i>
                    <i v-if="data.editMode" class="fa fa-close text-danger fa-lg"></i>
                </button>
                <img
                    src="https://source.boringavatars.com/beam/120/Eunice%20Kennedy?colors=264653,f4a261,e76f51"
                    class="mx-auto d-block img-fluid">
                <h3 class="fw-bolder text-center mt-2">{{ me.name }}</h3>
                <p v-if="sufreAlergias" class="fw-bold fs-5 text-center text-danger">Alergias</p>
                <form @submit.prevent="submit">
                    <div class="row text-center text-lg-start">
                        <div class="col-lg-6">
                            <span class="text-muted text-secondary fs-6">Fecha de Nacimiento</span>
                            <p v-if="!data.editMode" class="text-muted text-secondary fw-bold">{{ nacimiento }}</p>
                            <input v-else type="date" class="form-control" v-model="form.nacimiento">
                            <InputError class="mt-2" :message="form.errors.nacimiento" />
                        </div>
                        <div class="col-lg-6">
                            <span class="text-muted text-secondary fs-6">Edad</span>
                            <p class="text-muted text-secondary fw-bold">{{ edad }}</p>
                        </div>
                        <div class="col-lg-6">
                            <span class="text-muted text-secondary fs-6">Genero</span>
                            <p v-if="!data.editMode" class="text-muted text-secondary fw-bold">{{ genero }}</p>
                            <select v-else class="d-block w-full" v-model="form.genero">
                                <option label="Hombre">hombre</option>
                                <option label="Mujer">mujer</option>
                                <option label="Otro">otro</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.genero" />
                        </div>
                        <div class="col-lg-6">
                            <span class="text-muted text-secondary fs-6">E-mail</span>
                            <p class="text-muted text-secondary fw-bold">
                                <a :href="'mailto:' + email" class="text-decoration-none">
                                    {{ email }}
                                </a>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <span class="text-muted text-secondary fs-6"># Celular</span>
                            <p v-if="!data.editMode" class="text-muted text-secondary fw-bold">{{ celular }}</p>
                            <input v-else class="form-control" type="text" v-model="form.celular">
                            <InputError class="mt-2" :message="form.errors.celular" />
                        </div>
                        <div class="col-lg-6">
                            <span class="text-muted text-secondary fs-6"># Teléfono</span>
                            <p v-if="!data.editMode" class="text-muted text-secondary fw-bold">{{ telefono }}</p>
                            <input v-else class="form-control" type="text" v-model="form.telefono">
                            <InputError class="mt-2" :message="form.errors.telefono" />
                        </div>
                        <div class="col-12">
                            <span class="text-muted text-secondary fs-6">Dirección</span>
                            <p v-if="!data.editMode" class="text-muted text-secondary fw-bold">{{ direccion }}</p>
                            <input v-else class="form-control" type="text" v-model="form.direccion">
                            <InputError class="mt-2" :message="form.errors.direccion" />
                        </div>
                        <div class="col-12">
                            <span class="text-muted text-secondary fs-6">Alergias</span>
                            <p v-if="!data.editMode" class="text-muted text-secondary fw-bold">{{ alergias }}</p>
                            <input v-else class="form-control" type="text" v-model="form.alergias">
                            <InputError class="mt-2" :message="form.errors.alergias" />
                        </div>
                    </div>
                    <div v-if="data.editMode" class="row">
                        <div class="col-12">
                            <button
                                type="submit"
                                class="btn btn-blue w-100 text-uppercase"
                                :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                            >
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
                <div v-if="!myProfile" class="row">
                    <div class="col-12">
                        <button class="btn btn-blue w-100 text-uppercase">Enviar Mensaje</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-2">
                <Indicador
                    texto="Altura"
                    img="../../images/icons/Altura.png"
                    :edit-mode="data.editMode"
                    :valor="altura"
                >
                    <div class="flex justify-between">
                        <input class="form-control me-1" type="text" v-model="form.altura" />
                        <select v-model="form.tipo_altura">
                            <option label="Metros">metros</option>
                            <option label="Pies">pies</option>
                        </select>
                    </div>
                    <InputError class="mt-2" :message="form.errors.altura" />
                    <InputError class="mt-2" :message="form.errors.tipo_altura" />
                </Indicador>
                <Indicador
                    texto="Peso"
                    img="../../images/icons/Peso.png"
                    :edit-mode="data.editMode"
                    :valor="peso"
                >
                    <div class="flex justify-between">
                        <input class="form-control me-1" type="text" v-model="form.peso" />
                        <select v-model="form.tipo_peso">
                            <option label="Libras">libras</option>
                            <option label="Kilos">kilos</option>
                        </select>
                    </div>
                    <InputError class="mt-2" :message="form.errors.peso" />
                    <InputError class="mt-2" :message="form.errors.tipo_peso" />
                </Indicador>
                <Indicador
                    texto="Peso"
                    img="../../images/icons/Imc.png"
                    :edit-mode="data.editMode"
                    :valor="imc"
                    :error="form.errors.imc"
                >
                    <input class="form-control me-1" type="text" v-model="form.imc" />
                </Indicador>
                <Indicador
                    texto="Presión Arterial"
                    img="../../images/icons/Presion.png"
                    :edit-mode="data.editMode"
                    :valor="presionArterial"
                    :error="form.errors.presion_arterial"
                >
                    <input class="form-control me-1" type="text" v-model="form.presion_arterial" />
                </Indicador>
            </div>
        </div>
    </div>
</div>
</template>
