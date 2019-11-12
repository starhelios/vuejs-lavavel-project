<template>
    <span
        @click="$emit('click')"
        v-bind="$attrs"
        v-if="!templateSvg"
        class="icon__wrapper cursor-pointer block"
        :style="iconSize"
        :class="{ icon__circle: circle, icon__size: iconSize }"
        v-html="icon"
    ></span>
    <span
        v-bind="$attrs"
        @click="$emit('click')"
        ref="templateSvgRef"
        v-else
        v-html="icon"
    ></span>
</template>

<script>
/**
 * App icon  Button
 * @vue-prop {String} size - size
 * @vue-prop {String} name - name
 * @vue-prop {Boolean} circle - circle
 * @vue-prop {Boolean} sprite - sprite
 *
 */

function unwrapDOMel(wrapper) {
    const docFrag = document.createDocumentFragment();
    [...wrapper.attributes].map(({ name, value }) => {
        wrapper.firstChild &&
            wrapper.firstChild.attributes &&
            wrapper.firstChild.setAttribute(name, value);
    });
    const child = wrapper.removeChild(wrapper.firstChild);
    docFrag.appendChild(child);
    wrapper.parentNode.replaceChild(docFrag, wrapper);
}

export default {
    name: "ag-icon",
    props: {
        templateSvg: {
            type: Boolean,
            default: false
        },
        size: {
            type: String,
            default: ""
        },
        name: {
            default: ""
        },
        circle: {
            default: true,
            type: Boolean
        },
        sprite: {
            default: false,
            type: Boolean
        }
    },
    data() {
        return {
            icon: ""
        };
    },
    mounted() {
        this.onInitIcon();
    },
    computed: {
        iconSize() {
            if (this.size) {
                return `height:${this.size}px; width:${this.size}px;`;
            }
        }
    },
    methods: {
        async onInitIcon() {
            try {
                await this.onGetIcon();
                const templateSvgRef = this.$refs.templateSvgRef;
                templateSvgRef &&
                    this.icon &&
                    this.$nextTick(() => unwrapDOMel(templateSvgRef));
            } catch (e) {
                console.error(e);
            }
        },
        async onGetIcon() {
            try {
                this.icon = await fetch(`/assets/icons/${this.name}`);
                this.icon = await this.icon.text();
                return this.icon;
            } catch (e) {
                console.error(e);
            }
        }
    }
};
</script>

<style lang="scss">
.icon__wrapper {
    &.icon__size {
        svg {
            width: 100%;
            height: 100%;
        }
    }
    svg {
        margin: auto;
    }
}
</style>
