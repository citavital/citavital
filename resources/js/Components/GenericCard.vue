<script setup>
import { computed } from "vue";
import { router }  from '@inertiajs/vue3';

const props = defineProps({
    title: String,
    backgroundColor: String,
    backgroundImage: String,
    onTop: Boolean,
    links: Array,
});

const onCardClick = (ev) => {
    if (ev.isExternalLink) {
        window.open(ev.link, '_blank');
    } else {
        window.location.href = route(ev.link);
    }
}

const bgImg = computed(() => {
   return linkImg(props.backgroundImage);
});

const linkImg = ((img) => {
    return new URL(img, import.meta.url).href;
});

</script>

<template>
    <div class="card mt-3 mt-lg-0 shadow">
        <div class="card-body p-0">
            <div class="position-relative" :class="backgroundColor" style="height:240px;">
                <img :src="bgImg" class="img-fluid d-block mx-auto" :style="onTop ? 'height: 240px;' : 'height: 200px;'">
                <template v-if="onTop">
                    <div class="position-absolute bottom-0 text-center w-100">
                        <h3 class="fw-bolder text-center">{{ title }}</h3>
                    </div>
                </template>
                <template v-if="!onTop">
                    <div class="fw-bolder text-center w-100 fs-3">{{ title }}</div>
                </template>
            </div>
            <div class="list-group rounded-0">
                <a
                    v-for="(link, index) of links"
                    :key="index"
                    @click="onCardClick(link)"
                    href="javascript:void(0);"
                    class="p-3 d-flex justify-content-between bg-light-blue list-group-item list-group-item-action"
                >
                    <div>
                        <template v-if="link.img">
                            <img :src="linkImg(link.img)" style="height:20px;" class="me-2"/>
                        </template>
                        <span>{{ link.texto }}</span>
                    </div>
                    <span class="text-black text-end">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
