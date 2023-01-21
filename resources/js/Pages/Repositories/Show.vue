<script setup>
import {onMounted} from "vue";
import RepositoriesApi from "@/Api/RepositoriesApi.js";

const props = defineProps({
    repository: String,
    username: String
});
const repositoriesService = new RepositoriesApi();

let repository = $ref([]);

async function getRepository() {
    repository = await repositoriesService.find(props.username, props.repository);
}

onMounted(() => {
    getRepository();
})
</script>
<template>
    <h1>Show repository</h1>
    <div v-if="repository !== []">
        <h1 class="text-3xl inter font-semibold">Contents</h1>
        <section v-if="repository !== []" class="contents-list">
            <div v-for="content in repository.contents">
                <h2>{{ content.name }}</h2>
            </div>
        </section>
    </div>
</template>
