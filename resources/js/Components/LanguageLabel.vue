<script setup>
const props = defineProps({
    language: String,
});
let color = "rgb(27, 31, 35)";
switch (props.language) {
    case "JavaScript":
        color = "rgb(255, 221, 0)";
        break;
    case "PHP":
        color = "rgb(54,0,141)";
        break;
    case "HTML":
        color = "rgb(255,68,0)";
        break;
    case "CSS":
        color = "rgb(0,0,255)";
        break;
    case "Python":
        color = "rgb(0,0,255)";
        break;
    case "C++":
        color = "rgb(230,255,0)";
        break;
    case "C#":
        color = "rgb(0,255,0)";
        break;
    case "C":
        color = "rgb(0,255,0)";
        break;
    case "Java":
        color = "rgb(255,0,0)";
        break;
    case "TypeScript":
        color = "rgb(0,0,255)";
        break;
    case "Shell":
        color = "rgb(0,0,0)";
        break;
        case "Ruby":
        color = "rgb(255,0,0)";
        break;
        case "Vue":
        color = "rgb(0,255,0)";
        break;
        case "Rust":
        color = "rgb(0,0,0)";
        break;
        case "Go":
        color = "rgb(0,0,0)";


}


</script>

<template>
    <div class="flex items-center">
        <div class="w-2 h-2 rounded-full" :style="{backgroundColor: color}"></div>
        <p class="ml-2">{{props.language}}</p>
    </div>
</template>

<script>
export default{
    name: "LanguageLabel",
}
</script>
