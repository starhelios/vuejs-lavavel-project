<template>
    <div class="flex flex-col relative sn-check-box align-items-center">
        <label
            class="flex flex-col align-items-center"
            :class="{ checked: val }"
        >
            <input
                type="checkbox"
                ref="domInput"
                v-model="val"
                :name="name"
                class="w-full rounded placeholder-band-600 text-brand-500 border-2 p-2 pr-8 focus:shadow-outline outline-color "
                :class="[
                    error ? 'border-red-500' : 'border-gray-300',
                    withLeftSlot ? 'pl-10' : 'pl-2'
                ]"
                v-on:change="onChange"
            />

            <span class="checkmark"></span>
            <span>{{ label }}</span>
        </label>

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
    name: "sn-check-box",
    props: {
        label: String,
        name: name,
        optional: {
            type: Boolean,
            default: false
        },

        value: {},
        error: {
            type: Boolean,
            default: false
        },
        withLeftSlot: Boolean
    },
    methods: {
        onChange($event) {
            this.$emit("change", $event.target.checked);
        }
    },
    computed: {
        val: {
            get() {
                return this.value;
            },
            set(value) {
                this.$emit("input", value);
            }
        }
    }
};
</script>
<style lang="scss" scoped>
@import "../../../sass/variables";

label {
    position: relative;
    width: 100%;
    height: 100%;
    margin: 0;
    cursor: pointer;
}

/* The sn-check-box */
.sn-check-box {
    cursor: pointer;
    position: relative;
    height: 25px;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.sn-check-box input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 100%;
    width: 100%;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 22px;
    width: 22px;
    border: 2px solid $indigo;
    border-radius: 3px;
}

/* On mouse-over, add a grey background color */
.sn-check-box:hover input ~ .checkmark {
    /*background-color: #ccc;*/
}

/* When the checkbox is checked, add a blue background */
.sn-check-box input:checked ~ .checkmark {
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.sn-check-box input:checked ~ .checkmark:after {
    display: block;
}

.sn-check-box {
    .checked {
        .checkmark {
            &:before {
                content: "";
                position: absolute;
                left: 6px;
                top: -4px;
                width: 14px;
                height: 18px;
                border: solid white;
                border-width: 0 9px 3px 0;
                -webkit-transform: rotate(45deg);
                transform: rotate(45deg);
            }
            &:after {
                left: 6px;
                top: -4px;
                width: 11px;
                height: 18px;
                border: solid $indigo;
                border-width: 0 3px 3px 0;
                -webkit-transform: rotate(45deg);
                transform: rotate(45deg);
            }
        }
    }
}
</style>
