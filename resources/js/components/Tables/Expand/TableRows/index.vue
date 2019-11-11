<template>
    <table class="my-table my-table-body">
        <TableRow
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
import TableRow from "./TableRow";
import TableExpandMixin from "../table-expand-mixin";
export default {
    mixins: [TableExpandMixin],
    components: {
        TableRow
    },
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
