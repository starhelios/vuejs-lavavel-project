<template>
    <div class="flex flex-col relative sn-check-box align-items-center">
        <label
            class="flex justify-center items-center"
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

            <ag-icon :name="icon" :key="val" />
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
    name: "ag-check-box",
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
        icon() {
            return this.val ? this.AG_ICON.CHECKED : this.AG_ICON.UN_CHECKED;
        },
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
</style>
