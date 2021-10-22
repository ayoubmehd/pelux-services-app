<template>
    <div
        class="flex items-center flex-wrap rounded p-2 bg-white border focus-within:shadow"
    >
        <t-tag
            class="m-0.5 p-1"
            v-for="tag in value"
            :key="tag"
            variant="badge"
        >
            {{ tag }}
            <button
                :class="deleteButtonClasses"
                @click="removeTag(tag)"
                v-html="icon"
            ></button>
        </t-tag>

        <input
            @input="textChanged"
            class="border-0 shadow-0 block max-w-full"
            type="text"
            placeholder="tag Comma(,) separeted"
        />
    </div>
</template>

<script>
export default {
    props: ["value"],
    data() {
        return {
            icon: `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
</svg>`,
            deleteButtonClasses:
                "hover:shadow-sm inline-flex items-center text-dark rounded-full bg-page-bg hover:bg-light hover:shadow-sm p-1 ml-1.5 transition"
        };
    },
    methods: {
        textChanged(e) {
            // console.log(e.data);
            if (e.data === ",") {
                this.$emit("input", [
                    ...this.value,
                    e.target.value.replaceAll(",", "")
                ]);
                e.target.value = "";
            }
        },
        removeTag(tag) {
            const newVal = this.value.filter(item => {
                return item !== tag;
            });
            this.$emit("input", newVal);
        }
    }
};
</script>

<style></style>
