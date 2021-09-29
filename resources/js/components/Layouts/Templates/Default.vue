<template>
    <div>
        <navbar />
        <main>
            <slot></slot>
        </main>
    </div>
</template>

<script>
import Navbar from "../Navbar.vue";

export default {
    components: {
        Navbar
    }
};
</script>

<style></style>
