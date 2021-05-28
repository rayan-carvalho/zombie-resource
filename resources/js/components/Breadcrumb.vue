<template>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ title }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">            
          <li v-for="item in list" :key="item.id" class="breadcrumb-item">
            <a v-if="item.url" v-bind:class="defineClass" v-bind:href="item.url">{{item.title}}</a>
            <span v-if="!item.url">{{item.title}}</span>
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>

</template>
        
<script>
    export default {
      props:['list','title'],
      computed:{
        defineClass: function(){
          if(this.url){
            return "active";
          }else{
            return "";
          }
        }
      }
    }
</script>