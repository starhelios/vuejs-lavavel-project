<template>
    <div class="flex align-items-center justify-content-center">
        <inertia-link :href="'/'">
            <button class="  link-item font-bold  rounded-full mr-4">
                <i class="fal fa-chevron-left"></i>
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
                <i class="fal fa-chevron-right"></i>
            </button>
        </inertia-link>
    </div>
</template>
<script>
export default {
    props: {
        current: {
            type: Number,
            default: 1
        }
    }
};
</script>
<style lang="scss" scoped>
@import "../../../../../sass/variables";
.link-item {
    width: 34px;
    height: 34px;
    text-align: center;
    border: 1px solid $indigo;
}
</style>
