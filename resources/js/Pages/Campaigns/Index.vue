<template>
    <div class="container">
        <div class="flex justify-between mb-8">
            <breadcrumbs
                :title="'Dashboard'"
                :back="false"
                :links="{ Germany: 'home', 'Digital Ad Berlin': true }"
            />
            <inertia-link href="/campaigns/create">
                <sn-button class="text-uppercase">New Campaign</sn-button>
            </inertia-link>
        </div>
        <TableExpand
            :columns="[{ label: 'Campaigns', key: 'name' }]"
            :data="[{ name: 'Test1' }, { name: 'Test2' }]"
        />
    </div>
</template>

<script>
import Layout from "../../Layouts/Default";
import TableExpand from "../../components/Tables/Expand";

export default {
    layout: Layout,
    components: {
        TableExpand
    },
    props: ["campaigns"]
};
</script>
