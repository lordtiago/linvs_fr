$(function($){
      $("#PersonCep").mask("99.999-999");
	  $("#PersonCpf").mask("999.999.999-99");
	  $("#PersonTel").mask("(0xx99)9999-9999");
	  $("#PersonCel").mask("(0xx99)9999-9999?9").focusout(function(event){
		  nonoDigito(event);
	  });
	  $("#PersonCel2").mask("(0xx99)9999-9999?9").focusout(function(event){
		  nonoDigito(event);
	  });
	  
  	$("#PersonFatherId").select2({allowClear: true});
  	$("#PersonFather2Id").select2({allowClear: true});	  
	$("#PersonSpouseId").select2({allowClear: true});	
	 
	  //Consulta CEP Webservice
      $("#PersonCep").focusout(function () {
      $("#PersonCep").cep({
          load: function () {
              //Exibe a div loading
              $("#loading").show();
          },
          complete: function () {
              //Esconde a div loading
              $("#loading").hide();
          },
          error: function (msg) {
              //Exibe em alert a mensagem de erro retornada
              alert(msg);
          },
          success: function (data) {
              $("#PersonStreet").val(data.tipoLogradouro + " " + data.logradouro);
			  $("#PersonNumber").val(" Nº ");
			  $("#PersonDistrict").val(data.bairro);
              $("#PersonCity").val(data.cidade);
              $("#PersonUf").val(data.estado);
			  $("#PersonCountry").val("Brasil");
          }
      });
  });


	$("#PersonParishId").change(function(){
		if(parseInt($(this).val()) >= 1 ){
			$("#person-container").css("display","block");
		}else{
			$("#person-container").css("display","none");
		}
	});

	$(".createPerson").on('hidden.bs.modal', function (e) {
        // Envia o formulário via Ajax
        $.ajax({
                type: "GET",
                url: webroot+'people/toList',
                success: function(json){
                    $("#PersonFatherId").empty();
					$("#PersonFather2Id").empty();
					$("#PersonSpouseId").empty();
                    var result = jQuery.parseJSON(json);
                    //percorre a lista de resultados
                     $.each(result, function(key, val) {
                           //cria um link
                            var a = document.createElement("option");

                            a.setAttribute("title", key);
                            a.setAttribute("value", val);

                            a.innerHTML = key;

                            $("#PersonFatherId").append($(a).clone());
							$("#PersonFather2Id").append($(a).clone());
							$("#PersonSpouseId").append(a);
                      });
                }
        }); 
	});
	
	function nonoDigito(event){
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if(phone.length > 11) {
            element.mask("(0xx99)99999-999?9");
        } else {
            element.mask("(0xx99)9999-9999?9");
        }	
	}
	
	$("#PersonAddForm input:text, #PersonAddForm textarea").first().focus();
	$("#PersonEditForm input:text, #PersonEditForm textarea").first().focus();
});
