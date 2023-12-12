<script setup>
import InputError from "@/Components/InputError.vue";

const props = defineProps({
    img: String,
    texto: String,
    editMode: Boolean,
    valor: String,
    error: String
});

const getImg = ((img) => {
    return new URL(img, import.meta.url).href;
});
</script>
<template>
    <div class="mt-3">
        <img :src="getImg(img)" class="img-fluid d-block mx-auto p-2" style="max-height: 50px;">
        <span class="text-body-tertiary fw-bold fs-5 text-center w-100 d-block">{{ texto }}</span>
        <span v-if="!editMode" class="fw-bolder fs-4 text-center w-100 d-block">
            {{ valor }}
        </span>
        <template v-else>
            <slot />
        </template>
        <InputError class="mt-2" :message="error" />
    </div>
</template>
