<template>
    <main>
        <ag-header/>
        <div v-if="$page.flash">
            <ag-toast :body="$page.flash.body" :title="$page.flash.title" :type="$page.flash.type" />
        </div>
        <div>
            <slot/>
        </div>
        <ag-footer/>
    </main>
</template>

<script>
    import Inertia from "@inertiajs/inertia-vue/src/app";
    import AgFooter from "../components/Layout/AgFooter";

    export default {
        components: {AgFooter, Inertia},
        props: {
            title: String,
        },
        watch: {
            title: {
                immediate: true,
                handler(title) {
                    document.title = title
                },
            },
        },
    }
</script>