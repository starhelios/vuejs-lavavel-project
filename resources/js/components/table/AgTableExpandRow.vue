<template>
    <fragment>
        <tr :class="classList">
            <td v-if="hasShift" class="expand-icon"></td>
            <td class="expand-icon">
                <span
                    v-if="hasExpand"
                    @click="expanded = !expanded"
                    class="expand-icon-item"
                    :class="{ active: expanded }"
                >
                    <ag-icon :name="AG_ICON.ARROW_RIGHT"/>
                </span>
            </td>
            <td v-if="hasSelect" class="select-icon">
                <ag-check-box v-model="selected"></ag-check-box>
            </td>
            <td v-for="(column, indx) in columns" :key="`cel-${indx}`">
                {{ row[column.key] }}
            </td>
            <td v-if="hasEdit" class="select-icon">
                <ag-pop-up-actions
                    :items="actions"
                    @onAction="action => $emit('action', { action, row })"
                />
            </td>
        </tr>
        <tr v-if="expanded && row.children && row.children.length">
            <td :colspan="colspan">
                <div class="flex align-items-center">
                    <div class="w-1/5  p-0">
                        <ag-table-expand
                            :hasPagination="false"
                            :hasTabsHeader="false"
                            :hasExpand="false"
                            :hasShift="true"
                            :columns="[
                                { label: 'Insertion Order', key: 'name' }
                            ]"
                            :data="row.children"
                        />
                    </div>
                    <div class="w-3/5  p-0">
                        <ag-table-expand
                            :hasPagination="false"
                            :hasTabsHeader="false"
                            :hasExpand="false"
                            :hasShift="true"
                            :columns="[{ label: 'Line Item', key: 'name' }]"
                            :data="row.children"
                        />
                    </div>
                    <div class="w-1/5 p-0">
                        <ag-table-expand
                            :hasPagination="false"
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
    import TableExpandMixin from "./table-expand-mixin";

    export default {
        name: "ag-table-expand-row",
        mixins: [TableExpandMixin],
        props: {
            row: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                expanded: false
            };
        },
        computed: {
            actions() {
                return [
                    {
                        name: "Edit",
                        icon: this.AG_ICON.EDIT
                    },
                    {
                        name: "Delete",
                        icon: this.AG_ICON.DELETE
                    }
                ];
            },
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
