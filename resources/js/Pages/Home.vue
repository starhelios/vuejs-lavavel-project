<template>
    <div class="w-full p-8">
        <h1>Home </h1>
        <h5>Test: {{test}}</h5>
        <br>
        <ag-button title="submit" type="full" :disabled="true">
        </ag-button>
        <br>
        <ag-button  type="full" >

        </ag-button>
        <br>
        <sn-message type="error"></sn-message>
        <div class="w-96">
            <sn-text-input label="Description" v-model="model" @blur="capital(model)" @keyup="change" :optional="true" :error="error" :withLeftSlot="true">
                <span slot="left-icon"><img src="/assets/icons/clock.svg" alt=""></span>
            </sn-text-input>
        </div>
        <p>{{model}}</p>
        <br>
        <br>
        <ag-button  type="full" title="Change Test" @click="changeTestVuex()">

        </ag-button>
        <br>
        <p>Type in the input then click at change test , the New Value will be changed after clicking using Vuex</p>
        <p> <b>{{testVuex}}</b> </p>

    </div>
</template>

<script>
    import { mapState } from "vuex";
    export default {
        layout: 'default',
        props: ['test'],
        data(){
            return {
                model: '',
                error: true
            }
        },
        computed: {
            ...mapState({

            }),
            testVuex(){
                return this.$store.state.testVuex
            }
        },
        methods: {
            capital(val){
                console.log(val)
            },
            change(){
                console.log('changed');
                this.error = false
            },
            changeTestVuex(){
                console.log('clicked')
                this.$store.commit("setTest", this.model);
            }
        }
    }
</script>
