<template>
    <div class="flex justify-center	">
        <inertia-link :href="'/'">
            <button
                class="w-auto  w-max-220 rounded-full flex justify-center items-center text-center font-bold  rounded-full mr-4  border-2 border-brand-500 w-min-30"
            >
                <ag-icon :name="AG_ICON.ARROW_LEFT" />
            </button>
        </inertia-link>
        <inertia-link
            :href="'/'"
            v-for="index in [current]"
            :key="`page-${index}`"
        >
            <button
                :class="{
                    'bg-brand-500 hover:bg-blue-700 text-white':
                        index === current
                }"
                class="w-auto  w-max-220 rounded-full flex justify-center items-center text-center font-bold  rounded-full mr-4  border-2 border-brand-500 w-min-30"
            >
                {{ index }}
            </button>
        </inertia-link>

        <inertia-link :href="'/'">
            <button
                class="w-auto  w-max-220 rounded-full flex justify-center items-center text-center font-bold  rounded-full mr-4  border-2 border-brand-500 w-min-30"
            >
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
