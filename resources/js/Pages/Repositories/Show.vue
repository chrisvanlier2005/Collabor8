<script setup>
import {onMounted} from "vue";
import RepositoriesApi from "@/Api/RepositoriesApi.js";

const props = defineProps({
    repository: String,
    username: String
});
const repositoriesService = new RepositoriesApi();

let repository = $ref([]);
let contents = $ref([]);
async function getRepository() {
    repository = await repositoriesService.find(props.username, props.repository);
    contents = await repositoriesService.content(props.username, props.repository, '');
}

onMounted(() => {
    getRepository();
})
</script>
<template>
    <h1>Show repository</h1>

    <section v-if="repository !== []">
        <h1 class="text-3xl inter font-semibold">Contents</h1>
        <div class v-if="contents === []">
            ...
        </div>
        <div v-else>
            <ul>
                <li v-for="content in contents" :key="content.name">
                    {{ content.name }}
                </li>
            </ul>
        </div>
    </section>
    <section v-else>
        Loading...
    </section>
</template>
