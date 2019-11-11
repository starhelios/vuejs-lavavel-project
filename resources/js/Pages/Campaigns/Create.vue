<template>
    <div class="container mx-auto">
        <ag-bread-crumb
            :backLink="'/campaigns'"
            :title="'Dashboard'"
            :links="{ Germany: 'home', 'Digital Ad Berlin': true }"
        />
        <div class="page-view mt-10">
            <h2 class="text-brand-500 font-semibold text-2xl text-center mb-8">
                General Campaign Information
            </h2>
            <div class="row">
                <form @submit.prevent="submit" class="col-12">
                    <div class="row">
                        <span class="col-md-4 mb-8" v-for="field in fields">
                            <ag-select-input
                                v-if="field.type === 'select'"
                                :key="field.key"
                                v-model="form[field.key]"
                                :label="field.label"
                                :options="field.options"
                            ></ag-select-input>

                            <ag-date-picker
                                v-else-if="field.type === 'date'"
                                :key="field.key"
                                v-model="form[field.key]"
                                :label="field.label"
                                :options="field.options"
                            ></ag-date-picker>
                            <ag-text-input
                                v-else
                                :key="field.key"
                                v-model="form[field.key]"
                                :label="field.label"
                            ></ag-text-input>
                        </span>
                    </div>
                    <div class="text-center mt-10">
                        <button
                            type="submit"
                            class="bg-brand-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                        >
                            CREATE CAMPAIGN
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "../../Layouts/Default.vue";

export default {
    layout: Layout,
    props: ["fields"],
    data() {
        return {
            form: {},
            campaign: {
                name: "",
                data: {}
            }
        };
    },
    methods: {
        submit() {
            this.$inertia.post("/campaigns", this.campaign, {
                preserveState: false
            });
        }
    }
};
</script>
