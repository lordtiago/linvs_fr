$(function($){	  
  	$("#TithePersonId").select2({allowClear: true});
	
    $("#TitheValue").priceFormat({
    	prefix: "R$ ",
    	centsSeparator: ",",
    	thousandsSeparator: "."
    });
	
    $("#TitheAddForm").formataMoeda({
    	args: new Array($("#TitheValue"))
    });
	
    $("#TitheEditForm").formataMoeda({
    	args: new Array($("#TitheValue"))
    });
	
	$("#TitheAddForm input:text, #TitheAddForm textarea").first().focus();
	$("#TitheEditForm input:text, #TitheEditForm textarea").first().focus();
		
});