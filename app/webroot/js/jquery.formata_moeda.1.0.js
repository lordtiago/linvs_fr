/* 
    *Formata Moeda jQuery Plugin
    *Este plugin tem por objetivo converter formatos de moeda para numéricos, antes do valor ser inserido no banco de dados.
    * By Tiago A. Rafael
    * lordtiago [at] gmail [dot] com
    * Version: 1.0
    * Release: 2011-11-09
 */
(function($) {
	$.fn.formataMoeda = function(settings) {
                $(this).each(function(){
                      $(this).submit(function(){
                              format();
                      });
                });
                    function format() {
                            var array = settings.args;
                            $.each(array, function( intIndex, objValue ){
                                var valor = objValue.val();
                                  valor = valor.replace('.', '');
                                  valor = valor.replace(',', '.');
                                  valor = valor.replace('R$ ', '');
                                  objValue.val(valor);
                            }
                        );
                    }
                }
	}
)(jQuery);