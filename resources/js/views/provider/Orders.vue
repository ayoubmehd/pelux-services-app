<template>
    <div>
        <order v-for="order in orders" :key="order.id" :order="order"></order>
    </div>
</template>

<script>
import Order from "./Order.vue";
import { mapState } from "vuex";

export default {
    components: {
        Order
    },
    computed: {
        ...mapState({
            orders: state => state.orders.orders
        })
    },
    mounted() {
        const serviceId = this.$route.params.id;

        this.$store.dispatch("orders/getServiceOrders", serviceId);
    }
};
</script>

<style></style>
