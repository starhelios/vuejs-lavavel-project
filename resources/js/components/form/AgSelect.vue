<template>
    <div class="w-full flex flex-col relative">
        <p class="text-brand-500 font-semibold px-2 pt-1 pb-2 capitalize" v-if="label">{{label}} <span class="lowercase"
                                                                                                       v-if="optional">(optional)</span>
        </p>
        <div class="w-full flex relative ">
            <input :id="refin" :placeholder="ph" :ref="refin" :value="value" @blur="checkInput()" @input="updateValue()"
                   @keydown.down="selectedIndex++" @keydown.enter="indexSelected"
                   @keydown.up="selectedIndex--"
                   autocomplete="off"
                   class="w-full rounded placeholder-band-600 text-brand-500 border-2 p-2 pr-8 focus:shadow-outline outline-color "
                   type="text"
                   v-if="type == 'select'">
            <img @click="showDropDown = true" alt=""
                 class="absolute right-0 top-0 mt-3 mr-2 pt-px cursor-pointer" src="/assets/icons/arrow-right.svg"
                 v-if="!showDropDown && type == 'select'">
            <img @click="showDropDown = false" alt="" class="absolute right-0 top-0 mt-3 mr-2 pt-px cursor-pointer"
                 src="/assets/icons/arrow-down.svg" v-if="showDropDown && type == 'select'">

            <ag-drop-down :data="dropdownValues" :localValue="localValue"
                          :options="options"
                          :selectedIndex="selectedIndex" :taggable="taggable"
                          :toggleclass="toggleclass" @changedLocalValue="(val) => { this.localValue = val}"
                          @saveNewValue="addValue"
                          @selected="selected"
                          @showValue="(value) => {this.showValue = value;}"
                          v-if="showDropDown && type == 'select'"></ag-drop-down>


            <datepicker :monday-first="true" :placeholder="ph"
                        :required="true"
                        class="w-full  relative w-full p-2 rounded placeholder-band-600 text-brand-500 border-2  pr-8 focus:shadow-outline outline-color"
                        format="dd.MM.yyyy"
                        input-class=""
                        ref="programaticOpen"
                        v-if="type == 'datepicker'"
                        v-model="localValueDate"
                        wrapper-class="w-full "
            >

            </datepicker>
            <vue-timepicker
                    :placeholder="ph"
                    @change="(val) => { this.localValue = val}"
                    format="HH:mm"
                    input-class="w-full  relative w-full p-2 rounded placeholder-band-600 text-brand-500 border-2  pr-8 focus:shadow-outline outline-color"
                    ref="timepickerOpen"
                    v-if="type == 'timepicker'"
                    v-model="localValueTime"
            ></vue-timepicker>
        </div>

    </div>

</template>
<script>
    import Datepicker from 'vuejs-datepicker';
    import {en} from 'vuejs-datepicker/dist/locale';

    import VueTimepicker from 'vue2-timepicker';
    import 'vue2-timepicker/dist/VueTimepicker.css'

    export default {
        name: 'ag-select',
        props: {
            ph: String,
            refin: String,
            type: String,
            label: String,
            optional: {
                type: Boolean,
                default: false
            },
            value: String,
            options: Array,
            taggable: {
                type: Boolean,
                default: true
            }
        },
        components: {
            'datepicker': Datepicker,
            'vue-timepicker': VueTimepicker
        },
        data() {
            return {

                selectedIndex: 0,
                localValue: this.value,
                localValueTime: {
                    HH: "00",
                    mm: "00",
                },
                errors: {
                    required: false,
                    placeholder: ''
                },
                localValueDate: '',
                showDropDown: false,
                dropdownValues: [
                    {
                        label: '',
                        value: ''
                    }
                ],
                language: en,
                toggleclass: false
            }
        },
        methods: {
            updateValue() {
                this.showDropDown = true;
            },
            checkInput() {

            },
            indexSelected() {

            },
            addValue() {
                console.log('added new value')
            },
            selected(val) {
                this.$emit('input', val);
                console.log('selected ' + val);
                this.showDropDown = false;

            }
        }
    }

</script>
<style>

</style>
