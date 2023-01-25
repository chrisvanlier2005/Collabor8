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
            class="border-b border-gray-200 rounded-lg p-4 flex items-center justify-start gap-3"
        >

            <div>
                <img :src="repository.owner.avatar_url" alt="avatar" class="w-12 aspect-square object-cover rounded-md"/>
            </div>
            <div>
                <h2 class="text-lg font-semibold inter">{{ repository.name }}</h2>
                <LanguageLabel :language="repository.language"/>
                <p class="text-gray-500 inter">{{ repository.description ? repository.description : "no description" }}</p>
            </div>



        </article>
    </Link>
</template>
<script>
export default{
    name: "RepositoriesOverview",
}
</script>
