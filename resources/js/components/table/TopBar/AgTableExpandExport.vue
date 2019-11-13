<template>
    <span class="flex items-center h-full cursor-pointer">
        <span class="text-base pr-2 uppercase text-gray-600">{{ label }}</span>
        <ag-icon :name="AG_ICON.DOWNLOAD"/>
    </span>
</template>
<script>
    export default {
        name: "ag-table-expand-export",
        props: {
            label: {
                type: String,
                required: true
            }
        }
    };
</script>
