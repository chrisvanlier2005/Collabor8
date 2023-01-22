<script async setup>
import RepositoriesApi from "@/Api/RepositoriesApi";
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    username: String,
    repository: String,
});

let repositoryService = new RepositoriesApi();

const repositoryContent = await repositoryService.content(props.username, props.repository, '');

</script>
<template>
    <div>
        <h1>Repository</h1>
        <ul>
            <li v-for="content in repositoryContent" :key="content.id">
                <Link :href="route('repositories.show', {
                    repository_name: content.name,
                    username: username
                })">
                    {{ content.name }}
                </Link>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    name: "RepositoryView",
}
</script>
