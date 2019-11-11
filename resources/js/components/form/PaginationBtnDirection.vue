<template>
    <ag-button type="white" @click="$emit('click')">
        <img slot="icon" alt="" src="/assets/icons/arrow-left.svg" v-if="direction === 'left'">
        <img slot="icon" alt="" src="/assets/icons/arrow-right.svg" v-if="direction === 'right'">
    </ag-button>

</template>
<script>
    export default {
        name: 'pagination-btn-direction',
        props: {
            direction: String
        }
    }

</script>
