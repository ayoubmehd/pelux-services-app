<template>
    <div class="service-container">
        <service-card :service="service" :imgSrc="imgSrc">
            <template v-slot:more>
                <div class="flex">
                    <t-button class="mr-2" variant="secondary">
                        Finish Order
                    </t-button>
                    <t-button>Get Service</t-button>
                </div>
                <div class="flex justify-between items-center mt-6 mb-3">
                    <t-tag variant="avatar" class="mx-2">
                        <img
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=880&q=80"
                            alt=""
                        />
                    </t-tag>
                    <p v-if="provider" class="text-xs">
                        {{ provider.name }} <br />
                        {{ provider.created_at }}
                    </p>
                </div>
                <p class="font-bold">{{ service.orders_count }} Sells</p>
            </template>
        </service-card>
    </div>
</template>

<script>
import ServiceCard from "../components/service/ServiceCard.vue";
import { mapState } from "vuex";

export default {
    components: { ServiceCard },
    data() {
        return {
            imgSrc: `https://images.unsplash.com/photo-1517231925375-bf2cb42917a5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1171&q=80`
        };
    },
    computed: {
        ...mapState({
            service: state => state.userServices.service
        }),
        provider() {
            /**
             * Todo:Filter Date In the backend
             */
            return {
                name: this.service.provider ? this.service.provider.name : "",
                created_at: this.service.provider
                    ? new Date(
                          this.service.provider.created_at
                      ).toLocaleDateString("fr")
                    : ""
            };
        }
    },
    mounted() {
        this.$store.dispatch("fetchService", this.$route.params.id);
    }
};
</script>

<style></style>
