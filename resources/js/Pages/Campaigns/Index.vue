<template>
    <div>

        <inertia-link href="/campaigns/create">
            <sn-button>New Campaign</sn-button>
        </inertia-link>
        <table>
            <tr v-for="campaign in campaigns.data">
                <td>{{campaign.id}}</td>
                <td>{{campaign.name}}</td>
            </tr>
        </table>

        <inertia-link v-if="campaigns.prev_page_url" :href="campaigns.prev_page_url">
            <sn-button>Prev Page</sn-button>
        </inertia-link>
        <inertia-link v-if="campaigns.next_page_url" :href="campaigns.next_page_url">
            <sn-button>Next Page</sn-button>
        </inertia-link>
    </div>
</template>

<script>
    import Layout from '../../Layouts/Default';

    export default {
        layout: Layout,
        props: ['campaigns'],
    }
</script>