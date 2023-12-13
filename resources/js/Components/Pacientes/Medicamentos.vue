<script setup>
import { useForm } from "@inertiajs/vue3";
import { reactive } from "vue";
import DialogModal from "@/Components/DialogModal.vue";

const emit = defineEmits(['close', 'load']);

const props = defineProps({
    me: Object,
    mostrarMedicinaForm: Boolean,
});

const medicinaForm = useForm({
    medicamento: ''
});

const onCloseMedicina = () => {
    emit('close');
};

const addMedicamento = () => {
    medicinaForm.post(route('medicamentos.store', { paciente: props.me.id }), {
        preserveScroll: true,
        onSuccess: (res) => {
            emit('load');
            onCloseMedicina();
        },
        onFinish: (res) => {
            medicinaForm.reset();
        }
    });
};

</script>
<template>
    <DialogModal :show="props.mostrarMedicinaForm" @close="onCloseMedicina">
        <template v-slot:content>
            <div class="row">
                <div class="col-lg-12">
                    <label for="medicamento">Medicamento</label>
                    <input id="medicamento" type="text" class="form-control" v-model="medicinaForm.medicamento">
                </div>
            </div>
        </template>
        <template v-slot:footer>
            <button class="btn btn-danger me-1" @click.prevent="onCloseMedicina">Cancelar</button>
            <button class="btn btn-primary" @click.prevent="addMedicamento">
                Guardar
            </button>
        </template>
    </DialogModal>
</template>
