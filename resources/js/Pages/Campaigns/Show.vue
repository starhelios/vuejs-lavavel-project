<template>
    <div>

        <h1>Campaign details for campaign {{campaign.id}}</h1>
        <div class="flex">
            <div class="w-1/3">
                Insertion Orders
                <inertia-link :href="`/campaigns/${campaign.id}/insertion_orders/create`">
                    <ag-button title="Create new"/>
                </inertia-link>
                <div v-for="insertion_order in campaign.insertion_orders">
                    {{insertion_order.label}}
                </div>
            </div>
            <div class="w-1/3">
                Line Items
                <inertia-link :href="`/campaigns/${campaign.id}/line_items/create`">
                    <ag-button title="Create new"/>
                </inertia-link>
                <div v-if="campaign.line_items.length" v-for="line_item in campaign.line_items">
                    {{line_item.label}}
                </div>
            </div>
            <div class="w-1/3">
                Creatives
                <inertia-link :href="`/campaigns/${campaign.id}/creatives/create`">
                    <ag-button title="Create new"/>
                </inertia-link>
                <div v-if="campaign.creatives.length" v-for="creative in campaign.creatives">
                    {{creative.label}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Layout from '../../Layouts/Default'
    export default {
        layout: Layout,
        props: ['campaign'],
        computed: {
            page() {
                return this.$page;
            }
        }
    }
</script>