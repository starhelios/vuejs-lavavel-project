<template>
<div>
    <h1>
        Create Insertion order for campaign {{campaign.id}}
    </h1>

    <div v-for="field in fields" class="w-1/2 p-3">

        <component class="pt-1" :is="field.component_name" v-model="insertion_order.data[field.name]" :label="field.name" :type="field.field_type"></component>
    </div>
    <sn-button @click="submit">Create!</sn-button>
</div>
</template>

<script>
    export default {
        props: ['campaign', 'fields'],
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
