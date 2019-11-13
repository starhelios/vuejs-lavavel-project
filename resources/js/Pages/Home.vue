<template>
    <div class="w-full p-8">
        <h1>Home</h1>
        <h5>Test: {{test}}</h5>
        <br>
        <ag-button title="submit" type="full" :disabled="true">
        </ag-button>
        <br>
        <br>
        <ag-sub-header>

        </ag-sub-header>
        <br>

        <br>
        <br>

        <br>
        <br>

        <br>
        <br>

        <br>

        <sn-message type="error"></sn-message>
        <div class="w-96">
            <ag-text-input label="Description" v-model="model" @blur="capital(model)" @keyup="change" :optional="true"
                           :error="error" :withLeftSlot="true">
                <span slot="left-icon"><img src="/assets/icons/clock.svg" alt=""></span>
            </ag-text-input>
        </div>
        <p>{{model}}</p>
        <br>
        <br>
        <ag-button type="full" title="Change Test" @click="changeTestVuex()">

        </ag-button>
        <br>
        <p>Type in the input then click at change test , the New Value will be changed after clicking using Vuex</p>
        <p><b>{{testVuex}}</b></p>
        <div class="w-200 flex flex-center p-3">
            <pagination-btn-direction direction="left" class="mx-2"></pagination-btn-direction>
            <pagination-number :active="true" :number="1" class="mx-2"></pagination-number>
            <pagination-number :number="2" class="mx-2"></pagination-number>
            <pagination-number :number="3" class="mx-2"></pagination-number>
            <pagination-btn-direction direction="right" class="mx-2"></pagination-btn-direction>
        </div>

        <ag-toast title="Test title" body="Test Body"/>
    </div>
</template>

<script>
    import {mapState} from "vuex";

    export default {
        layout: 'default',
        props: ['test'],
        data() {
            return {
                model: '',
                error: true
            }
        },
        computed: {
            ...mapState({}),
            testVuex() {
                return this.$store.state.testVuex
            }
        },
        methods: {
            capital(val) {
                console.log(val)
            },
            change() {
                console.log('changed');
                this.error = false
            },
            changeTestVuex() {
                console.log('clicked')
                this.$store.commit("setTest", this.model);
            }
        }
    }
</script>
