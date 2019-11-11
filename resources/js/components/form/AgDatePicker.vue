<template>
    <div class="flex flex-col relative sn-date-picker">
        <p class="text-brand-500 font-semibold px-2 pt-1 pb-2 capitalize">
            {{ label }}
            <span class="lowercase" v-if="optional">(optional)</span>
        </p>
        <datepicker
            :format="customFormatter"
            :value="value"
            :placeholder="'DD/MM/YYYY'"
        ></datepicker>
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
    import moment from "moment";
    import Datepicker from "vuejs-datepicker";
    export default {
        components: {
            Datepicker
        },
        name: "an-date-picker",
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
        },
        methods: {
            customFormatter(date) {
                return moment(date).format("DD/MM/YYYY");
            }
        }
    };
</script>
<style lang="scss">
    .sn-date-picker {
        .vdp-datepicker {
            border: 2px solid #dedede;
            border-radius: 4px;
            white-space: normal;
            input {
                width: 100%;
                padding: 8px;
            }
        }
    }
</style>
