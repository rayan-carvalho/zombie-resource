<template>

  <div :class=classSize>
        <div class="card">
            <div v-if="title" class="card-header">
                <h5 class="card-title">{{ title }}</h5> 
            </div>      
             <div v-if="url" class="card-body">
                <a class="btn btn-outline-info float-left" :href=url data-toggle="tooltip" data-placement="right" title="Novo(a)"><i class="fa fa-plus"></i></a>
            </div> 
            <div class="card-body">
                 <slot></slot>
            </div>
        </div>
    </div>

</template>
        
<script>
    export default {
      props:['size','title','url'],
      data() {
        return {
                classSize: `col-md-${this.size}`,
               
            } 
      }
    }
</script>