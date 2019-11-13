<template>
    <div class="container mx-auto pb-4">
        <div class="flex justify-between mb-8 pt-4 ">
            <ag-bread-crumb
                :title="'Dashboard'"
                :back="false"
                :links="{ Germany: 'home', 'Digital Ad Berlin': true }"
            />
            <inertia-link href="/campaigns/create">
                <sn-button class="text-uppercase">New Campaign</sn-button>
            </inertia-link>
        </div>
        <ag-table-expand
            :columns="[{ label: 'Campaigns', key: 'name' }]"
            :data="rows"
        />
    </div>
</template>

<script>
    import Layout from "../../Layouts/Default";

    export default {
        layout: Layout,
        props: ["campaigns"],
        data() {
            return {
                rows: [
                    {
                        id: 1,
                        name: "Test1",
                        children: [
                            {name: "Sub Test1", id: 5},
                            {name: "Sub Test2", id: 6}
                        ]
                    },
                    {
                        id: 2,
                        name: "Test2",
                        children: [
                            {name: "Sub Test3", id: 3},
                            {name: "Sub Test4", id: 4}
                        ]
                    }
                ]
            };
        }
    };
</script>
