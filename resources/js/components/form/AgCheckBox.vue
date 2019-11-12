<template>
    <div class="flex  relative ag-check-box  justify-center items-center">
        <span
            class="flex justify-center items-center"
            :class="{ checked: val }"
        >
            <input
                type="checkbox"
                ref="domInput"
                v-model="val"
                :name="name"
                :id="_uid"
                class="w-full rounded placeholder-band-600 text-brand-500 border-2 p-2 pr-8 focus:shadow-outline outline-color "
            />

            <ag-icon :name="icon" :key="val" :id="_uid" />
            <label :for="_uid" class="text-base pl-2" v-if="label">{{
                label
            }}</label>
        </span>
    </div>
</template>
<script>
export default {
    name: "ag-check-box",
    props: {
        label: String,
        name: name,

        value: {}
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
                this.$emit("change", value);
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

.ag-check-box {
    cursor: pointer;
    position: relative;
    height: 25px;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.ag-check-box input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 100%;
    width: 100%;
}
</style>
