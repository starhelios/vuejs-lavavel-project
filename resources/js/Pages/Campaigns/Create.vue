<template>
    <div>
        <h1>
            Create campaign
        </h1>
        <sn-alert>This is my fancy alert! :)</sn-alert>

        <ag-text-input v-model="campaign.name"></ag-text-input>
        <div v-for="field in fields">
            <b>{{field.name}}</b>
            <ag-text-input v-model="campaign.data[field.name]"></ag-text-input>
        </div>
        <sn-button @click="submit">Create!</sn-button>

    </div>
</template>

<script>
    import Layout from "../../Layouts/Default.vue"

    export default {
        layout: Layout,
        props: ['fields'],
        data() {
            return {
                campaign: {
                    name: "",
                    data: {}
                }
            }
        },
        methods: {
            submit() {
                this.$inertia.post('/campaigns', this.campaign, {
                    preserveState: false,
                })
            }
        }
    }
</script>
