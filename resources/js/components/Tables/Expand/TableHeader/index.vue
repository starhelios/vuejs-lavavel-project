<template>
    <table class="my-table">
        <tr>
            <td v-if="isExpand" class="expand-icon"></td>
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
export default {
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
        }
    },
    data() {
        return {
            selected: false
        };
    }
};
</script>
