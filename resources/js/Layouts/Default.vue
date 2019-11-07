<template>
    <main>
        <header class="p-3 border-2 w-full flex flex-row justify-around">
            <inertia-link href="/">Home</inertia-link>
            <inertia-link href="/about">About</inertia-link>
            <inertia-link href="/contact">Contact</inertia-link>
        </header>
        <article>
            <slot />
        </article>
    </main>
</template>

<script>
    export default {
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