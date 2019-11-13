<template>
    <div class="relative h-full flex items-center" ref="dropdownMenu">
        <div
            class="flex items-center   cursor-pointer h-full"
            @click="show = !show"
        >
            <span class="  mr-2 text-gray-600 uppercase">{{ label }}</span>
            <ag-icon :name="AG_ICON.ARROW_DOWN"/>
        </div>
        <div
            class="absolute shadow-md right-0   w-56"
            style="top:48px"
            :class="{ block: show, hidden: !show }"
        >
            <div
                v-for="item in tabs"
                class="p-8 pb-4 pt-4 cursor-pointer bg-white hover:bg-gray-200 flex items-center"
            >
                <ag-check-box
                    v-model="item.selected"
                    @change="e => onChange(item, e)"
                    :label="item.label"
                />
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "ag-table-expand-filter",
        props: {
            label: {
                type: String,
                required: true
            },
            tabs: {
                type: Array,
                default() {
                    return [];
                }
            }
        },
        data() {
            return {
                selected: false,
                show: false
            };
        },
        methods: {
            documentClick(e) {
                let el = this.$refs.dropdownMenu;
                let target = e.target;
                if (el !== target && !el.contains(target)) {
                    this.show = false;
                }
            },
            onChange(item, e) {
                item.selected = e;
                this.$forceUpdate();
            }
        },
        created() {
            document.addEventListener("click", this.documentClick);
        },
        destroyed() {
            document.removeEventListener("click", this.documentClick);
        }
    };
</script>
