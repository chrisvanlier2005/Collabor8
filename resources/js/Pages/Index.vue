<script setup>
import {Head} from '@inertiajs/vue3';
import LandingLayout from "@/Layouts/LandingLayout.vue";
import PurpleButton from "@/Components/Buttons/PurpleButton.vue";
import SecondaryButton from "@/Components/Buttons/SecondaryButton.vue";
import GitIcon from "@/Components/Icons/GitIcon.vue";
import DirectoryIcon from "@/Components/Icons/DirectoryIcon.vue";
import HomeIcon from "@/Components/Icons/HomeIcon.vue";
import ChatIcon from "@/Components/Icons/ChatIcon.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head>
        <title>Homepage</title>
    </Head>
    <LandingLayout>
        <section
            id="home"
            class="max-w-7xl px-12 mx-auto h-screen flex items-center relative">
            <div class="flex flex-col gap-3">
                <h1 class="text-6xl font-semibold inter">Unleash Your<br>Unbound Productivity</h1>
                <p class="max-w-md text-gray-500 text-sm">Lorem ipsum dolor sit amet consectetur. Nec mattis eget cursus malesuada ullamcorper quisque nisi.
                    Tellus elementum fringilla nullam massa mauris dolor sit et. Condimentum euismod aenean condimentum
                    consequat ultrices sit vitae. Quam gravida egestas lobortis sed facilisi. Maecena.</p>
                <div class="flex items-center gap-4">
                    <PurpleButton class="w-fit">
                        Get started
                    </PurpleButton>
                    <SecondaryButton class="w-fit">
                        Pricing
                    </SecondaryButton>
                </div>
            </div>
            <div class="absolute top-1/3 right-[-6rem] transform  -translate-y-1/2">
                <img src="/static/landing_image.png" alt="hero">
            </div>
            <div class="absolute top-[60%] right-16 transform  -translate-y-1/2">
                <img src="/static/landing_image_2.png" alt="hero">
            </div>
            <div class="absolute top-[50%] right-64 transform  -translate-y-1/2">
                <img src="/static/landing_image_3.png" alt="hero">
            </div>
        </section>
        <section
            id="discover"
            class="max-w-7xl px-12 mx-auto min-h-screen">
            <div class="header mb-6">
                <h2 class="capitalize text-5xl inter font-semibold">Discover Collabor8s<br>
                    <span class="text-purple-500">
                        supercharged
                    </span>
                    powers</h2>
            </div>
            <div class="lg:grid-cols-4 md:grid-cols-2 grid gap-4">
                <article class="flex flex-col items-start gap-3 bg-white lg:col-span-2 p-3 rounded-md">
                    <GitIcon class="h-24"/>
                    <div class="text-lg inter">
                        <h3 class="text-2xl font-semibold">Github Intergration</h3>
                        <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
                    </div>
                </article>
                <article class="flex flex-col items-start gap-3 bg-white lg:col-span-2 p-3 rounded-md">
                    <DirectoryIcon class="h-24"/>
                    <div class="text-lg inter">
                        <h3 class="text-2xl font-semibold">Project management</h3>
                        <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
                    </div>
                </article>
                <article class="flex flex-col items-start gap-3 bg-white p-3 rounded-md">
                    <HomeIcon class="h-16"/>
                    <div class="inter">
                        <h3 class="text-1xl font-semibold">Self hosted</h3>
                        <p class="text-gray-500 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
                    </div>
                </article>
                <article class="flex flex-col items-start gap-3 bg-white lg:col-span-1 p-3 rounded-md">
                    <ChatIcon class="h-16 purple-blue-icon  "/>
                    <div class=" inter">
                        <h3 class="text-2xl font-semibold">Teams</h3>
                        <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
                    </div>
                </article>
            </div>
        </section>
    </LandingLayout>
</template>
