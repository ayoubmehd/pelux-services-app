<template>
    <div>
        <description :content="description"></description>
    </div>
</template>

<script>
import { mapState } from "vuex";
import Description from "../../components/service/Description.vue";

export default {
    components: {
        Description
    },
    computed: {
        ...mapState({
            description: state => state.userServices.service.description
        })
    }
};
</script>
