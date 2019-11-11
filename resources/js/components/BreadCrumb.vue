<template>
    <div class="flex align-items-center flex-row breadcrumbs">
        <button
            class=" bg-brand-500 hover:bg-blue-700 text-white font-bold  rounded-full mr-4"
        >
            <i class="fal fa-arrow-left"></i>
        </button>

        <div class=" flex justify-start flex-col">
            <h2 class="text-brand-500 font-semibold text-2xl ">{{ title }}</h2>
            <div>Link</div>
        </div>
    </div>
</template>
<script>
export default {
    name: "BreadCrumb",
    props: {
        title: {
            type: String,
            required: true
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
