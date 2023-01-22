<script setup>
import {onMounted, ref} from "vue";
import RepositoriesApi from "@/Api/RepositoriesApi";
import {Link, router, usePage} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/Buttons/PrimaryButton.vue";
let repositories = $ref("loading");
let repositoriesService = new RepositoriesApi();

/*
*  Gets the repositories from the API or local storage
*  and stores in the localstorage
*/
async function getRepositories(name){
    if (localStorage.getItem('repositories') === null) {
        repositories = await repositoriesService.all(name);
        // only store the repository name and id in local storage
        let repositoriesToStore = [];
        for (let i = 0; i < repositories.length; i++) {
            repositoriesToStore.push({
                name: repositories[i].name,
                id: repositories[i].id,
                owner: repositories[i].owner.login
            });
        }
        localStorage.setItem('repositories', JSON.stringify(repositoriesToStore));
    } else {
        let repositoryJson = localStorage.getItem('repositories');
        repositoryJson = JSON.parse(repositoryJson);
        if (repositoryJson[0].owner === name) {
            repositories = repositoryJson;
        } else {
            repositories = await repositoriesService.all(name);
            // only store the repository name and id in local storage
            let repositoriesToStore = [];
            for (let i = 0; i < repositories.length; i++) {
                repositoriesToStore.push({
                    name: repositories[i].name,
                    id: repositories[i].id,
                    owner: repositories[i].owner.login
                });
            }
            localStorage.setItem('repositories', JSON.stringify(repositoriesToStore));
        }
    }
}
function reload(){
    localStorage.removeItem('repositories')
    console.log('reload');
    getRepositories(user.name);
}
const user = usePage().props.auth.user;

onMounted(() => {
    getRepositories(user.name);
});

</script>
<template>

    <h1>My repositories</h1>
    <PrimaryButton @click="reload()">Reload</PrimaryButton>
    <section>
        <div v-if="repositories === 'loading'">
            Loading your repositories
        </div>
        <div v-else-if="repositories.length === 0">
            You have no repositories or we couldn't find them.
            Please check your username corresponds to your github username.
        </div>
        <section v-else class="flex flex-col gap-2">
            <Link
                :href="route('repositories.show', {
                    repository_name: repository.name,
                    username: user.name
                })"
                :key="repository.id" v-for="repository in repositories"
            >
                <article
                    class="border-b border-gray-200 rounded-lg p-4"
                >

                    <h2 class="text-lg font-semibold inter">{{ repository.name }}</h2>

                </article>
            </Link>
        </section>
    </section>

</template>
