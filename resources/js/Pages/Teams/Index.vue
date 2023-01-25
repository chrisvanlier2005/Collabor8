<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TeamCard from "@/Components/Teams/TeamCard.vue";
const props = defineProps({
    teams: Array,
});
</script>
<template>
    <AppLayout>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 p-5 gap-6">
            <TeamCard v-for="team in teams" :team="team"/>
        </div>
    </AppLayout>
</template>
<script>
export default {
}
</script>
