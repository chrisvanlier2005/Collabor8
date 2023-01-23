<script setup>
import LandingNavigation from "@/Components/LandingNavigation.vue";
</script>
<template>
    <LandingNavigation/>
    <main class="app-container relative">
        <slot/>
    </main>
</template>
<script>
export default {
    name: "LandingLayout"
}
</script>
<style scoped>
.app-container::before {
    content: "";
    position: absolute;
    z-index: -1;
    opacity: 1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    background-image: url("/static/halftone-background.svg");
    background-size: 100%;
    background-repeat: repeat;

}
</style>
