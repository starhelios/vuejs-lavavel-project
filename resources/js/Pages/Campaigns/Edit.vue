a
<template>
    <div>
        <h1>
            Create campaign
        </h1>
        <sn-alert>This is my fancy alert! :)</sn-alert>

        <div v-for="field in fields">
            <b>{{field.name}}</b>
            <ag-text-input v-model="campaign_update.data[field.name]"></ag-text-input>
        </div>
        <sn-button @click="submit">Update</sn-button>

    </div>
</template>

<script>
    import Layout from "../../Layouts/Default.vue"

    export default {
        layout: Layout,
        props: ['fields', 'campaign'],
        data() {
            return {
                campaign_update: this.campaign || {
                    name: "",
                    data: {}
                }
            }
        },
        methods: {
            submit() {
                this.$inertia.put(`/campaigns/${this.campaign.id}`, this.campaign, {
                    preserveState: false,
                })
            }
        }
    }
</script>
