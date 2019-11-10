<template>
    <div class="my-table my-table-expand">
        <TableTabHeader />
        <div>
            <TableHeader :columns="columns" />
            <TableRows :columns="columns" :rows="data" />
        </div>
    </div>
</template>
<script>
import TableTabHeader from "./TableTabHeader";
import TableHeader from "./TableHeader";
import TableRows from "./TableRows";
export default {
    components: {
        TableRows,
        TableHeader,
        TableTabHeader
    },
    props: {
        columns: {
            type: Array,
            default() {
                return [];
            }
        },
        data: {
            type: Array,
            default() {
                return [];
            }
        }
    }
};
</script>
<style lang="scss">
@import "./index";
</style>
