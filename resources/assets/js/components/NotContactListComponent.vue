<template>
     <b-list-group id="listGroup">
            <ul>
                <modal-component v-for="notConversation in notConversations" 
                :key="notConversation.id"  :notConversation="notConversation" :auth_user="auth_user">                
                </modal-component>
            </ul>
     </b-list-group>
</template>
<script>
export default {
    props:{
        notConversations:Array,
        auth_user:Number
    },
    mounted(){
       
    }
}
</script>