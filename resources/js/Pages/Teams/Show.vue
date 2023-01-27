<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {onMounted} from "vue";

const props = defineProps({
    team: Object,
})

const messages = $ref(props.team.message);
let messageContainer = $ref(null);
onMounted(() => {
    messageContainer.scrollTop = messageContainer.scrollHeight;
});
</script>
<template>
    <AppLayout>

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
    </AppLayout>
</template>
<script>
export default {
}
</script>
