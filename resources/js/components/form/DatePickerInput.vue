<template>
    <div class="w-full">
        <datepicker v-model="data" format="dd.MM.yyyy"
                    calendar-button-icon="fa fa-calendar"
                    input-class="border-2 border-yellow-darker "
                    class="w-full absolute  top-0 left-0 right-0 py-1 mt-10 z-20 -ml-1 -mr-1 "
                    :monday-first="true"></datepicker>

    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import {en, es} from 'vuejs-datepicker/dist/locale';
    export default {
        name: 'date-picker-input',
        props: ['data'],
        data(){
            return {

            }
        },
        computed: {

        },
        methods: {

        }

    }
</script>
<style scoped>


</style>
