<script setup>
const props = defineProps({
    repository: String,
    username: String
});


let repository = $ref("loading");
</script>
<template>
<h1>Show repository</h1>
</template>
