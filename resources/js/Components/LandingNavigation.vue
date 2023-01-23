<script setup>

function scrollTo(query){
    const element = document.querySelector(query);
    element.scrollIntoView({behavior: 'smooth'});
}
</script>
<template>
    <nav class="sticky max-w-7xl mx-auto px-12   top-0 w-full flex justify-between py-6 items-center z-[10]">
        <div>
            <h2 class="text-2xl inter">Collabor8</h2>
        </div>
        <ul class="flex flex-row gap-4
[&>li>a]:rounded-md [&>li>a]:px-2">
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
        <div>

        </div>
    </nav>
</template>
<script>
export default {
    name: 'LandingNavigation'
}
</script>
