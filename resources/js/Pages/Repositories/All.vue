<script setup>
import RepositoriesOverview from "@/Components/Repositories/RepositoriesOverview.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    username: String,
})
</script>
<template>
    <AppLayout>
        <template #header>
            <h1 class="text-3xl">All repositories for {{props.username}}</h1>
        </template>
        <Suspense>
            <RepositoriesOverview :username="props.username" />
            <template #fallback>
                <p class="loading-gradient">Hallo</p>
            </template>
        </Suspense>
    </AppLayout>
</template>
