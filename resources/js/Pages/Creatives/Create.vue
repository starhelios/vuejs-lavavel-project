<template>
    <div>
        <h1>
            Create Creative for campaign {{campaign.id}}
        </h1>

        <div v-for="field in fields">
            <b>{{field.name}}</b>
            <ag-text-input v-model="creative.data[field.name]"></ag-text-input>
        </div>
        <sn-button @click="submit">Create!</sn-button>
    </div>
</template>

<script>
    import Layout from '../../Layouts/Default';
    export default {
        layout: Layout,
        props: ['campaign', 'fields'],
        data() {
            return {
                creative: {
                    data: {},
                    campaign_id: this.campaign.id
                }
            }
        },
        methods: {
            submit() {

                this.$inertia.post('/creatives', this.creative, {
                    preserveState: false,
                })
            }
        }
    }
</script>
