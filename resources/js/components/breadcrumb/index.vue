<template>
    <div class="flex align-items-center flex-row breadcrumbs">
        <inertia-link :href="backLink">
            <button
                v-if="back"
                class=" bg-brand-500 hover:bg-blue-700 text-white font-bold  rounded-full mr-4"
            >
                <i class="fal fa-arrow-left"></i>
            </button>
        </inertia-link>

        <div class=" flex justify-start flex-col">
            <h2 class="text-brand-500 font-semibold text-2xl ">{{ title }}</h2>
            <div class="flex align-items-center">
                <span v-for="(link, index) in linksV">
                    <span v-if="link.value === true">{{ link.name }}</span>
                    <inertia-link v-else :href="link.value">{{
                        link.name
                    }}</inertia-link>
                    <span v-if="index < linksV.length - 1" class="mr-1">/</span>
                </span>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        title: {
            type: String,
            required: true
        },
        links: {
            type: Object,
            default() {
                return {};
            }
        },
        back: {
            type: String | Boolean,
            default: true
        }
    },
    computed: {
        backLink() {
            const els = location.pathname.split("/");
            return els.filter((i, index) => index < els.length - 2).join("/");
        },
        linksV() {
            return Object.keys(this.links).map(key => ({
                name: key,
                value: this.links[key]
            }));
        }
    }
};
</script>
<style lang="scss" scoped>
.breadcrumbs {
    button {
        width: 44px;
        height: 44px;
        border-radius: 50%;
    }
}
</style>
