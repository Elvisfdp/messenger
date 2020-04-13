<template>
        <b-list-group id="listGroup">
            <ul>
            <contact-component v-for="conversation in conversations"
            :key="conversation.id"
            :conversation="conversation" @click.native="selectConversation(conversation)">
            </contact-component>
            </ul>
        </b-list-group>
</template>
<style>
ol, ul, dl {
    margin-top: 0;
    margin-bottom: 1rem;
    padding-inline-start: 0px;
}
.list-group{
    max-height: calc(100vh - 187px);
    overflow-y: auto;
    overflow-x: hidden;
}
.list-group::-webkit-scrollbar {
    width: 8px;
    background: rgba(49, 48, 48, 0.397);
    height: 10px;
}
.list-group::-webkit-scrollbar-thumb {
    background-color: rgba(49, 48, 48);
}
</style>
<script>
    export default {
        props:{
            conversations: Array
        },
        data(){
            return {
                
            }
        },
        mounted() {
        },
        methods: {
            selectConversation(conversation){
                this.$emit('conversationSelected', conversation);
                $('li').removeClass("contact active");
                var id = conversation.id;
                $("#"+id).removeClass("contact");
                $("#"+id).addClass(" contact active");
            }
        }
    }
</script>
