<template>
    <div>
        <h1>
            Create campaign
        </h1>
        <sn-alert>This is my fancy alert! :)</sn-alert>

        <sn-text-input v-model="campaign.name"></sn-text-input>
        <div v-for="field in fields">
            <b>{{field.name}}</b>
            <sn-text-input v-model="campaign.campaign_data[field.name]"></sn-text-input>
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
                    campaign_data: {}
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
