<script setup>
import {onMounted} from "vue";
import RepositoriesApi from "@/Api/RepositoriesApi.js";
import AppLayout from "@/Layouts/AppLayout.vue";
import RepositoriesOverview from "@/Components/Repositories/RepositoriesOverview.vue";
import RepositoryView from "@/Pages/Repositories/Components/RepositoryView.vue";
const props = defineProps({
    repository: String,
    username: String
});
</script>
<template>
    <AppLayout>
        <template #header>
            <h1 class="text-3xl font-semibold">Repository</h1>
        </template>
        <section class="grid grid-cols-2">
            <Suspense>
                <RepositoryView :username="username" :repository="repository" />
                <template #fallback>
                    <p>Loading repository...</p>
                </template>
            </Suspense>
        </section>
    </AppLayout>
</template>
