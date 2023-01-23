<script setup>
import {Head} from '@inertiajs/vue3';
import LandingLayout from "@/Layouts/LandingLayout.vue";
import PurpleButton from "@/Components/Buttons/PurpleButton.vue";
import SecondaryButton from "@/Components/Buttons/SecondaryButton.vue";

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
        <section class="max-w-7xl px-12 mx-auto h-screen flex items-center">
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
        </section>
        <section class="max-w-7xl px-12 mx-auto">
            <div>
                <h2 class="capitalize text-5xl inter font-semibold">Discover Collabor8s<br>supercharged powers</h2>
            </div>
        </section>
    </LandingLayout>
</template>
