<script setup>
import RepositoriesOverview from "@/Components/Repositories/RepositoriesOverview.vue";

const props = defineProps({
    username: String,
})
</script>
<template>
    <h1>All repositories for {{props.username}}</h1>
    <Suspense>
        <RepositoriesOverview :username="props.username" />
        <template #fallback>
            <div>Loading...</div>
        </template>
    </Suspense>
</template>
