<template>
    <div class="w-full h-screen fixed flex justify-center top-0 text-center items-center" @click="hideMessage()" v-if=" showMessage">
        <div class="px-12 py-3 flex justify-center border border-green-700 rounded-lg bg-white" v-if="type === 'success' ">
            <img src="/assets/icons/success.svg" alt="" class="flex w-6 h-6 mx-2 mt-pxx"> <p class="text-green-700 text-lg flex pr-2">Succesfully created new labels</p>
        </div>
        <div class="px-12 py-3 flex justify-center border border-red-700 rounded-lg bg-white" v-if="type === 'error'">
            <img src="/assets/icons/error.svg" alt="" class="flex w-6 h-6 mx-2 mt-pxx"> <p class="text-red-700 text-lg flex pr-2">An error occured. Please try again</p>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'sn-message',
        props :{
            type: String
        },
        mounted(){
            setTimeout(() => {
                this.showMessage = false
            },3500);
        },
        data(){
            return {
                showMessage : true
            }
        },
        methods: {
            hideMessage(){
                setTimeout(() => {
                    this.showMessage = false
                }, 300);
            }
        }
    }
</script>
