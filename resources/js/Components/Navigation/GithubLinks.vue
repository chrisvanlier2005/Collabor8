<script setup>
import {Link} from "@inertiajs/vue3";

</script>

<template>
<ul
    class="flex w-full flex-col gap-3 pl-2 py-2 h-full inter">

    <li class="w-full">
        <Link class="w-full block rounded-sm p-2 py-1"
              :href="route('repositories.index')"
              :class="{
                        'active': $page.component === 'Repositories/Index'
                      }">My repositories
        </Link>
    </li>
    <li class="w-full"
    >
        <Link
            class="w-full block rounded-sm p-2 py-1"
            :href="route('users.index')"
            :class="{
                        'active': $page.url === '/users'
                    }">Users
        </Link>
    </li>
</ul>
</template>
<script>
export default {
    name: 'GithubLinks'
}
</script>
