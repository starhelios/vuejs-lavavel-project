<template>
    <div class=" w-full flex absolute bg-white top-0 mt-16 mx-auto shadow-popup rounded z-20">
        <div class=" absolute top-0 -mt-5 w-full flex justify-center z-30 white-tringle">
        </div>
        <div class="w-full flex flex-col pt-5 p-3 h-full">
            <div class="w-full flex justify-start" >
                <div class="flex mx-2 py-px cursor-pointer"
                     @click="chooseTab(tab.id , tab.slug)"
                     :class="selectedTab === tab.id ? 'border-b-2 border-brand-600' : ''"
                     v-for="(tab , index) in filterTabs"
                     :key="index"
                >
                    <p class=" uppercase" :class="selectedTab === tab.id ? 'text-brand-500' : 'text-gray-500'">{{tab.name}}</p>
                </div>
            </div>
            <div class="w-full flex flex-col">
                <div class="w-full flex justify-start flex-wrap pb-5 p-2" v-for="tab in filterTabs" :key="tab.id" v-if="selectedTab === tab.id">
                    <div class="w-1/3 text-left p-2" v-for="input in tab.inputs">
                        <ag-text-input  label="Brand"></ag-text-input>
                    </div>
                </div>
                <div class="w-full flex justify-end px-4 pb-2">
                    <ag-button type="full" class="px-8 mx-2" title="reset" @click="resetFilter()"></ag-button>
                    <ag-button class="mx-2 px-8" type="full" title="apply" @click="applyFilter()"></ag-button>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'ag-filter-box',
        data(){
            return {
                filterTabs: [
                    {id: 0 , name: 'Campaign' , slug: 'campaign' , inputs: 12},
                    {id: 1 , name: 'Line Item' , slug: 'line_item' , inputs : 7},
                    {id: 2 , name: 'Inseration Order' , slug: 'insertion_order' , inputs: 5},
                    {id: 3 , name: 'Creative' , slug: 'creative' , inputs: 2},
                ],
                selectedTab : 0,
            }
        },
        methods: {
            chooseTab(id , slug){
                this.selectedTab = id
            },
            resetFilter(){

            },
            applyFilter(){

            }
        }

    }
</script>
<style>
    .white-tringle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 10px 20px 10px;
        border-color: transparent transparent #fff transparent;
        right:68%;
        -webkit-filter: drop-shadow(1px -1px 2px  rgba(0,0,0,.13));
        filter: drop-shadow(1px -1px 2px rgba(0,0,0,.13));
    }

    .shadow-popup {
        -webkit-box-shadow: 0px 9px 15px 0px rgba(0,0,0,0.15);
        -moz-box-shadow: 0px 9px 15px 0px rgba(0,0,0,0.15);
        box-shadow: 0px 9px 15px 0px rgba(0,0,0,0.15);
    }

</style>
