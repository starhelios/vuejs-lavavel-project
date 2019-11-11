<template>
    <div>
        <h1>
            Create campaign
        </h1>
        <div v-for="field in fields">
            <component class="pt-1" :is="field.component_name"
                       v-model="campaign.data[field.name]"
                       :options="field.field_values"
                       :taggable="field.taggable"
                       :label="field.name"
                       :type="field.field_type"></component>
        </div>
        <ag-button @click="submit" title="create" />

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
