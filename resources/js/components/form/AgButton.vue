<template>
    <div class="w-auto  w-max-220 rounded-full flex justify-center items-center text-center  border-ag-button "
         @click="$emit('click')"
         @mouseover="$emit('mouseover')"
         @mouseleave="$emit('mouseleave')"
         :class="[disabled ? 'cursor-not-allowed ' : 'cursor-pointer' , type == 'full' ? 'bg-ag-button text-white' : 'bg-white text-ag-button' , title ? '' : 'w-min-30']">
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
    .bg-ag-button{
        background: #525CA3;
    }
    .text-ag-button {
        color: #525CA3;
    }
    .border-ag-button {
        border: 2px solid #525CA3;
    }
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
