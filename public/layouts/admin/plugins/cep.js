
   
$(document).ready(function () {

    function limpa_cep() {
      // Limpa valores do formulário de cep.
      $("#street").val("");
      $("#district").val("");
      $("#city").val("");
      $("#uf").val("");
    }
    //Quando o campo cep perde o foco.
    $("#cep").blur(function () {
    //Nova variável "cep" somente com dígitos.
    var cep = $(this).val().replace(/\D/g, '');
    //Verifica se campo cep possui valor informado.
    if (cep != "") {
    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;
    //Valida o formato do CEP.
    if (validacep.test(cep)) {
      //Preenche os campos com "..." enquanto consulta webservice.
      $("#street").val("Aguarde..");
      $("#district").val("Aguarde..");
      $("#city").val("Aguarde..");
      $("#uf").val("Aguarde..");
      //Consulta o webservice viacep.com.br/
      $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
        if (!("erro" in dados)) {
          //Atualiza os campos com os valores da consulta.
          $("#street").val(dados.logradouro);
          $("#district").val(dados.bairro);
          $("#city").val(dados.localidade);
          $("#uf").val(dados.uf);
        } //end if.
        else {
          //CEP pesquisado não foi encontrado.
          limpa_cep();
          alert("CEP NÃO ENCONTRADO!");
        }
      });
    } //end if.
    else {
      //cep é inválido.
      limpa_cep();
      alert("FORMATO DE CEP INVÁLIDO");
    }
    } //end if.
    else {
      //cep sem valor, limpa formulário.
      limpa_cep();
    }
    });
  });
  
   function CEP(cep) {
     
      if(cep.value.length == 5)
      cep.value = cep.value + '-';
  }
  
  
  function Mobile(whatsapp) {
  
      if(whatsapp.value.length == 0)                
          whatsapp.value = '(' + whatsapp.value;        
      if(whatsapp.value.length == 3)
          whatsapp.value = whatsapp.value + ')';
      if(whatsapp.value.length == 5)
          whatsapp.value = whatsapp.value + ' ';  
      if(whatsapp.value.length == 10)
          whatsapp.value = whatsapp.value + '-';
  }
  
  function Phone(phone) {
  
      if(phone.value.length == 0)                
          phone.value = '(' + phone.value;          
      if(phone.value.length == 3)
          phone.value = phone.value + ')';
      if(phone.value.length == 8)
          phone.value = phone.value + '-';
  }