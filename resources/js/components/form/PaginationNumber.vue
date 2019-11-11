<template>
    <ag-button :type="active ? 'full' : 'white'" @click="$emit('click')">
        <span slot="icon" v-if="number">{{number}}</span>
    </ag-button>

</template>
<script>
    export default {
        name: 'pagination-number',
        props: {
            number: Number,
            active: Boolean
        }
    }

</script>
