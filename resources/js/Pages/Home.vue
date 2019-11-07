<template>
    <div class="w-full p-8">
        <h1>Home</h1>
        <h5>Test: {{test}}</h5>
        <br>
        <ag-button title="submit" type="full" :disabled="true">
        </ag-button>
        <br>
        <ag-button  type="full" >

        </ag-button>
    </div>
</template>

<script>
    export default {
        props: ['test']
    }
</script>
