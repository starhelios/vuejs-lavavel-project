<template>
    <div class=" block-wrapper w-full flex absolute bg-white top-0 mt-16   mx-auto shadow-popup rounded z-20">
            <div class=" absolute top-0 left-0 -mt-5  mx-auto w-full flex justify-center z-30 white-tringle">
            </div>
        <div class="w-full flex flex-col py-4 px-2 2xl:px-5">
            <div class="w-full flex justify-start p-2" @click="inserationToggle()">
                <img src="/assets/icons/checked.svg" v-if="inseration" alt="" > <img  src="/assets/icons/unchecked.svg" alt="" v-if="!inseration">  <p class="text-brand-500 px-1">Insertion Order</p>
            </div>
            <div class="w-full flex justify-start p-2" @click="lineItemToggle()">
                <img src="/assets/icons/checked.svg" v-if="lineItem" alt=""> <img src="/assets/icons/unchecked.svg" alt="" v-if="!lineItem">  <p class="text-brand-500 px-1">Line Item</p>
            </div>
            <div class="w-full flex justify-start p-2" @click="creativeToggle()">
                <img src="/assets/icons/checked.svg" v-if="creative" alt=""> <img src="/assets/icons/unchecked.svg" alt="" v-if="!creative">  <p class="text-brand-500 px-1">Creative</p>
            </div>
        </div>

    </div>

</template>
<script>
        export default {
            name: 'ag-blocks-box',
            data(){
                return {
                    inseration: true,
                    lineItem: true,
                    creative: true


                }
            },
            methods: {
                inserationToggle(){
                    this.inseration = !this.inseration
                },
                lineItemToggle(){
                    this.lineItem = !this.lineItem
                },
                creativeToggle(){
                    this.creative = !this.creative
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
        margin-left: 50%;
        -webkit-filter: drop-shadow(1px -1px 2px  rgba(0,0,0,.13));
        filter: drop-shadow(1px -1px 2px rgba(0,0,0,.13));

    }
    .block-wrapper {
        width: 130%;

    }
    .shadow-popup {
        -webkit-box-shadow: 0px 9px 15px 0px rgba(0,0,0,0.15);
        -moz-box-shadow: 0px 9px 15px 0px rgba(0,0,0,0.15);
        box-shadow: 0px 9px 15px 0px rgba(0,0,0,0.15);
    }

</style>
