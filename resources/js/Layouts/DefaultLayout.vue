<script setup>
import DefaultNav from "@/Layouts/Default/DefaultNav.vue";
import DefaultFooter from "@/Layouts/Default/DefaultFooter.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>
<template>
    <DefaultNav :can-login="canLogin" :can-register="canRegister" />
    <slot />
    <DefaultFooter />
</template>
