<template>
    <div>

        <inertia-link href="/campaigns/create">
            <sn-button>New Campaign</sn-button>
        </inertia-link>


        <div class="py-8">
            <ag-sub-header :filter="fields"/>
        </div>
        <table>
            <tr v-for="campaign in campaigns.data">
                <td>{{campaign.id}}</td>
                <td>{{campaign.label}}</td>
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
    import {mapState} from 'vuex';

    export default {
        layout: Layout,
        props: ['campaigns', 'fields', 'init_filters'],
        computed: {
            ...mapState({
                filters: state => state.filters
            })
        },
        mounted() {
            if(this.init_filters) {
                this.$store.commit('setFilters', this.init_filters);
            }
        }
    }
</script>