<template>

    <div class="modal fade" v-bind:id="name">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form role="form" method="POST" v-bind:action="action" v-if="action">   
                    <div class="modal-header">
                        <h4>{{alert}}</h4>                              
                    </div>
                    <div class="modal-body">                    
                       <slot></slot>
                    </div>   
                    <div class="modal-footer justify-content-between">       
                        <button type="button" class="btn btn-default " data-dismiss="modal">Fechar</button>
                        <button type="submit" :class="type" v-if="method">{{textButton}}</button>  
                    </div>            
                </form >
            </div>         
        </div>        
   </div>


</template>
  
         
        
<script>
    export default {
     props:['name','alert','action','token','method'],  
     computed:{
        type() {            
            
                if(this.method == 'SUCCESS'){return `btn btn-success`}
                else if(this.method == 'DELETE'){return`btn btn-danger`}
        },    
        textButton(){
                if(this.method == 'SUCCESS'){return `Salvar`}
                else if(this.method == 'DELETE'){return `Deletar`}
        }
      }
    }
     
</script>


