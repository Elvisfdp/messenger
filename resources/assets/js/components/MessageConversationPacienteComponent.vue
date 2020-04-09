<template>
            <b-media :right-align="!!writtenByMe" vertical-align="center" class="mb-2">
                <template v-slot:aside>
                <b-img rounded="circle" blank blank-color="#ccc" width="48" alt="placeholder"></b-img>
                </template>
                <p v-if="writtenByMe" style="float: right;background: rgba(123, 124, 126, 0.719);color: #f5f5f5;font-size: 15px;display: inline-block;padding: 10px 15px;border-radius: 20px;max-width: 205px;line-height: 130%;" >
                    <slot></slot>
                </p>
                <p v-else style="float: left;background: #0ca1d6;font-size: 15px;display: inline-block;padding: 10px 15px;border-radius: 20px;max-width: 205px;line-height: 130%;" >
                    <slot></slot>
                </p>
            </b-media>
</template>
<script>
export default {
    props: {
    writtenByMe:Boolean
    },
        mounted() {
            
        }
    }
</script>