<template>
    <div class="w-36 h-56 flex justify-center items-center mx-2 border-2 border-gray-400 rounded "
         :class="[active ? 'bg-brand-500' : '' , !comingSoon ? ' cursor-pointer' : 'cursor-not-allowed opacity-25']"
         @click="!comingSoon ? $emit('click') : ''"
    >
        <div class="">
            <div class="w-full flex justify-center">
                <img :src="icon" alt="" class="text-center" v-show="!active">
                <img :src="activeIcon" alt="" v-show="active">
            </div>
            <p class="text-sm text-center" :class="active ? 'text-white' : ''">{{name}}</p>
            <p class="text-xs text-center" :class="active ? 'text-white' : ''" v-show="comingSoon">(Coming Soon)</p>
            <p class="text-xs text-center" :class="active ? 'text-white' : ''" v-show="!comingSoon">  &nbsp;</p>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'ag-platform-box',
        props: {
            name: String,
            icon: String,
            activeIcon: String,
            active: Boolean,
            comingSoon: Boolean
        },

    }
</script>

