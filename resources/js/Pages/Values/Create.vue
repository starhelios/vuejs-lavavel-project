<template>
    <div>
        <div class="flex flex-wrap">
            <div class="w-1/3 p-4" v-for="field in fields">
                <ag-text-input :label="field.label" v-model="formData[field.id]"/>
            </div>
        </div>
        <div class="flex justify-center m-10">
            <ag-button @click="store" title="Save changes"/>
        </div>
    </div>
</template>

<script>
    import Layout from '../../Layouts/Default'

    export default {
        layout: Layout,
        props: ['fields'],
        data() {
            return {
                formData: {}
            }
        },
        methods: {
            store() {

                this.$inertia.post('/values', {
                    formData: this.formData
                }, {
                    preserveState: false,
                })
            }
        }
    }
</script>