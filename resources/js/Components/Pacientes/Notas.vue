<script setup>
import { useForm } from "@inertiajs/vue3";
import { reactive } from "vue";
import DialogModal from "@/Components/DialogModal.vue";

const emit = defineEmits(['close', 'load']);

const props = defineProps({
    me: Object,
    mostrarForm: Boolean,
});

const notaForm = useForm({
    nota: ''
});


const onCloseNota = () => {
    emit('close');
};

const addNota = () => {
    notaForm.post(route('notas.store', { paciente: props.me.id }), {
        preserveScroll: true,
        onSuccess: (res) => {
            emit('load');
            onCloseNota();
        },
        onFinish: (res) => {
            notaForm.reset();
        }
    });
};

</script>
<template>
    <DialogModal :show="props.mostrarForm" @close="onCloseNota">
        <template v-slot:content>
            <div class="row">
                <div class="col-lg-12">
                    <label>Nota</label>
                    <textarea class="form-control" v-model="notaForm.nota" />
                </div>
            </div>
        </template>
        <template v-slot:footer>
            <button class="btn btn-danger me-1" @click.prevent="onCloseNota">Cancelar</button>
            <button class="btn btn-primary" @click.prevent="addNota">
                Guardar
            </button>
        </template>
    </DialogModal>
</template>
