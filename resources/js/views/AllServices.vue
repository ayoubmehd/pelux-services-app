<template>
    <div class="service-container">
        <div class="flex flex-wrap -mx-3">
            <div class="w-1/2 px-3 mb-6" v-for="service in services">
                <service-card
                    :key="service.id"
                    :service="service"
                    :headingLevel="3"
                ></service-card>
            </div>
            <div
                class="w-full text-center font-bold text-xl"
                v-if="$store.state.isLoading"
            >
                Loading...
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from "vuex";
import ServiceCard from "./../components/service/ServiceCard.vue";

export default {
    components: {
        ServiceCard
    },
    methods: {
        scrolled() {
            const isInBottom =
                window.scrollY + window.innerHeight >=
                document.documentElement.offsetHeight;
            if (isInBottom) this.$store.dispatch("fetchAllService");
        }
    },
    computed: {
        ...mapState({
            services: state => state.userServices.services
        })
    },
    mounted() {
        this.$store.dispatch("fetchAllService");
        window.addEventListener("scroll", this.scrolled);
    },
    destroyed() {
        window.removeEventListener("scroll", this.scrolled);
    }
};
</script>

<style></style>
