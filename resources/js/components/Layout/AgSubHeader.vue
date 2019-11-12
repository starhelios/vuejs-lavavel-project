<template>
    <div class="w-full rounded-full bg-gray-300 flex justify-between text-center relative">
    <div class="w-1/2 flex justify-start">
        <div class="w-2/4 border-r border-gray-500 relative pt-3 p-3 text-left">
            <input type="text" placeholder="search..." class="pl-8 bg-transparent rounded-full placeholder-brand-500 text-brand-500 pt-pxx" v-model="searchValue" @keyup="search()">
            <img src="/assets/icons/search.svg" alt="" class="absolute left-0 top-0 ml-4 mt-4">
        </div>
        <div class="w-1/4 border-r border-gray-500 p-3 cursor-pointer flex justify-center relative" @click="openFilter()">
            <p class=" text-brand-500">FILTER </p> <img src="/assets/icons/arrow-down.svg" alt="" class=" pl-2 py-1 ">

        </div>
        <div class="w-1/4 border-r border-gray-500 p-3 cursor-pointer flex justify-center relative" >
            <p @click="openBlocks()" class=" text-brand-500">BLOCKS </p> <img @click="openBlocks()" src="/assets/icons/arrow-down.svg" alt="" class=" pl-2 py-1">
            <ag-blocks-box v-if="showBlocks"></ag-blocks-box>
        </div>
    </div>
    <div class="w-1/2 flex justify-start">
        <div class="w-1/3 flex justify-start border-r border-gray-500">
        </div>
        <div class="w-2/3 flex justify-start">
            <div class="w-2/5 border-r border-gray-500 p-3 cursor-pointer flex justify-center">
                <p class=" text-brand-500">EXPORT XLS </p> <img src="/assets/icons/download.svg" alt="" class=" pl-2 py-1 ">
            </div>
            <div class="w-2/5 border-r border-gray-500 p-3 cursor-pointer flex justify-center">
                <p class=" text-brand-500">EXPORT CSV </p> <img src="/assets/icons/download.svg" alt="" class=" pl-2 py-1 ">
            </div>
            <div class="w-1/5 p-3 flex justify-center cursor-pointer" @click="remove()"> <img src="/assets/icons/delete.svg" alt=""  > </div>
        </div>
    </div>
        <ag-filter-box v-if="showFilter"></ag-filter-box>
    </div>
</template>
<script>
    export default {
        name: 'ag-sub-header',
        data(){
            return {
                searchValue: '',
                showBlocks: false,
                showFilter: false
            }
        },
        methods: {
            search(){

            },
            remove(){

            },
            openFilter(){
                this.showBlocks = false
                this.showFilter = !this.showFilter
            },
            openBlocks(){
                this.showFilter = false
                this.showBlocks = !this.showBlocks
            }
        }
    }

</script>
<style>

</style>
