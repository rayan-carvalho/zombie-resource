
<template>
    <div class="table-responsive table-sm-bordered">
        <table class="table table-sm table-striped" id="table"  >
            <thead>
                <tr>
                    <th v-for="(title, index) in titles" :key="index">{{title}}</th>
                    <th v-if="url">Detalhes</th>
                </tr>
            </thead>
       
            <tbody>
                <tr v-for="(record, index) in JSON.parse(this.records)" :key="index">
                    <td  v-for="(item,index) in record" :key="index">{{ item }} <span class="badge badge-secondary" v-if="!item">Não Informado.</span></td>
                    <td v-if="url">
                        <a class="btn btn-outline-info btn-sm" :href="url+record.id"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
props:['titles','url','model','order','records'],      
    mounted(){
    $(function() {$('#table').DataTable({
    "oLanguage": {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ Mostrar",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Buscar",
        "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
        },
    },
    order: [[ 0, this.order ]],
    destroy: true});
    });         
  }
}
</script>
