<template>
    <main>
        <ag-header />
        <article
            class="container-fluid pt-4"
            style="max-height: calc(100vh - 200px);overflow: auto   "
        >
            <slot />
        </article>
        <ag-footer />
    </main>
</template>

<script>
import Inertia from "@inertiajs/inertia-vue/src/app";

export default {
    components: { Inertia },
    props: {
        title: String
    },
    watch: {
        title: {
            immediate: true,
            handler(title) {
                document.title = title;
            }
        }
    }
};
</script>
