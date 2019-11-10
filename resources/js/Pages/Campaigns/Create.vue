<template>
    <div class="container mx-auto">
        <breadcrumbs
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
                        <sn-select-input
                            class="col-md-4 mb-8"
                            v-model="form.brand"
                            :label="'Brand'"
                            :options="['Dorflex']"
                        ></sn-select-input>
                        <sn-text-input
                            class="col-md-4 mb-8"
                            v-model="form.flight"
                            :label="'Flight'"
                        ></sn-text-input>
                        <sn-select-input
                            class="col-md-4 mb-8"
                            v-model="form.driver"
                            :label="'Value Driver'"
                            :options="['PerMessage']"
                        ></sn-select-input>
                        <sn-select-input
                            class="col-md-4 mb-8"
                            v-model="form.objective"
                            :label="'Objective'"
                            :options="['Awareness']"
                        ></sn-select-input>
                        <sn-date-picker
                            class="col-md-4 mb-8"
                            v-model="form.date_start"
                            :label="'Date Start'"
                        ></sn-date-picker>
                        <sn-date-picker
                            class="col-md-4 mb-8"
                            v-model="form.date_end"
                            :label="'Date End'"
                        ></sn-date-picker>

                        <sn-select-input
                            class="col-md-4 mb-8"
                            v-model="form.market"
                            :label="'Market'"
                            :options="['Germany']"
                        ></sn-select-input>

                        <sn-text-input
                            class="col-md-4 mb-8"
                            v-model="form.free"
                            :label="'Campaign Free Field(optional)'"
                        ></sn-text-input>
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
                campaign_data: {}
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
