<script setup>
import {onMounted, ref, watch} from "vue";
import {Link, router, usePage} from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import RepositoriesOverview from "@/Components/Repositories/RepositoriesOverview.vue";
const props = defineProps({
    username: String,
    repositories: {
        default: []
    },
    search: {
        default: ""
    }
})
let repositoriesRef = $ref(props.repositories);
let searchRef = $ref(props.search);
router.reload({
    preserveScroll: true,
    preserveState: true,
    only: ["repositories"],
    onSuccess: () => {
        repositoriesRef = props.repositories;
    }
});

function search(){
    router.visit(route('repositories.index', {
        search: searchRef,
    }), {
        preserveState: false,
        preserveScroll: true,
    });
}


</script>
<template>
    <AppLayout>
        <template #header>
            <h1 class="text-3xl font-semibold">My Repositories</h1>
        </template>
        <input name="search"
            v-model="searchRef"
            type="text"
            class="w-full border border-gray-300 rounded-md p-2 my-3"
               placeholder="Search..."
               @change="search"

        />

        <Suspense>
            <RepositoriesOverview :username="username" :repositories="repositoriesRef"/>
            <template #fallback>
                <div>Loading...</div>
            </template>
        </Suspense>

    </AppLayout>

</template>
