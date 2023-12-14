<script setup>
defineProps({
    info: {
        type: Object,
        default: () => {
            return {};
        }
    }
});
</script>

<template>
    <div class="mt-4 col-lg-3 px-2">
        <img :src="info.photo_url" class="mx-auto d-block img-fluid h-64" :class="[info.aws ? 'shadow' : '']">
        <h4 class="section-title text-center pt-2">{{ info.name }}</h4>
        <p class="section-subtitle text-muted text-center font-secondary fw-bold">{{ info.rol }}</p>
    </div>
</template>

