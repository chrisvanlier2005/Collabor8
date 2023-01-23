<script setup>
import LanguageLabel from "@/Components/LanguageLabel.vue";
import {Link} from "@inertiajs/vue3";
const props = defineProps({
    username: String,
    repositories: {
        default: []
    }
});
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
            <LanguageLabel :language="repository.language"/>
            <p class="text-gray-500 inter">{{ repository.description ? repository.description : "no description" }}</p>



        </article>
    </Link>
</template>
<script>
export default{
    name: "RepositoriesOverview",
}
</script>
