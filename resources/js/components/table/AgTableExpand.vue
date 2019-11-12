<template>
    <div class="my-table my-table-expand">
        <ag-table-expand-top-bar v-if="hasTabsHeader" />
        <div :class="{ 'pb-3': hasPagination }" class="pt-4">
            <ag-table-expand-header
                @onSelect="onSelect"
                :columns="columns"
                :classList="classList"
                :hasExpand="hasExpand"
                :hasShift="hasShift"
                v-if="hasHeader"
            />
            <ag-table-expand-rows
                @onSelect="onSelect"
                :columns="columns"
                :hasExpand="hasExpand"
                :classList="classList"
                :hasShift="hasShift"
                :data="data"
            />
        </div>
        <ag-table-expand-pagination v-if="hasPagination" />
    </div>
</template>
<script>
import TableExpandMixin from "./table-expand-mixin";
export default {
    mixins: [TableExpandMixin],
    name: "AgTableExpand",
    props: {
        data: {
            type: Array,
            default() {
                return [];
            }
        }
    },
    methods: {
        onSelect(id) {
            if (id === "all") {
                if (this.selections.length) {
                    this.selections = [];
                } else {
                    this.selections = this.data.map(el => el.id);
                }
            } else {
                const indexOf = this.selections.indexOf(id);
                if (indexOf > -1) {
                    this.selections.splice(indexOf, 1);
                } else {
                    this.selections.push(id);
                }
            }
        }
    },
    data() {
        return {
            selections: []
        };
    }
};
</script>
<style lang="scss">
@import "./index";
</style>
