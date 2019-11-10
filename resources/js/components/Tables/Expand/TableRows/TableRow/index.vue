<template>
    <tr>
        <td v-if="isExpand" class="expand-icon">
            <i
                @click="expanded = !expanded"
                style="cursor:pointer"
                class="fal p-2 "
                :class="{
                    'fa-angle-down': expanded,
                    'fa-angle-right': !expanded
                }"
            ></i>
        </td>
        <td v-if="hasSelect" class="select-icon">
            <input type="checkbox" v-model="selected" />
        </td>
        <td
            v-for="(column, indx) in columns"
            :key="`cel-${indx}`"
            class="2xl:font-bold"
        >
            {{ row[column.key] }}
        </td>
    </tr>
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
        },
        row: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            selected: false,
            expanded: false
        };
    }
};
</script>
