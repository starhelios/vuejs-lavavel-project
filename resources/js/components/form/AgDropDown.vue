<template>
    <div class="w-full absolute  border-2 bg-white border-gray-300  top-0 right-0 left-0  z-10   mt-10 rounded-b "  :class="toggleclass" >
        <div class="w-full z-20 py-2 rounded" >
            <div class="w-full overflow-y-scroll  px-1"  >
                <ul class="list-reset">
                    <li value="" class="cursor-pointer text-brand-500 p-1 rounded " :class="selectedIndex === index ? 'bg-grey-200' : ''" v-for="(item, index) in options" @mousedown="$emit('selected', item.name)" :id="'item_'+index">{{item.name}}</li>
                </ul>
            </div>
            <div class="w-full py-1 px-2" :class="toggleclass" v-if="taggable">
                <div class="font-bold  text-sm px-3 pt-2 cursor-pointer" v-show="!showInput"
                     @click="showInput = true">
                    Add Value +
                </div>
                <input type="text" name="newVal"
                       :class="toggleclass"
                       class="w-full rounded placeholder-band-600 text-brand-500 border-2 p-2 pr-8 focus:shadow-outline outline-color  "
                       placeholder="New Value"
                       ref="valueinput" @keyup.enter="store" v-model="localValueAccessor"
                       v-show="showInput">
            </div>

        </div>
    </div>
</template>
<script>
    export default {
        name: 'ag-drop-down',
        props: {
            options: Array,
            taggable: Boolean,
            localValue: String,
            toggleclass: Boolean,
            selectedIndex: Number

        },
        data(){
            return {
                localValueAccessor: this.localValue,
                showInput: false,
            }
        },
        methods: {
            store() {
                this.$emit('saveNewValue', this.localValueAccessor);
                this.localValueAccessor = "";
            }
        }
    }
</script>
