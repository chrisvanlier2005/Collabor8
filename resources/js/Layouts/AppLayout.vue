<script setup>
import {Link} from "@inertiajs/vue3";
import AppNavigation from "@/Components/AppNavigation.vue";
</script>
<template>
    <section class="flex">
        <AppNavigation>
            <template #additional-links>
                <slot name="additional-links"/>
            </template>
        </AppNavigation>
        <main class="w-full pl-4">
            <div class="min-h-[4rem] border-b flex items-center flex-row inter header">
                <slot name="header">

                </slot>
            </div>
            <slot/>
        </main>
    </section>
</template>
<style scoped>
.header:empty {
    display: none;
}
</style>
