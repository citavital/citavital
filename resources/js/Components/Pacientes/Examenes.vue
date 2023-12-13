<script setup>
import { useForm } from "@inertiajs/vue3";
import { reactive } from "vue";
import DialogModal from "@/Components/DialogModal.vue";

const emit = defineEmits(['close', 'load']);

const props = defineProps({
    me: Object,
    mostrarForm: Boolean,
});

const examenForm = useForm({
    examen: '',
    file: null,
});

const onCloseExamen = () => {
    emit('close');
};

const addExamen = () => {
    examenForm.post(route('examenes.store', { paciente: props.me.id }), {
        preserveScroll: true,
        onSuccess: (res) => {
            emit('load');
            onCloseExamen();
        },
        onFinish: (res) => {
            examenForm.reset();
        }
    });
};

const onFile = (ev) => {
    examenForm.file = ev.target.files[0];
};

</script>
<template>
    <DialogModal :show="props.mostrarForm" @close="onCloseExamen">
        <template v-slot:content>
            <div class="row">
                <div class="col-lg-12">
                    <label for="examen">Examen</label>
                    <input id="examen" type="text" class="form-control" v-model="examenForm.examen">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <label for="file">Examen</label>
                    <input type="file" id="file" @input="onFile" class="form-control">
                </div>
            </div>
        </template>
        <template v-slot:footer>
            <button class="btn btn-danger me-1" @click.prevent="onCloseExamen">Cancelar</button>
            <button class="btn btn-primary" @click.prevent="addExamen">
                Guardar
            </button>
        </template>
    </DialogModal>
</template>
