<template>
    <div
        class="bg-gray-200 rounded-24 w-full h-12 pl-4 pr-4 flex flex-wrap items-center justify-between"
    >
        <span class=" flex items-center h-full">
            <ag-table-expand-search/>
            <ag-table-expand-filter
                class="pl-8 pr-8  border-l-2 border-gray-300"
                label="Filter"
                :tabs="[
                    { label: 'Insertion Order' },
                    { label: 'Line Item', selected: true }
                ]"
            />
            <ag-table-expand-filter
                class="pl-8 pr-8  border-l-2 border-r-2 border-gray-300"
                label="Blocks"
                :tabs="[
                    { label: 'Insertion Order' },
                    { label: 'Line Item', selected: true }
                ]"
            />
        </span>
        <span class=" flex items-center h-full">
            <ag-table-expand-export
                :label="'export xls'"
                class="pl-8 pr-8   border-l-2 border-gray-300"
            />
            <ag-table-expand-export
                :label="'export csv'"
                class="pl-8 pr-8   border-l-2 border-gray-300"
            />
            <ag-icon
                :name="AG_ICON.DELETE"
                @click="$emit('removeSelected')"
                class="cursor-pointer pl-6 pr-4 h-full flex items-center   border-l-2 border-gray-300"
                :class="{ disabled: $parent.selections.length === 0 }"
            />
        </span>
    </div>
</template>
<script>
    export default {
        name: "ag-table-expand-top-bar"
    };
</script>
