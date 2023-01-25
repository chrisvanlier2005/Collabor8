<script setup>
import GithubLinks from "@/Components/Navigation/GithubLinks.vue";
import HomeIcon from "@/Components/Icons/HomeIcon.vue";
import {Link} from "@inertiajs/vue3";
import GitIcon from "@/Components/Icons/GitIcon.vue";
import TeamIcon from "@/Components/Icons/TeamIcon.vue";</script>
<template>
    <nav class="w-48 w-96 h-screen sticky top-0 h-screen">
        <div class="w-full h-16 overflow-x-hidden flex">
            <Link :href="route('dashboard')" class="flex items-center px-3">
                <HomeIcon :class="{
                              'active-icon': $page.component === 'Dashboard',

                          }"
                          class="text-gray-400 h-7 cursor-pointer hover:text-gray-900"/>
            </Link>
            <Link :href="route('repositories.index')" class="flex items-center px-3">
                <GitIcon :class="{
                              'active-icon': $page.component === 'Repositories/Index'
                          }"
                          class="text-gray-400 h-9 cursor-pointer hover:text-gray-900"/>
            </Link>
            <Link :href="route('teams.index')" class="flex items-center px-3">
                <TeamIcon :class="{
                              'active-icon': $page.component === 'Teams/Index'
                          }" class="text-gray-400 h-9 cursor-pointer hover:text-gray-900"/>
            </Link>

        </div>
        <ul
            class="flex w-full flex-col gap-3 pl-2 py-2 inter">

            <li class="w-full">
                <Link class="w-full block rounded-sm p-2 py-1"
                      :href="route('dashboard')"
                      :class="{
                        'active': $page.component === 'Dashboard'
                      }">Dashboard
                </Link>
            </li>
        </ul>
        <GithubLinks v-if="$page.url.startsWith('/github')"/>
        <slot name="additional-links">

        </slot>
    </nav>
</template>
<script>
export default {
    name: 'AppNavigation'
}
</script>
