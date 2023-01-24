<script setup>

import PrimaryButton from "@/Components/Buttons/PrimaryButton.vue";
import SecondaryButton from "@/Components/Buttons/SecondaryButton.vue";
import {Link} from "@inertiajs/vue3";
function scrollTo(query){
    const element = document.querySelector(query);
    element.scrollIntoView({behavior: 'smooth'});
}
</script>
<template>
    <nav class="sticky top-0 z-[10] h-12 flex justify-center">
        <div class="max-w-8xl mx-auto px-12   top-0 w-full flex justify-between items-center z-[10]">
            <div>
                <h2 class="text-2xl inter font-semibold">Collabor8</h2>
            </div>
            <ul class="hidden flex flex-row gap-4
[&>li>a]:rounded-md [&>li>a]:px-2 [&>li>a]:py-1 inter">
                <li>
                    <a @click="scrollTo('#home')"
                       class="cursor-pointer rounded-md">Home</a>
                </li>
                <li>
                    <a @click="scrollTo('#discover')"
                       class="cursor-pointer">Features</a>
                </li>
                <li>
                    <a
                        class="cursor-pointer">Blog</a>
                </li>
            </ul>
            <div class="flex gap-3">
                <Link :href="route('register')">
                    <PrimaryButton class="w-fit">
                        Get started
                    </PrimaryButton>
                </Link>
                <Link :href="route('login')">
                    <SecondaryButton>
                        Login
                    </SecondaryButton>
                </Link>
            </div>
        </div>
    </nav>
</template>
<script>
export default {
    name: 'LandingNavigation'
}
</script>
<style scoped>
nav {
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    padding: 0 12px 0 24px;
    background-image: radial-gradient(transparent 1px, white 1px);
    background-size: 4px 4px;
    backdrop-filter: saturate(50%) blur(4px);
    -webkit-backdrop-filter: saturate(50%) blur(4px);
    top: 0;
}
nav div {
    background-color: rgba(255, 255, 255, 0.3);
}
</style>
