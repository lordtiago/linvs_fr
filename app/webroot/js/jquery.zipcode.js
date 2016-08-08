/* 
    *Formata Moeda jQuery Plugin
    *Este plugin tem por objetivo converter formatos de moeda para numéricos, antes do valor ser inserido no banco de dados.
    * By Tiago A. Rafael
    * lordtiago [at] gmail [dot] com
    * Version: 1.0
    * Release: 2011-11-09
 */
(function($) {
    //cache results
	var cache = {};

	// default configuration options
	var defaultOptions = {
		load: function () { },
		complete: function () { },
		success: function (endereco) { },
		error: function (msg) { }
	};
    
        $.cep = function ( cep, options ) {
		
            var settings = $.extend({}, defaultOptions, options);

            cep = cep.replace(/[^0-9]+/g, '');
            cep = $.trim(cep);

            if (cep in cache) {
                settings.success(cache[cep]);
                return;
            }

            settings.load();
            
            var geocoder = new google.maps.Geocoder();
            var latlng = 0;
            var data = new Object();
            geocoder.geocode({ 'address': cep }, function(results, status){
                settings.complete();
                var result = results[0].address_components;
                latlng = results[0].geometry.location;
                
                $(result).each(function(index, element){
                    $(element.types).each(function(i, e){
                        if(e == 'country'){
                            data.pais = element.long_name
                        }
                        if(e == 'administrative_area_level_1'){
                            data.estado = element.long_name;
                        }
                        if(e == 'administrative_area_level_2'){
                            data.cidade = element.long_name;
                        }
                        if(e == 'sublocality_level_1'){
                            data.bairro = element.long_name;
                        }
                        
                    });
                });
                
                $.post('http://maps.googleapis.com/maps/api/geocode/json?latlng=' + latlng.lat() + ',' + latlng.lng(), function (results) {
                    var result = results.results[0].address_components;
                    $(result).each(function(index, element){
                        $(element.types).each(function(i, e){
                            if(e == 'route'){
                                data.rua = element.long_name;
                            }                        
                        });
                    });
                    
                    console.log(data);
                    cache[cep] = data;
                    settings.success(data);
                    
                }); 
            });
    };
    
	$.fn.cep = function(options) {
        $(this).each(function(){
              $.cep($(this).val(), options);	
        });

    }    
    
}
)(jQuery);