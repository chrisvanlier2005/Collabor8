<script async setup>
import RepositoriesApi from "@/Api/RepositoriesApi";
import {Link} from "@inertiajs/vue3";
import FileIcon from "@/Components/Icons/FileIcon.vue";
import DirectoryIcon from "@/Components/Icons/DirectoryIcon.vue";
const props = defineProps({
    username: String,
    repository: String,
    path: {
        type: String,
        default: ''
    }
});

let repositoryService = new RepositoriesApi();

const repositoryContent = await repositoryService.content(props.username, props.repository, props.path);

</script>
<template>
    <div>
        <h1 class="text-3xl font-semibold">{{ repository }}</h1>
        {{typeof repositoryContent}}
        <ul class="overflow-y-auto h-96" v-if="!repositoryContent.content">
            <li v-for="content in repositoryContent" :key="content.id">
                <Link :href="route('repositories.show', {
                    repository_name: repository,
                    username: username,
                    path: content.path
                })"
                class="w-full h-full flex gap-4 py-2 border-b border-gray-200">
                    <FileIcon v-if="content.type === 'file'"
                    class="w-6"/>
                    <DirectoryIcon v-else
                    class="w-6"/>
                    {{ content.name }}
                </Link>
            </li>
        </ul>
        <div>
            <pre>
{{ repositoryContent.content}}


            </pre>
        </div>
    </div>
</template>
<script>
export default {
    name: "RepositoryView",
}
</script>
