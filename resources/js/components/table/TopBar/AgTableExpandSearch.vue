<template>
    <div class="flex  items-center relative">
        <ag-icon :name="AG_ICON.SEARCH"/>
        <input
            type="text"
            ref="textInput"
            :name="name"
            class="w-full bg-gray-200 placeholder-band-600 text-brand-500  p-2 pr-8   "
            :class="[
                error ? 'border-red-500' : 'border-gray-300',
                withLeftSlot ? 'pl-10' : 'pl-2'
            ]"
            :placeholder="placeholder"
            :value="value"
            v-on:input="$emit('input', $event.target.value)"
            @blur="$emit('blur')"
            @change="$emit('change')"
            @keyup="$emit('keyup')"
            @focus="$emit('focus')"
            @click="$emit('click')"
            :autocomplete="!autocomplete ? 'off' : 'on'"
        />
        <div class="absolute left-0 mt-12 ml-2 top-0 " v-if="withLeftSlot">
            <slot name="left-icon"></slot>
        </div>
        <div class="absolute right-0 mt-12 mr-2 top-0 ">
            <slot name="right-icon"></slot>
        </div>
        <p v-if="error" class="text-xs text-red-500 px-2 pt-px ">
            Error, please try again
        </p>
    </div>
</template>
<script>
    export default {
        name: "ag-table-expand-search",
        props: {
            label: String,
            placeholder: {
                type: String,
                default: "Search..."
            },
            name: name,
            optional: {
                type: Boolean,
                default: false
            },
            value: String,
            error: {
                type: Boolean,
                default: false
            },
            withLeftSlot: Boolean,
            autocomplete: {
                type: Boolean,
                default: false
            }
        }
    };
</script>
