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
    if (localStorage.getItem("contents") === null || localStorage.getItem("contents") === undefined) {
        contents = await repositoriesService.content(props.username, props.repository, '');
        let contentToStore = [];
        for (let i = 0; i < contents.length; i++) {
            contentToStore.push({
                name: contents[i].name,
                path: contents[i].path,
                type: contents[i].type,
                repository: props.repository,
                url: contents[i].url
            });
        }
        localStorage.setItem("contents", JSON.stringify(contentToStore));
    }
    else {
        let contentsJson = localStorage.getItem("contents");
        contentsJson = JSON.parse(contentsJson);
        if(contentsJson.length > 0 && contentsJson[0].repository === props.repository){
            contents = contentsJson;
        }
        else{
            contents = await repositoriesService.content(props.username, props.repository, '');
            let contentToStore = [];
            for (let i = 0; i < contents.length; i++) {
                contentToStore.push({
                    name: contents[i].name,
                    path: contents[i].path,
                    type: contents[i].type,
                    repository: props.repository,
                    url: contents[i].url
                });
            }
            localStorage.setItem("contents", JSON.stringify(contentToStore));
        }
    }
}


onMounted(() => {
    getRepository();
})
</script>
<template>
    <h1>Show repository</h1>

    <section v-if="repository.length !== 0">
    </section>
    <h1 class="text-3xl inter font-semibold">Contents</h1>

    <article v-if="contents.length === 0" class="">
        <ul>
            <li v-for="n in 10" class="loading-gradient mb-2 py-4">

            </li>
        </ul>
    </article>
    <article v-else class="border p-5">
            <ul>
                <li v-for="content in contents" :key="content.name" class="border-b border-gray-300 py-2 hover:bg-gray-200 cursor-pointer">
                    {{ content.name }}
                </li>
            </ul>

    </article>
</template>
