<template>
    <editor
        :form="form"
        @save="saveService"
        @autoSave="saveService"
        @publish="publishService"
    />
</template>

<script>
import Editor from "../components/service/Editor.vue";
import { mapState, mapActions } from "vuex";

export default {
    components: {
        Editor
    },
    data() {
        return {
            form: {
                title: "",
                content: "",
                categories: [],
                city: null
            }
        };
    },
    computed: {
        ...mapState({
            isLoading: state => state.isLoading,
            error: state => state.error
        })
    },
    methods: {
        saveService(data) {
            this.$store.dispatch("services/saveService", data);
        },
        publishService(data) {
            this.$store.dispatch("services/publishService", data);
        }
    }
};
</script>

<style>
@import "~vue2-editor/dist/vue2-editor.css";
.quillWrapper {
    @apply bg-gray-200;
}
</style>
