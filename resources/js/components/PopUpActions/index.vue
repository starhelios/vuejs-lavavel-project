<template>
    <div class="main-pop-up" ref="dropdownMenu">
        <span>
            <i
                @click="show = !show"
                style="cursor:pointer;font-size: 24px"
                class="fal pl-2 pr-2 fa-ellipsis-h"
            ></i>
        </span>
        <div class="main-pop-up_dropdown" :class="{ active: show }">
            <div
                v-for="item in items"
                class="main-pop-up_dropdown_item flex align-items-center pr-4 pl-4 pb-3 pt-3"
                @click="() => onClick(item)"
            >
                <i
                    :class="[`fa-${item.icon}`]"
                    class="fal "
                    v-if="item.icon"
                ></i>
                <span class="ml-2 ">{{ item.name }}</span>
            </div>
        </div>
    </div>
</template>
<script>
export default {
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
        border-radius: 5px;

        &.active {
            display: block;
        }
        .main-pop-up_dropdown_item {
            cursor: pointer;
            min-width: 150px;
            * {
                font-weight: 700;
            }
            &:first-child {
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
            }
            &:last-child {
                border-bottom-left-radius: 5px;
                border-bottom-right-radius: 5px;
            }

            &:hover {
                background: #d9d9d9;
            }
        }
    }
}
</style>
