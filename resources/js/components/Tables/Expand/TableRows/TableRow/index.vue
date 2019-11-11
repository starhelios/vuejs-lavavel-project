<template>
    <tr>
        <td v-if="isExpand" class="expand-icon">
            <i
                @click="expanded = !expanded"
                style="cursor:pointer;font-size: 24px"
                class="fal pl-2 pr-2 "
                :class="{
                    'fa-angle-down': expanded,
                    'fa-angle-right': !expanded
                }"
            ></i>
        </td>
        <td v-if="hasSelect" class="select-icon">
            <sn-check-box v-model="selected"></sn-check-box>
        </td>
        <td
            v-for="(column, indx) in columns"
            :key="`cel-${indx}`"
            class="2xl:font-bold"
        >
            {{ row[column.key] }}
        </td>
        <td v-if="hasEdit" class="select-icon">
            <PopUpActions
                :items="actions"
                @onAction="action => $emit('action', { action, row })"
            />
        </td>
    </tr>
</template>
<script>
import PopUpActions from "../../../../PopUpActions";
export default {
    components: {
        PopUpActions
    },
    props: {
        hasSelect: {
            type: Boolean,
            default: true
        },
        hasEdit: {
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
            expanded: false,
            actions: [
                {
                    name: "Edit",
                    icon: "edit"
                },
                {
                    name: "Delete",
                    icon: "trash-alt"
                }
            ]
        };
    }
};
</script>
