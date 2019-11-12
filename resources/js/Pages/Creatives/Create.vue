<template>
    <div>
        <h1>
            Create Creative for campaign {{campaign.id}}
        </h1>

        <div v-for="field in fields">
            <component class="pt-1" :is="field.component_name"
                       v-model="campaign.data[field.name]"
                       :options="field.field_values"
                       :taggable="field.taggable === 1"
                       :field_id="field.id"
                       :label="field.name"
                       :type="field.field_type"></component>
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
