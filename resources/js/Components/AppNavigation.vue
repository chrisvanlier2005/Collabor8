<script setup>
import {Link} from "@inertiajs/vue3";
</script>
<template>
     <nav class="w-48 h-screen sticky top-0 h-screen">
        <ul class="flex w-full flex-col gap-3 pl-2 py-2 h-full inter">
            <li class="w-full">
                <Link class="w-full block rounded-sm p-2 py-1"
                    :href="route('dashboard')" :class="{
                    'active': $page.url === '/dashboard'
                }">Home</Link>
            </li>
            <li class="w-full">
                <Link class="w-full block rounded-sm p-2 py-1"
                      :href="route('repositories.index')"
                      :class="{
                        'active': $page.url === '/repositories'
                      }">Repositories</Link>
            </li>
            <li class="w-full"
            >
                <Link
                    class="w-full block rounded-sm p-2 py-1"
                    :href="route('users.index')"
                    :class="{
                        'active': $page.url === '/users'
                    }">Users</Link>
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    name: 'AppNavigation'
}
</script>
<style scoped>
.active {
    color: #2e0046;
    font-weight: 600;
    background-color: rgba(82, 0, 123, 0.4);
}
ul li a {
    transition: all 100ms;
}
ul li a:hover{
    color: #2e0046;
    background-color: rgba(82, 0, 123, 0.4);
}
</style>
