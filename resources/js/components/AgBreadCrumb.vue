<template>
    <div class="flex items-center	 flex-row breadcrumbs">
        <inertia-link :href="backLink" class="flex items-center	 mr-4">
            <button
                v-if="backLink"
                class=" bg-brand-500 hover:bg-blue-700 text-white font-bold  rounded-full "
            >
                <ag-icon :name="AG_ICON.ARROW_LEFT" />
            </button>
        </inertia-link>

        <div class=" flex justify-start flex-col">
            <h2 class="text-brand-500 font-semibold text-2xl ">{{ title }}</h2>
            <div class="flex items-center	">
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
    name: "ag-bread-crumb",
    props: {
        title: {
            type: String,
            required: true
        },
        backLink: {
            type: String
        },
        links: {
            type: Object,
            default() {
                return {};
            }
        }
    },
    computed: {
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
