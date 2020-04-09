<template>
    <b-row class="h-100">
        <b-col cols="12" style="padding:0px;">
            <b-card
                footer-bg-variant="light"
                footer-border-variant="dark"
                title="Conversación activa"
                class="h-100"
            no-body style="background: #464646;">
            <div class="contact-profile" style="width: 100%;height: 60px;line-height: 50px;background: rgb(27, 26, 26);">
                
                <p><b-img rounded="circle" alt="Circle image" blank width="40" height="40" blank-color="#777" class="m-1"></b-img>
                {{contactName}} {{contactLastName}}</p>
                <hr>
            </div>
            <b-card-body class="card-body-scroll" style="background: #464646;">
                 <message-conversation-paciente-component 
                v-for="message in messages"
                :key="message.id" 
                :written-by-me="message.written_by_me">
                {{message.content}}
                </message-conversation-paciente-component>
            </b-card-body>
            <div slot="footer">
                <b-form class="mb-0" @submit.prevent="postMessages" autocomplete="off">
                    <b-input-group>
                        <b-form-input  type="text" v-model="newMessage" placeholder="Escribe un mensaje">
                        </b-form-input>
                        <b-input-group-append>
                            <b-button type="submit" variant="primary"><i class="fa fa-paper-plane" aria-hidden="true"></i></b-button>
                        </b-input-group-append>
                    </b-input-group>
                </b-form>
            </div>
            </b-card>                   
        </b-col>
        <!--<b-col cols="4">
            <b-img rounded="circle" alt="Circle image" blank width="60" height="60" blank-color="#777" class="m-1"></b-img>
            <p>{{contactName}}</p>
            <hr>
            <b-form-checkbox>
                Descativar notificaciones
            </b-form-checkbox>
        </b-col>-->
    </b-row>
</template>
<style>
    .h-100 {
    height: 100% !important;
    border: none;
    }
    .card-body-scroll{
        max-height: calc(100vh - 123px);
        overflow-y: auto;
    }
    .card-body-scroll::-webkit-scrollbar {
        width: 8px;
        height: 10px;
        background: transparent;
    }
    .card-body-scroll::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.3);
    }
    .form-control{
        border-radius: 0px;
    }
    .card-footer{
        padding:inherit;
    }
    .btn{
        border-radius: 0px;
        width: 100%;
    }
</style>
<script>
export default {
    props:{
        contactId: Number,
        contactName: String,
        messages: Array,
        contactLastName:String
    },
    data(){
       return{
           newMessage: ''
       }
    },
        mounted() {
        },
        methods: {
            
            postMessages(){
                const params={
                    to_id: this.contactId,
                    content: this.newMessage
                };
                axios.post('/api/messages', params)
                .then((response)=> {
                    //console.log(response.data);
                    if(response.data.success){
                        this.newMessage = '';
                        const message = response.data.message;
                        message.written_by_me = true;
                        this.$emit('messageCreated', message);
                    }
                }); 
            },
            scrollToBottom(){
                const el =document.querySelector('.card-body-scroll');
                el.scrollTop = el.scrollHeight;
            }
        },
        updated(){
            this.scrollToBottom();
        }

    }
</script>