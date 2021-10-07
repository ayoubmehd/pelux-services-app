<script>
// Cool way to render Vue components from HTML Strings
// https://medium.com/haiiro-io/compile-markdown-as-vue-template-on-nuxt-js-1c606c15731c
import VueWithCompiler from "vue/dist/vue.esm";
export default {
    props: {
        html: {
            type: String,
            default: ""
        }
    },
    data() {
        return { templateRender: undefined };
    },
    watch: {
        html(to) {
            this.updateRender();
        }
    },
    created() {
        this.updateRender();
    },
    methods: {
        updateRender() {
            const compiled = VueWithCompiler.compile(`<div>${this.html}</div>`);
            this.templateRender = compiled.render;
            this.$options.staticRenderFns = [];
            for (const staticRenderFunction of compiled.staticRenderFns) {
                this.$options.staticRenderFns.push(staticRenderFunction);
            }
        }
    },
    render() {
        return this.templateRender();
    }
};
</script>

<style scoped>
h2 {
    @apply text-4xl mb-6;
}
h3 {
    @apply text-3xl mb-5;
}
h4 {
    @apply text-2xl mb-4;
}
h5 {
    @apply text-xl mb-3;
}
h6 {
    @apply text-lg mb-2;
}
p {
    @apply mb-1;
}
</style>
