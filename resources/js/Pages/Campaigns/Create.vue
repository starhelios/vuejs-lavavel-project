<template>
    <div class="w-full flex flex-col">
        <div class="w-full flex justify-start py-4 px-20">
            <inertia-link href="/campaigns">
                <ag-button type="full" class="mt-2">
                    <img src="/assets/icons/long-arrow-left.svg" alt="" slot="icon">
                </ag-button>
            </inertia-link>
            <div class="w-full flex flex-col px-4">
                <p class="text-3xl text-brand-500">New Campaign</p>
                <p class="text-xs">Germany/ Digital Ad Berlin</p>
            </div>
        </div>
        <div class="w-full flex justify-center text-center mt-8">
            <p class="text-2xl text-brand-500">General Campaign Information</p>
        </div>
        <div class="w-full pt-8 flex flex-wrap px-16">
            <div v-for="field in fields" class="w-1/3 p-2">
                <component class="p-2 " :is="field.component_name"
                           v-model="campaign.data[field.name]"
                           :options="field.field_values"
                           :taggable="field.taggable === 1"
                           :field_id="field.id"
                           :label="field.name"
                           :type="field.field_type"></component>
            </div>
        </div>
        <div class="w-full flex justify-center pt-6 text-center  pb-8">
            <ag-button @click="submit" type="full" class="px-1" title="create campaign"/>
        </div>


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
