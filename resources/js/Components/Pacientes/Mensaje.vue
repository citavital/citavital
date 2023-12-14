<script setup>
import { useForm } from "@inertiajs/vue3";
import { reactive } from "vue";
import DialogModal from "@/Components/DialogModal.vue";

const emit = defineEmits(['close', 'load']);

const props = defineProps({
    me: Object,
    mostrarForm: Boolean,
});

const mensajeForm = useForm({
    mensaje: ''
});


const onCloseMensaje = () => {
    emit('close');
};

const addMensaje = () => {
    mensajeForm.post(route('pacientes.mensaje', { paciente: props.me.id }), {
        preserveScroll: true,
        onSuccess: (res) => {
            emit('load');
            onCloseMensaje();
        },
        onFinish: (res) => {
            mensajeForm.reset();
        }
    });
};

</script>
<template>
    <DialogModal :show="props.mostrarForm" @close="onCloseMensaje">
        <template v-slot:content>
            <div class="row">
                <div class="col-lg-12">
                    <label>Mensaje</label>
                    <textarea class="form-control" v-model="mensajeForm.mensaje" />
                </div>
            </div>
        </template>
        <template v-slot:footer>
            <button class="btn btn-danger me-1" @click.prevent="onCloseMensaje">Cancelar</button>
            <button class="btn btn-primary" @click.prevent="addMensaje">
                Guardar
            </button>
        </template>
    </DialogModal>
</template>
