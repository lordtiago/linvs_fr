/*
    *Save Partial jQuery Plugin
    *Este plugin salva dados no database via ajax e retorna ao cliente um select populado.
    * By Tiago A. Rafael
    * lordtiago [at] gmail [dot] com
    * Version: 1.0
    * Release: 2011-11-29
 */
(function($) {
        /*O método do plugin deverá receber como parâmetro o id do campo nome, o id do campo select que deverá receber
         * os options, a url responsável por salvar os dados e retornar a consulta em json, e um boolean true para
         * o caso do formulário estiver usando o plugin de jqueryui como modal*/
	$.fn.savePartial = function(nameField, selectField, actionUrl,modal,form) {
                      $(this).submit(function(){
                              //save(this);
                              var name_dados = $(nameField).val();
                            alert(this.action);
                            var data = jQuery(this).serialize(); // Dados do formulário
                            alert(data);
                            $.ajax({
                                    type: "POST",
                                    url: 'this.action',
                                    data: data,
                                    success: function(json){
                                                    $(selectField).empty();
                                                    var prod = jQuery.parseJSON(json);
                                                        //percorre a lista de resultados
                                                         $.each(prod, function(key, val) {
                                                              //cria um link
                                                                var a = document.createElement("option");

                                                                a.setAttribute("title", val);
                                                                a.setAttribute("value", key);

                                                                a.innerHTML = val;
                                                                $(selectField).append(a);

                                                          })
                                                          $(selectField+" option:selected").removeAttr("selected");
                                                          $(selectField+" option[title= "+name_dados+"]").attr("selected", "selected");
                                    }
                            });

                            $(nameField).val("");
                            if(modal){
                                form.dialog( "close" );
                            }
                              return false; // Previne o form de ser enviado pela forma normal
                      });
                    function save(f) {
                            
                    }
                }
	}
)(jQuery);