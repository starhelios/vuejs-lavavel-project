<template>
    <fragment>
        <tr :class="classList">
            <td v-if="hasShift" class="expand-icon"></td>
            <td class="expand-icon">
                <i
                    v-if="hasExpand"
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
            <td v-for="(column, indx) in columns" :key="`cel-${indx}`">
                {{ row[column.key] }}
            </td>
            <td v-if="hasEdit" class="select-icon">
                <PopUpActions
                    :items="actions"
                    @onAction="action => $emit('action', { action, row })"
                />
            </td>
        </tr>
        <tr v-if="expanded && row.children && row.children.length">
            <td :colspan="colspan">
                <div class="flex align-items-center">
                    <div class="col-md-3 p-0">
                        <TableExpand
                            :hasTabsHeader="false"
                            :hasExpand="false"
                            :hasShift="true"
                            :columns="[
                                { label: 'Insertion Order', key: 'name' }
                            ]"
                            :data="row.children"
                        />
                    </div>
                    <div class="col-md-6 p-0">
                        <TableExpand
                            :hasTabsHeader="false"
                            :hasExpand="false"
                            :hasShift="true"
                            :columns="[{ label: 'Line Item', key: 'name' }]"
                            :data="row.children"
                        />
                    </div>
                    <div class="col-md-3 p-0">
                        <TableExpand
                            :hasTabsHeader="false"
                            :hasExpand="false"
                            :hasShift="true"
                            :columns="[{ label: 'Creative', key: 'name' }]"
                            :data="row.children"
                        />
                    </div>
                </div>
            </td>
        </tr>
    </fragment>
</template>
<script>
import PopUpActions from "../../../../PopUpActions";
import TableExpandMixin from "../../../Expand/table-expand-mixin";
export default {
    mixins: [TableExpandMixin],
    components: {
        PopUpActions
    },
    props: {
        row: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
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
    },
    computed: {
        colspan() {
            let res = 0;
            if (this.hasExpand) res++;
            if (this.hasSelect) res++;
            if (this.hasEdit) res++;
            res += this.columns.length;
            return res;
        },
        selected: {
            get() {
                return this.$parent.$parent.selections.some(
                    id => id === this.row.id
                );
            },
            set() {
                this.$emit("onSelect", this.row.id);
            }
        }
    }
};
</script>
