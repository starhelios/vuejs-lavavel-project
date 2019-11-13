<template>
    <div class="w-full flex justify-center items-center text-center">
        <ag-button type="white" class="mx-2" @click="prevPage()" v-if="pagesNumber && pagesNumber > 1 ">
            <img slot="icon" src="/assets/icons/arrow-left.svg">
        </ag-button>
        <pagination-number
            :active="currentPage === page ? true : false"
            :number="page"
            :key="page"
            class="mx-2"
            v-if="pagesNumber && pagesNumber > 1"
            v-for="page in pagesNumber"
            @click="choosePage(page)"
        ></pagination-number>
        <ag-button type="white" class="mx-2" @click="nextPage()" v-if="pagesNumber && pagesNumber > 1 ">
            <img slot="icon" src="/assets/icons/arrow-right.svg">
        </ag-button>
    </div>

</template>
<script>
    import {mapState} from "vuex";

    export default {
        name: 'sn-pagination',
        // we will add all variable in Vuex later
        computed: {
            ...mapState({
                pagesNumber: state => state.pagesNumber,
                currentPage: state => state.currentPage,

            }),
        },
        methods: {
            nextPage() {
                if (this.currentPage < this.pagesNumber)
                    this.$store.commit('setCurrentPage', this.currentPage + 1)

            },
            prevPage() {
                if (this.currentPage > 1)
                    this.$store.commit('setCurrentPage', this.currentPage - 1)
            },
            choosePage(val) {
                this.$store.commit('setCurrentPage', val)
            }
        }

    }
</script>
