<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import RepositoryView from "@/Pages/Repositories/Components/RepositoryView.vue";
const props = defineProps({
    repository: String,
    username: String,
    path: {
        type: String,
        default: ''
    }
});
</script>
<template>
    <AppLayout>
        <template #header>
            <h1 class="text-3xl font-semibold">Repository</h1>
        </template>
        <section class="grid grid-cols-2">
            <Suspense>
                <RepositoryView :username="username"
                                :path="path"
                                :repository="repository" />
                <template #fallback>
                    <ul class="flex gap-3 flex-col">
                        <li v-for="n in 10" :key="1" class="loading-gradient w-full py-3 h-6 rounded-md"></li>
                    </ul>
                </template>
            </Suspense>
        </section>
    </AppLayout>
</template>
