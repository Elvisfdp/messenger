<template>
        <b-list-group id="listGroup">
            <ul>
            <contact-paciente-component v-for="conversation in conversations"
            :key="conversation.id"
            :conversation="conversation" @click.native="selectConversation(conversation)">
            </contact-paciente-component>
            </ul>
        </b-list-group>
</template>
<style>
ol, ul, dl {
    margin-top: 0;
    margin-bottom: 1rem;
    padding-inline-start: 0px;
}
#listGroup{
    max-height: calc(100vh - 230);
    overflow-y: auto;
    overflow-x: hidden;
}
#listGroup::-webkit-scrollbar {
    width: 8px;
    background: rgba(49, 48, 48, 0.397);
    height: 10px;
}
#listGroup::-webkit-scrollbar-thumb {
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
                $('div').removeClass("contact active");
                var id = conversation.id;
                $("#"+id).removeClass("list-group-item");
                $("#"+id).addClass(" contact active");
            }
        }
    }
</script>
