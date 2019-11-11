<template>
    <div class="my-table my-table-expand">
        <TableTabHeader v-if="hasTabsHeader" />
        <div>
            <TableHeader
                @onSelect="onSelect"
                :columns="columns"
                :classList="classList"
                :hasExpand="hasExpand"
                :hasShift="hasShift"
                v-if="hasHeader"
            />
            <TableRows
                @onSelect="onSelect"
                :columns="columns"
                :hasExpand="hasExpand"
                :classList="classList"
                :hasShift="hasShift"
                :data="data"
            />
        </div>
    </div>
</template>
<script>
import TableTabHeader from "./TableTabHeader";
import TableHeader from "./TableHeader";
import TableRows from "./TableRows";
import TableExpandMixin from "./table-expand-mixin";
export default {
    mixins: [TableExpandMixin],
    name: "TableExpand",
    components: {
        TableRows,
        TableHeader,
        TableTabHeader
    },
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
