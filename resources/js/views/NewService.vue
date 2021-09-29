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
            categories: [
                {
                    id: 1,
                    name: "Fashion"
                },
                {
                    id: 2,
                    name: "Electronique"
                },
                {
                    id: 3,
                    name: "Mecanique"
                }
            ],
            cities: [
                {
                    id: 1,
                    label: "Marakech"
                },
                {
                    id: 2,
                    label: "Safi"
                },
                {
                    id: 3,
                    label: "Casablanca"
                },
                {
                    id: 4,
                    label: "Rabat"
                }
            ],
            form: {
                title: "Service Title",
                content: "dfsakfjlasfkdjsalfkhdf",
                categories: [1, 2],
                city: 2
            },
            toolbar: [
                [
                    "bold",
                    "italic",
                    "underline",
                    "align",
                    { align: "center" },
                    { align: "right" }
                ],
                [{ header: [false, 2, 3, 4, 5, 6] }],
                [{ list: "ordered" }, { list: "bullet" }],
                ["image"]
            ]
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
