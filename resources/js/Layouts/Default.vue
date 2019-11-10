<template>
    <main>
        <ag-header/>
        <article class="container-fluid mt-4">
            <slot/>
        </article>
        <ag-footer/>
    </main>
</template>

<script>
    import Inertia from "@inertiajs/inertia-vue/src/app";

    export default {
        components: {Inertia},
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
