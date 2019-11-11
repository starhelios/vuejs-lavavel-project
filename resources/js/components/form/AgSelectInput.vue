<template>
    <div class="flex flex-col relative input-search">
        <p class="text-brand-500 font-semibold px-2 pt-1 pb-2 capitalize">
            {{ label }}
            <span class="lowercase" v-if="optional">(optional)</span>
        </p>
        <v-select
            :options="options"
            :value="value"
            :placeholder="placeholder"
        ></v-select>
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
        name: "ag-select-input",
        props: {
            label: String,
            options: {
                type: Array,
                default() {
                    return [];
                }
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
            withLeftSlot: Boolean
        }
    };
</script>
<style lang="scss">
    .input-search {
        .vs--searchable {
            .vs__dropdown-toggle {
                border-width: 2px;
                border-color: #dedede;
                .vs__search {
                    padding: 4px;
                }
            }
        }
    }
</style>
