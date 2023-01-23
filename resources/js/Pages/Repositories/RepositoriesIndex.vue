<script setup>
import {onMounted, ref} from "vue";
import {Link, router, usePage} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import RepositoriesOverview from "@/Components/Repositories/RepositoriesOverview.vue";
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
            <h1 class="text-3xl font-semibold">Repositories</h1>
        </template>
        <Suspense>
            <RepositoriesOverview :username="username" :repositories="repositoriesRef"/>
            <template #fallback>
                <div>Loading...</div>
            </template>
        </Suspense>

    </AppLayout>

</template>
