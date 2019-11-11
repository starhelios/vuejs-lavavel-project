<template>
    <div class="flex justify-center	">
        <inertia-link :href="'/'">
            <button class="  link-item font-bold  rounded-full mr-4">
                <ag-icon :name="AG_ICON.ARROW_LEFT" />
            </button>
        </inertia-link>
        <inertia-link
            :href="'/'"
            v-for="index in [current, current + 1]"
            :key="`page-${index}`"
        >
            <button
                :class="{
                    'bg-brand-500 hover:bg-blue-700 text-white':
                        index === current
                }"
                class="link-item rounded-full font-bold  rounded-full mr-4"
            >
                {{ index }}
            </button>
        </inertia-link>

        <inertia-link :href="'/'">
            <button class="rounded-full link-item font-bold  rounded-full mr-4">
                <ag-icon :name="AG_ICON.ARROW_RIGHT" />
            </button>
        </inertia-link>
    </div>
</template>
<script>
export default {
    name: "ag-table-expand-pagination",
    props: {
        current: {
            type: Number,
            default: 1
        }
    }
};
</script>
<style lang="scss" scoped>
@import "../../../sass/variables";
.link-item {
    width: 34px;
    height: 34px;
    text-align: center;
    border: 1px solid $indigo;
}
</style>
