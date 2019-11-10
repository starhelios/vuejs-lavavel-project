<template>
    <button
        @click="$emit('click')"
        class="bg-brand-500  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
    >
        <slot></slot>
    </button>
</template>

<script>
export default {
    props: ["title"]
};
</script>
