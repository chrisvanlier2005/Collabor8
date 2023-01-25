<template>
    <Link :href="route('teams.show', team.id)">
        <article class="w-full p-6 px-12 gap-3 rounded-xl flex items-center justify-center flex-col border
                    shadow-lg">
            <img :src="'https://ui-avatars.com/api/?background=random&name=' + team.name" :alt="team.name" class="rounded-md w-full">
            <div class="w-full">
                <h2 class="font-semibold text-xl inter">{{team.name}}</h2>
            </div>
        </article>
    </Link>

</template>
<script setup>
import {Link} from "@inertiajs/vue3";
const props = defineProps({
    team: Object,
})
</script>
<script>
export default {
    name: "TeamCard",
}
</script>
