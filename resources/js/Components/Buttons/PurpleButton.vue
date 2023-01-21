<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button
        :type="type"
        class="inline-flex inter
         items-center px-4 py-2 bg-purple-600
         border border-transparent rounded-md
         font-semibold text-xs text-white uppercase
         tracking-widest
         hover:bg-purple-700 focus:bg-purple-800 active:bg-purple-900
         focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
         transition ease-in-out duration-150"
    >
        <slot/>
    </button>
</template>
<script>
export default {}
</script>
