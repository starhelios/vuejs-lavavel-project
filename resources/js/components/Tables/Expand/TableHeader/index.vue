<template>
    <table class="my-table my-table-header">
        <tr :class="classList">
            <td v-if="hasShift" class="expand-icon"></td>
            <td class="expand-icon"></td>
            <td v-if="hasSelect" class="select-icon">
                <sn-check-box v-model="selected" />
            </td>
            <td v-for="column in columns" class="2xl:font-bold">
                {{ column.label }}
            </td>
        </tr>
    </table>
</template>
<script>
import TableExpandMixin from "../table-expand-mixin";
export default {
    mixins: [TableExpandMixin],
    computed: {
        selected: {
            get() {
                return this.$parent.selections.length > 0;
            },
            set() {
                this.$emit("onSelect", "all");
            }
        }
    }
};
</script>
