<script async setup>
import RepositoriesApi from "@/Api/RepositoriesApi";
import {Link} from "@inertiajs/vue3";
import axios from "axios";
// import {ref} from "vue";
const props = defineProps({
    username: String,
});

let repositoryApi = new RepositoriesApi();
const repositoriesRequest = await repositoryApi.all(props.username);
const repositories = repositoriesRequest;

</script>
<template>

    <Link
        :href="route('repositories.show', {
                    repository_name: repository.name,
                    username: username
                })"
        :key="repository.id" v-for="repository in repositories"
    >
        <article
            class="border-b border-gray-200 rounded-lg p-4"
        >

            <h2 class="text-lg font-semibold inter">{{ repository.name }}</h2>

        </article>
    </Link>
</template>
<script>
export default{
    name: "RepositoriesOverview",
}
</script>
