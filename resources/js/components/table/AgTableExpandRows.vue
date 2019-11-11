<template>
    <table class="my-table my-table-body">
        <ag-table-expand-row
            v-for="(row, index) in data"
            :key="`row-${index}`"
            :row="row"
            :classList="classList"
            :columns="columns"
            :hasSelect="hasSelect"
            :hasShift="hasShift"
            @onSelect="e => $emit('onSelect', e)"
            :hasExpand="hasExpand"
        />
    </table>
</template>
<script>
import TableExpandMixin from "./table-expand-mixin";
export default {
    name:'ag-table-expand-rows',
    mixins: [TableExpandMixin],
    props: {
        data: {
            type: Array,
            default() {
                return [];
            }
        }
    }
};
</script>
