<template>
    <li :variant="variant" :id="notConversation.id" class="contact">
        <b-row class="p-2" align-h="center">
            <b-col cols="12" md="3" class="text-center">
                <b-img rounded="circle" alt="Circle image" blank width="37" height="37" blank-color="#777" class="m-1"></b-img>
            </b-col>
            <b-col clos="6" align-self="center">
                 <p class="mb-1">
                {{notConversation.name}} {{notConversation.lastName}}&nbsp;&nbsp;&nbsp;<button id="addcontact" @click="insertConversation(notConversation.id,auth_user,notConversation.level)"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Agregar contacto</span></button></p>
            </b-col>
        </b-row>
    </li>
</template>
<style>
  button {
        float: rigth;
        border: none;
        width: 60%;
        padding: 10px 0;
        background: #118abc;
        color: #f5f5f5;
        cursor: pointer;
        font-size: 0.85em;
        font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
      } 

</style>
<script>
export default {
     props: {
            variant:String,
            notConversation:Object,
            auth_user:Number
    },
     data(){
           return {
           }
    },
    methods:{
        insertConversation(idContact,auth_user,level){
            console.log(idContact);
            console.log(auth_user);
            axios.post('/api/insertConversations', {
            user_id: auth_user,
            contact_id: idContact,
            level:level
            }).then(response => {
                console.log(response.data);
            }).catch(e => {
                console.log(e);
            });
        }
    }
    
}
</script>