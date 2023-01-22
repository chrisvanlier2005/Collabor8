<script setup>
import {Link, router} from "@inertiajs/vue3";
</script>
<template>
    <section class="flex">
        <nav class="w-48 h-screen">
            <ul class="flex flex-col gap-3 pl-2 py-2 h-full">
                <li>
                    <Link :href="route('dashboard')">Home</Link>
                </li>
                <li>
                    <Link :href="route('repositories.index')">Repositories</Link>
                </li>
            </ul>
        </nav>
        <main class="w-full">

            <slot/>
        </main>
    </section>
</template>
