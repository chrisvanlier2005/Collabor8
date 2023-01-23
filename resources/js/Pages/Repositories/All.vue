<script setup>
import RepositoriesOverview from "@/Components/Repositories/RepositoriesOverview.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import {router} from "@inertiajs/vue3";
const props = defineProps({
    username: String,
    repositories: {
        default: []
    }
})
let repositoriesRef = $ref(props.repositories);
router.reload({
    preserveScroll: true,
    preserveState: true,
    only: ["repositories"],
    onSuccess: () => {
        repositoriesRef = props.repositories;
    }
});


</script>
<template>
    <AppLayout>
        <template #header>
            <h1 class="text-3xl">All repositories for {{props.username}}</h1>
        </template>
        <RepositoriesOverview :username="props.username" :repositories="repositoriesRef" v-if="repositoriesRef.length > 0"/>
        <div v-else>
            <p class="text-gray-500">Searching ...</p>
        </div>
    </AppLayout>
</template>
