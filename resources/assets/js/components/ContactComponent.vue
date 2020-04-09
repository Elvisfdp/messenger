<template>
    <li :variant="variant" :id="conversation.id" class="contact">
        <b-row class="p-2" align-h="center">
            <b-col cols="12" md="3" class="text-center">
                <span v-if="conversation.online" class="contact-status online" style="position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 5px 0 0 0;background: #2ecc71; border: 2px solid rgba(49, 48, 48, 0.397);"></span>
                <span v-else class="contact-status busy" style=" position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 5px 0 0 0;background: #e74c3c; border: 2px solid rgba(49, 48, 48, 0.397);"></span>
                <b-img rounded="circle" alt="Circle image" blank width="37" height="37" blank-color="#777" class="m-1"></b-img>
                </b-col>
                <b-col clos="6" align-self="center" class="d-none d-md-block">
                <p class="mb-1">
                   
                    {{conversation.contact_name}} {{conversation.last_name}}</p>
                <p v-if="conversation.last_message==null" class="text-muted small mb-1" style="color:white">No se han enviado mensajes</p>
                <p v-else class="text-muted small mb-1" style="color:white">{{conversation.last_message}}</p>
            </b-col>
            <b-col cols="3"  class="d-none d-md-block">
                <p v-if="lastTime=='Invalid date'"></p>
                <p v-else class="text-muted small">{{lastTime}}</p>
            </b-col>
        </b-row>
    </li>
</template>

<style>
    .contact {
        background: rgb(27, 26, 26);
        position: relative;
        padding: 10px 0 15px 0;
        font-size: 0.9em;
        cursor: pointer;
      }
    .contact:hover {
        background: rgba(49, 48, 48, 0.397);
      }
    .active {
        background: rgba(49, 48, 48, 0.397);
        border-right: 5px solid #118ABC;
      }
</style>

<script>
    export default {
        props: {
            variant:String,
            conversation:Object
        },
        data(){
            return{
               
            }
        },
        mounted() {
        },
        computed:{
            lastTime(){
                return moment(this.conversation.last_time, "YYYY-MM-DD hh:mm:ss").locale('es').fromNow();
            }
        }
    }
</script>
