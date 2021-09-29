<template>
    <div class="">
        <div
            class="container mx-auto px-8 md:px-12 py-8 flex flex-wrap lg:flex-nowrap"
        >
            <div
                class="w-full order-2 lg:w-3/5 lg:mr-2 lg:order-1 bg-white shadow p-5"
            >
                <t-input-group label="Title" class="pb-5" feedback="">
                    <t-input v-model="form.title" placeholder="Service Title" />
                </t-input-group>
                <label for="">Description</label>
                <vue-editor
                    :editor-toolbar="toolbar"
                    v-model="form.content"
                    placeholder="Service Description"
                ></vue-editor>
            </div>
            <div
                class="w-full mb-4 order-1 lg:w-2/5 lg:mb-0 lg:ml-2 lg:order-2 mh-24 p-5 bg-white shadow"
            >
                <div class="flex py-3 justify-between">
                    <label class="flex items-center">
                        <t-checkbox v-model="autoSave" />
                        <span class="ml-2 text-sm">Auto Save</span>
                    </label>
                    <t-button
                        @click="Save"
                        class="ml-auto mr-2"
                        variant="secondary"
                    >
                        Save Draft
                    </t-button>
                    <t-button @click="Publish">Publish</t-button>
                </div>
                <div class="pt-8">
                    <div class="pb-3">
                        <label for="categories" class="px-1 pb-1.5">
                            Categories
                        </label>
                        <t-rich-select
                            multiple
                            :close-on-select="false"
                            :options="categories"
                            value-attribute="id"
                            text-attribute="name"
                            placeholder="Select multiple options"
                            v-model="form.categories"
                            id="categories"
                        ></t-rich-select>
                    </div>
                    <div>
                        <label for="city" class="px-1 pb-1.5">
                            City
                        </label>
                        <t-rich-select
                            :close-on-select="false"
                            :options="cities"
                            value-attribute="id"
                            text-attribute="label"
                            placeholder="Select multiple options"
                            v-model="form.city"
                            id="city"
                        ></t-rich-select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
export default {
    components: {
        VueEditor
    },
    props: {
        form: {
            type: Object,
            default() {
                return {
                    title: "",
                    content: "",
                    categories: [2, 3],
                    city: 1
                };
            }
        }
    },
    data() {
        return {
            autoSave: true,
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
    },
    methods: {
        Save() {
            this.$emit("save", this.form);
        },
        Publish() {
            this.$emit("publish", this.form);
        }
    },
    watch: {
        form: {
            handler(oldVal, newVal) {
                if (this.autoSave) {
                    this.$emit("autoSave", newVal);
                }
            },
            deep: true
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
