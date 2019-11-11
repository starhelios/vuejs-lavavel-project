export default {
    props: {
        classList: {
            type: Array,
            default() {
                return [];
            }
        },
        hasSelect: {
            type: Boolean | String,
            default: true
        },
        hasShift: {
            type: Boolean | String,
            default: false
        },
        hasHeader: {
            type: Boolean | String,
            default: true
        },
        hasTabsHeader: {
            type: Boolean | String,
            default: true
        },
        hasEdit: {
            type: Boolean | String,
            default: true
        },

        hasPagination: {
            type: Boolean | String,
            default: true
        },
        hasExpand: {
            type: Boolean | String,
            default: true
        },
        columns: {
            type: Array,
            default() {
                return [];
            }
        }
    }
};
