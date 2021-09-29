<template>
    <editor :form="form" />
</template>

<script>
import Editor from "../components/service/Editor.vue";

export default {
    components: {
        Editor
    },
    data() {
        return {
            form: {
                title: "Service Title",
                content: "dfsakfjlasfkdjsalfkhdf",
                categories: [1, 2],
                city: 2
            }
        };
    }
};
</script>

<style>
@import "~vue2-editor/dist/vue2-editor.css";
.quillWrapper {
    @apply bg-gray-200;
}
</style>
