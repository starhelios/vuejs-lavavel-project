<template>
    <button @click="$emit('click')" class="h-40 w-full border rounded">
        <slot/>
    </button>
</template>