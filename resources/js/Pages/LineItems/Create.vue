<template>
    <div>
        <h1>
            Create Creative for campaign {{campaign.id}}
        </h1>

        <div v-for="field in fields">
            <b>{{field.name}}</b>
            <ag-text-input v-model="line_item.data[field.name]" :label="field.name"></ag-text-input>
        </div>
        <sn-button @click="submit">Create!</sn-button>
    </div>
</template>

<script>
    export default {
        props: ['campaign', 'fields'],
        data() {
            return {
                line_item: {
                    data: {},
                    campaign_id: this.campaign.id
                }
            }
        },
        methods: {
            submit() {

                this.$inertia.post('/line_items', this.line_item, {
                    preserveState: false,
                })
            }
        }
    }
</script>
