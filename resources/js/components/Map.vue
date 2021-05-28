
<template>
   <div>
       <iframe width="100%" height="400px" :src=src()></iframe>
   </div>
    
</template>

<script>    
    export default {
        props:['address'],
        data(){
            return {
                url:process.env.MIX_APP_URL_API_GOOGLE_MAPS,
                key:process.env.MIX_APP_URL_KEY_API_GOOGLE
            } 
        },      
        methods:{
            src:function(){
                return  `${this.url}${this.address}&key=${this.key}`
               
               
            }
        },     
    }

   
</script>