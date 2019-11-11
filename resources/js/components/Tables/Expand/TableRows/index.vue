<template>
    <table class="my-table my-table-body">
        <TableRow
            v-for="(row, index) in rows"
            :key="`row-${index}`"
            :row="row"
            :columns="columns"
            :hasSelect="hasSelect"
            :isExpand="isExpand"
        />
    </table>
</template>
<script>
import TableRow from "./TableRow";
export default {
    components: {
        TableRow
    },
    props: {
        hasSelect: {
            type: Boolean,
            default: true
        },
        isExpand: {
            type: Boolean,
            default: true
        },
        columns: {
            type: Array,
            default() {
                return [];
            }
        },
        rows: {
            type: Array,
            default() {
                return [];
            }
        }
    }
};
</script>
