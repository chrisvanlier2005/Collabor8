<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TeamCard from "@/Components/Teams/TeamCard.vue";
import {Link} from "@inertiajs/vue3";
const props = defineProps({
    teams: Array,
});
</script>
<template>
    <AppLayout>
        <template #additional-links>
            <ul class="flex flex-col gap-1">
                <li v-for="team in teams" class="
                ">
                    <Link class="flex gap-3 mx-6 py-3 px-2 rounded-md"
                    :href="route('teams.show', team.id)">
                        <img :src="'https://ui-avatars.com/api/?background=random&name=' + team.name" :alt="team.name" class="rounded-md w-6">
                        <h4 class="inter font-medium">{{ team.name }}</h4>
                    </Link>
                    </li>
                <hr>
            </ul>
        </template>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 p-5 gap-6">
            <TeamCard v-for="team in teams" :team="team"/>
        </div>
    </AppLayout>
</template>
<script>
export default {
}
</script>
