<script setup>
import {onMounted, ref} from "vue";
import RepositoriesApi from "@/Api/RepositoriesApi";
import {Link, usePage} from "@inertiajs/vue3";
let repositories = $ref("loading");
let repositoriesService = new RepositoriesApi();

async function getRepositories(name){
    repositories = await repositoriesService.find(name);
}

const user = usePage().props.auth.user;

onMounted(() => {
    getRepositories(user.name ?? "");
});

</script>
<template>
    <h1>My repositories</h1>

    <section>
        <div v-if="repositories === 'loading'">
            Loading your repositories
        </div>
        <div v-else-if="repositories.length === 0">
            You have no repositories or we couldn't load find them.
        </div>
        <section v-else class="flex flex-col gap-2">
            <Link
                :href="route('repositories.show', {
                    repository_name: repository.name,
                    username: user.name
                })"
                :key="repository.id" v-for="repository in repositories">
                <article
                    class="border-b border-gray-200 rounded-lg p-4"
                >

                    <h2 class="text-lg font-semibold inter">{{ repository.name }}</h2>

                </article>
            </Link>
        </section>
    </section>

</template>
