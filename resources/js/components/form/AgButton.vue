<template>
    <div class="w-auto  w-max-220 rounded-full flex justify-center items-center text-center border-2 border-brand-500"
         @click="$emit('click')"
         @mouseover="$emit('mouseover')"
         @mouseleave="$emit('mouseleave')"
         :class="[disabled ? 'cursor-not-allowed ' : 'cursor-pointer' , type == 'full' ? 'bg-brand-500 text-white' : 'bg-white text-brand-500' , title ? '' : 'w-min-30']">
        <p v-if="title" class="uppercase px-6 py-2">{{title}}</p>
        <slot name="icon"></slot>
    </div>
</template>
<script>
    export default {
        props: {
            title: String,
            type: String,
            disabled:{
                type : Boolean,
                default : false
            }
        }
    }
</script>
<style>
    .w-max-220 {
        max-width: 220px;
    }
    .w-min-30 {
        max-width : 42px;
        max-height: 42px;
        width : 42px;
        height: 42px
    }
</style>
