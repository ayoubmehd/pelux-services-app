<template>
    <div>
        <string-to-vue :html="content" />
    </div>
</template>

<script>
import StringToVue from "../StringToVue.vue";

export default {
    components: {
        StringToVue
    },
    props: ["content"]
};
</script>
