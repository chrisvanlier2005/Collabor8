<template>
    <nav class="h-12 border-b flex items-center px-2">
        <h2>{{team.name}}</h2>
        <ul>
            <li>
                <Link>Chat</Link>
            </li>
            <li>
                <Link>Members</Link>
            </li>
            <li>
                <Link>Settings</Link>
            </li>
            <li>
                <Link>Issues</Link>
            </li>
        </ul>
    </nav>
</template>
<script setup>
import { Link} from "@inertiajs/vue3";

let props = defineProps({
    team: Object,
})
</script>
<script>
export default {
}
</script>
<style scoped>
nav ul {
    display: flex;
    flex-direction: row;
    list-style: none;
    margin-left: auto;
    gap: 1rem   ;
}



nav ul li a {
    text-decoration: none;
    padding: 0.5rem;
    height: 100%;
    border-radius: .2rem;
}



</style>
