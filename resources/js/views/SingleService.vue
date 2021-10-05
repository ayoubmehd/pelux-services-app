<template>
    <div class="service-container">
        <service-card :imgSrc="imgSrc">
            <template v-slot:top>
                <div class="w-full flex justify-between items-center mb-4">
                    <p class="text-2xl font-bold">Order Confirmed</p>

                    <div class="flex justify-between items-center mt-6 mb-3">
                        <t-tag variant="avatar" class="mx-2">
                            <img
                                src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=880&q=80"
                                alt=""
                            />
                        </t-tag>
                        <p class="text-xs">
                            Jonathan Reinink <br />
                            Aug 8
                        </p>
                    </div>
                </div>
            </template>
            <template v-slot:more>
                <t-button>Get Service</t-button>
                <div class="flex justify-between items-center mt-6 mb-3">
                    <t-tag variant="avatar" class="mx-2">
                        <img
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=880&q=80"
                            alt=""
                        />
                    </t-tag>
                    <p class="text-xs">
                        Jonathan Reinink <br />
                        Aug 8
                    </p>
                </div>
                <p class="font-bold">30 Sells</p>
            </template>
        </service-card>

        <div class="flex flex-wrap -mx-2">
            <div v-for="i in 4" class="px-2 mb-4 w-1/3">
                <service-card :headingLevel="4" :imgSrc="imgSrc">
                </service-card>
            </div>
        </div>
    </div>
</template>

<script>
import ServiceCard from "../components/service/ServiceCard.vue";

export default {
    components: { ServiceCard },
    data() {
        return {
            imgSrc: `https://images.unsplash.com/photo-1517231925375-bf2cb42917a5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1171&q=80`
        };
    }
};
</script>

<style></style>
