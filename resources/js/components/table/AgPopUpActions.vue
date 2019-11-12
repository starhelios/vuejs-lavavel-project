<template>
    <div class="main-pop-up" ref="dropdownMenu">
        <ag-icon :name="AG_ICON.MORE" @click="show = !show" />
        <div class="main-pop-up_dropdown" :class="{ active: show }">
            <div
                v-for="item in items"
                class="main-pop-up_dropdown_item flex align-items-center pr-8 pl-8 pb-6 pt-6"
                @click="() => onClick(item)"
            >
                <ag-icon :name="item.icon" v-if="item.icon" />
                <span class="ml-2 text-base ">{{ item.name }}</span>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "ag-pop-up-actions",
    props: {
        items: {
            type: Array,
            default() {
                return [];
            }
        }
    },
    data() {
        return {
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
        onClick(action) {
            this.show = false;
            this.$emit(`onAction`, action);
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
<style lang="scss" scoped>
.main-pop-up {
    @import "../../../sass/variables";
    position: relative;

    .main-pop-up_dropdown {
        right: 0;
        z-index: 1;
        position: absolute;
        background: white;
        box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.25);
        display: none;
        border-radius: $border-radius;

        &.active {
            display: block;
        }
        .main-pop-up_dropdown_item {
            cursor: pointer;
            min-width: 200px;
            * {

            }
            &:first-child {
                border-top-left-radius: $border-radius;
                border-top-right-radius: $border-radius;
            }
            &:last-child {
                border-bottom-left-radius: $border-radius;
                border-bottom-right-radius: $border-radius;
            }

            &:hover {
                background: #d9d9d9;
            }
        }
    }
}
</style>
