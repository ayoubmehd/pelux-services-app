<template>
    <t-card class="mb-3 px-2 py-3">
        <div class="flex items-center justify-between mb-2">
            <div class="flex justify-between items-center">
                <t-tag variant="avatar" class="mx-2">
                    <img
                        src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=880&q=80"
                        alt=""
                    />
                </t-tag>
                <p v-if="order" class="text-xs">
                    {{ order.user.name }} <br />
                    {{ order.user.created_at | formatDate }}
                </p>
            </div>

            <div class="flex -mx-1">
                <t-button class="mx-1" variant="secondary">Message</t-button>
                <t-button class="mx-1">Confirm</t-button>
            </div>
        </div>
        <t-tag variant="badge">
            {{ order.status | capetalize }}
        </t-tag>
    </t-card>
</template>

<script>
export default {
    props: ["order"]
};
</script>

<style></style>
