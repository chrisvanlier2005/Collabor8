<script setup>
import UsersApi from "@/Api/UsersApi";
import {onMounted} from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";


const props = defineProps({
    search: {
        type: String,
        default: "chrisvanlier2005"
    }
});
let users = $ref([]);
let searchRef = $ref(props.search);
let searching = $ref(true);
async function getUsers (search) {
    let usersService = new UsersApi();
    users = await usersService.search(search);
    searching = false;
}

async function search(){
    searching = true;
    await getUsers(searchRef);

}


onMounted(() => {
    getUsers(searchRef);
});
</script>
<template>
    <AppLayout>
        <template #header>
            <h1 class="text-3xl font-semibold">Users</h1>
        </template>
        <section class="p-3">
            <input type="text" v-model="searchRef" @change="search" />
            <p v-if="searching">Searching...</p>
            <ul v-if="!searching" class="p-4">
                <li v-for="user in users.items" :key="user.id" class="flex flex-row gap-3 items-center">
                    <img :src="user.avatar_url" alt="avatar" class="w-12 aspect-square rounded-md" />
                    <h2 class="text-xl inter font-semibold">{{ user.login}}</h2>
                </li>
                <li v-if="users.items.length === 0">No search results for {{searchRef}}</li>

            </ul>
        </section>
    </AppLayout>

</template>
