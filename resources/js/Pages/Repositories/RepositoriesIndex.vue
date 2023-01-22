<script setup>
import {onMounted, ref} from "vue";
import RepositoriesApi from "@/Api/RepositoriesApi";
import {Link, router, usePage} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/Buttons/PrimaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import RepositoriesOverview from "@/Components/Repositories/RepositoriesOverview.vue";
let repositories = $ref("loading");
let repositoriesService = new RepositoriesApi();

/*
*  Gets the repositories from the API or local storage
*  and stores in the localstorage
*/


const user = usePage().props.auth.user;
let username = user.name;

</script>
<template>
    <AppLayout>
        <template #header>
            <h1 class="text-3xl font-semibold">Repositories</h1>
        </template>
        <Suspense>
            <RepositoriesOverview :username="username"/>
            <template #fallback>
                <div>Loading...</div>
            </template>
        </Suspense>

    </AppLayout>

</template>
