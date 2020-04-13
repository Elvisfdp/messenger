<template>
    <b-container fluid style="height: calc(100vh - 56px); padding-left:0px;">
    <b-row class="h-100">
        <b-col cols="3" style="background:rgb(27, 26, 26);">
            
             <b-form class="my-3 mx-2" autocomplete="off">
                 <label for="" style="position: absolute;
                    margin: 10px 0 0 20px;"><i class="fa fa-search" aria-hidden="true"></i></label>
                <b-form-input type="text" v-model="querySearch" placeholder="Buscar contacto..." class="text-center" style="font-family: proxima-nova,  Source Sans Pro, sans-serif;
                    padding: 10px 0 10px 46px;
                   border-radius:inherit;
                    border: none;
                    background: black;
                    color: #f5f5f5;"> 
                </b-form-input>
            </b-form>
            <contact-list-medico-component v-on:conversationSelected="changeActiveConversation($event)"
            :conversations="conversationsFiltered" :id="UpdateId">
            </contact-list-medico-component>
            <div id="bottom-bar">
                    <button id="addcontact" data-toggle="modal" data-target="#exampleModalCenter1" @click="datosModal()"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Agregar contactos</span></button>
                    <button id="actualizarcontact" @click="UpdateContacts()"><i class="fa fa-refresh" aria-hidden="true"></i> <span>Actualizar contactos</span></button>
            </div>
        </b-col>
        <b-col style="background-color: #464646;">
            
            <active-conversation-medico-component
            v-if="selectedConversation"
            :contact-id="selectedConversation.contact_id"
            :contact-name="selectedConversation.contact_name"
            :contact-last-name="selectedConversation.last_name"
            :messages="messages"
            @messageCreated="addMessage($event)">

            </active-conversation-medico-component>
        </b-col>
        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header" style="background: rgb(53, 53, 53);">
                <h5 class="modal-title">Agregar contactos</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body" style="background: rgb(53, 53, 53);">
                        <not-contact-list-component :notConversations="notConversations" :auth_user="userId"> 
                        </not-contact-list-component>
                    </div>
                </div>
            </div>
        </div>
    </b-row>
    </b-container>
</template>
<style>
    .h-100{
        background: rgb(53, 53, 53);
    }
    #bottom-bar {
        position: absolute;
        width: calc(100% - 30px);;
        bottom: 0;
      }
      #bottom-bar button {
        float: left;
        border: none;
        width: 50%;
        padding: 10px 0;
        background: #118abc;
        color: #f5f5f5;
        cursor: pointer;
        font-size: 0.85em;
        font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
      }
      @media screen and (max-width: 735px) {
        #bottom-bar button {
          float: none;
          width: 100%;
          padding: 15px 0;
        }
      }
      #bottom-bar button:focus {
        outline: none;
      }
      #bottom-bar button:nth-child(1) {
        border-right: 1px solid rgb(37, 35, 35);
      }
      @media screen and (max-width: 735px) {
        #bottom-bar button:nth-child(1) {
          border-right: none;
          border-bottom: 1px solid rgb(37, 35, 35);
        }
      }
      #bottom-bar button:hover {
        background: rgba(49, 48, 48, 0.397);
      }
      #bottom-bar button i {
        margin-right: 3px;
        font-size: 1em;
      }
      @media screen and (max-width: 735px) {
        #bottom-bar button i {
          font-size: 1.3em;
        }
      }
      @media screen and (max-width: 735px) {
        #bottom-bar button span {
          display: none;
        }
      }
</style>
<script>
    export default {
        props:{
            userId:Number
        },
       data(){
           return {
               selectedConversation: null,
               messages:[],
               conversations:[],
               notConversations:[],
               UpdateId:0,
               querySearch: ''
           }
       },
        mounted() {
            this.getConversations();
            Echo.private(`users.${this.userId}`)
            .listen('MessageSent', (data) =>{
                console.log(message);
                const message = data.message;
                message.written_by_me = false;
                this.addMessage(message);
            });
            Echo.join(`messenger`)
            .here((users) => {
                users.forEach((user)=>this.changeStatus(user,true));
            })
            .joining(
                user => this.changeStatus(user, true)
                )
            .leaving(
                user => this.changeStatus(user, false)
            )
        },
        methods:{
           changeActiveConversation(conversation){
               this.selectedConversation = conversation;
               this.getMessages();
           },
           getMessages(){
                axios.get(`/api/messages?contact_id=${this.selectedConversation.contact_id}`)
                .then((response)=> {
                    this.messages = response.data;
                });
            },
            addMessage(message){
                const conversation = this.conversations.find((conversation) =>{
                    return conversation.contact_id == message.from_id || conversation.contact_id == message.to_id;
                });
                const author = this.userId === message.from_id ? 'Tú' : conversation.contact_name;
                conversation.last_message = `${author}: ${message.content}`;
                conversation.last_time = message.created_at;

                if(this.selectedConversation.contact_id == message.from_id || this.selectedConversation.contact_id == message.to_id){
                this.messages.push(message);
                }
            },
             getConversations(){
                axios.get('/api/conversationsMedicos')
                .then((response)=>{
                    this.conversations = response.data;
                    console.log(this.conversations);
                });
            },
            changeStatus(user, status){
                const index = this.conversations.findIndex((conversation)=>{
                    return conversation.contact_id == user.id;
                });
                if(index>=0)
                this.$set(this.conversations[index],'online',status);
            },
            datosModal(){
                axios.get('/api/notconversationsMedico')
                .then((response)=>{
                    console.log(response.data);
                    this.notConversations = response.data;
                });
            },
            UpdateContacts(UpdateId){
                this.UpdateId += 1;
                this.getConversations();
            }
        },
        computed:{
            conversationsFiltered(){
                return this.conversations.filter(
                    (conversation) => conversation.contact_name
                                                  .toLowerCase()
                                                  .includes(this.querySearch.toLowerCase())
                );
            }
        }
    }
</script>
