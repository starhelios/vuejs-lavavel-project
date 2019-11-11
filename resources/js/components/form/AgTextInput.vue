<template>
    <div class="flex flex-col relative">
        <p class="text-brand-500 font-semibold px-2 pt-1 pb-2 capitalize">{{label}} <span class="lowercase" v-if="optional">(optional)</span></p>
        <input type="text"
               ref="textInput"
               :name="name"
               class="w-full rounded placeholder-band-600 text-brand-500 border-2 p-2 pr-8 focus:shadow-outline outline-color " :class="[error? 'border-red-500': 'border-gray-300' , withLeftSlot ? 'pl-10' : 'pl-2']"
               :placeholder="placeholder"
               :value="value"
               v-on:input="$emit('input', $event.target.value)"
               @blur="$emit('blur')"
               @change="$emit('change')"
               @keyup="$emit('keyup')"
               @focus="$emit('focus')"
               @click="$emit('click')"
               :autocomplete="!autocomplete ? 'off' : 'on'"
        >
        <div class="absolute left-0 mt-12 ml-2 top-0 " v-if="withLeftSlot">
            <slot name="left-icon"></slot>
        </div>
        <div class="absolute right-0 mt-12 mr-2 top-0 " >
            <slot name="right-icon"></slot>
        </div>
        <p v-if="error" class="text-xs text-red-500 px-2 pt-px ">Error, please try again</p>
    </div>
</template>
<script>
    export default {
        name: 'ag-text-input',
        props: {
            label : String,
            placeholder: String,
            name: name,
            optional:{
                type: Boolean,
                default : false
            },
            value : String,
            error:{
                type: Boolean,
                default : false
            },
            withLeftSlot: Boolean,
            autocomplete: {
                type: Boolean,
                default: false
            }

        }

    }
</script>
