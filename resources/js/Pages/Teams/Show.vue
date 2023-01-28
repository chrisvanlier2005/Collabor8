<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {onMounted} from "vue";
import TeamHeader from "@/Components/Teams/TeamHeader.vue";

const props = defineProps({
    team: Object,
})

const messages = $ref(props.team.message);
let messageContainer = $ref(null);
onMounted(() => {
    messageContainer.scrollTop = messageContainer.scrollHeight;
});

function sendMessage(event){
    let message = event.target[0].value;
}
</script>
<template>
    <AppLayout>
        <TeamHeader :team="team"/>
        <section class="flex flex-col h-screen overflow-y-auto gap-4" ref="messageContainer">
            <article v-for="message in messages" class="flex flex-row gap-3 ">
                <img :src="'https://ui-avatars.com/api/?background=random&name=' + message.user.name" :alt="message.user.name" class="w-12 h-12 rounded-full" />
                <div>
                    <h4 class="inter font-semibold">{{message.user.name}}</h4>
                    <p class="text-gray-700 inter">
                        {{ message.message }}
                    </p>
                </div>
            </article>
        </section>
        <section class="fixed bottom-0">
            <form @submit.prevent="sendMessage($event)" class="flex flex-row gap-3 p-4">
                <input type="text" class="flex-1 rounded border border-gray-300 p-2" />
                <button type="submit" class="bg-blue-500 text-white rounded p-2">Send</button>
            </form>
        </section>
    </AppLayout>
</template>
<script>
export default {
}
</script>
