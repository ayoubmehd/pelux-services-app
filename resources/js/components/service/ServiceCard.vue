<template>
    <t-card class="overflow-hidden">
        <div
            class="w-full overflow-hidden flex justify-center"
            :style="{ height: !isFull ? '16rem' : '30rem' }"
        >
            <img
                class="w-full h-full object-cover mx-auto"
                :src="imgSrc"
                alt=""
            />
        </div>
        <div
            class="flex flex-1 flex-wrap justify-between items-center"
            :class="padding"
        >
            <slot name="top"></slot>
            <div :class="isFull ? 'w-2/3' : ''">
                <t-tag
                    v-for="tag in ['photography', 'travel', 'winter']"
                    :key="tag"
                    variant="badge"
                >
                    #{{ tag }}
                </t-tag>

                <component
                    :is="validHeadingTag"
                    class="font-bold"
                    :class="{ ...headingMargin, ...headingSize }"
                >
                    Can coffee make you a better developer?
                </component>
                <div class="flex" :class="reviewsMargin">
                    <svg
                        v-for="i in 5"
                        class="mx-1 w-4 h-4 fill-current"
                        :class="i <= 3 ? 'text-primary' : 'text-gray-400'"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                        />
                    </svg>
                </div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Voluptatibus quia, nulla! Maiores et perferendis eaque,
                    exercitationem praesentium nihil.
                </p>
            </div>
            <div class="flex flex-col items-end">
                <slot name="more"></slot>
            </div>
        </div>
    </t-card>
</template>

<script>
export default {
    props: {
        imgSrc: {
            type: String,
            default: ""
        },
        headingLevel: {
            type: Number,
            default: 2
        }
    },
    computed: {
        headingSize() {
            const headingSizes = ["5xl", "4xl", "3xl", "2xl", "xl", "lg"];

            return {
                [`text-${headingSizes[this.headingLevel - 1]}`]: !!headingSizes[
                    this.headingLevel - 1
                ],
                "text-4xl": !headingSizes[this.headingLevel - 1]
            };

            // return headingSizes[this.headingLevel - 1]
            //     ? `text-${headingSizes[this.headingLevel - 1]}`
            //     : "text-4xl";
        },
        validHeadingTag() {
            const isValidHeading =
                this.headingLevel >= 1 && this.headingLevel <= 6;
            return isValidHeading ? `h${this.headingLevel}` : "h2";
        },
        isFull() {
            return !!this.$slots.more;
        },
        padding() {
            return this.isFull ? "p-8" : "p-4";
        },
        headingMargin() {
            return {
                "mt-5": this.isFull,
                "mt-3": !this.isFull,
                "mb-2": this.isFull,
                "mb-1": !this.isFull
            };
        },
        reviewsMargin() {
            return {
                "mb-4": this.isFull,
                "mb-2": !this.isFull
            };
        }
    },
    mounted() {}
};
</script>

<style></style>
