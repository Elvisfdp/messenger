<template>
    <div>
        <span v-if="online" class="contact-status online"></span>
        <span v-else class="contact-status busy"></span>
    </div>
    <!--<b-img rounded="circle" blank width="10" height="10" 
    :title="online ? 'Conectado' : 'Desconectado'"
    :blank-color="online ? 'green' : 'red'" class="m-1" alt="img"></b-img>-->
</template>

<script>
export default {
        props: {
            online:Boolean
        },
        data(){
            return{
               
            }
        },
        mounted() {
            
        }
    }
</script>