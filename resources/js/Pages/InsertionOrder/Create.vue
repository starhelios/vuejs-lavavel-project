<template>
<div>
    <h1>
        Create Insertion order for campaign {{campaign.id}}
    </h1>

    <div v-for="field in fields" class="w-1/2 p-3">
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
        props: ['campaign', 'fields'],
        layout: Layout,
        data() {
          return {
              insertion_order: {
                  data: {},
                  campaign_id: this.campaign.id
              }
          }
        },
        methods: {
            submit() {

                this.$inertia.post('/insertion_orders', this.insertion_order, {
                    preserveState: false,
                })
            }
        }
    }
</script>
