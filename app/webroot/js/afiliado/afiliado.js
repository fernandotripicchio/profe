$(document).ready(function(){
	// Funciones para filtrar los afiliados
    $("#datepickerDesde" ).datepicker({
                  changeMonth: true,
                  changeYear: true,
                  dateformat: 'dd/mm/yy',
                  firstDay: 1
    });
    //$("#datepickerDesde" ).datepicker($.datepicker.regional['es']);
    	
	
	
	
	$("#buttonReset").on("click", function(){
       var form = $("#afiliadoSearchForm").attr("value");
       $("#submit_action").attr("value", "reset"); 
       
       // Submit the form
       form.submit();
	    return false;
	})
	

	$("#afiliadosFilterDepartamento").change(function(){
		var key = $(this).val();
		
		if (key != "") {
		//Obtengo las localidades
		$.ajax({
	         url: root +'localidades/getLocalidades/19/'+key+'/',            
	         error: function(jqXHR, textStatus, errorThrown){
	            alert( "Error en la busqueda de datos "+textStatus);
	         },
	         success: function(data) {  
	            var localidades = jQuery.parseJSON(data);
	            localidades = localidades.localidades;                       
	            optionsJson("afiliadosFilterLocalidades", localidades, "Seleccione una Localidad", "Localidad");
	         }
        });
                   
        //Obtengo los centros de ese departamento
		$.ajax({
	          url: root +'centros/getCentrosByDepartamento/'+key+'/',            
	          error: function(jqXHR, textStatus, errorThrown){
	              alert( "Error en la busqueda de datos "+textStatus);
	          },
	          success: function(data) {
	          	                
	              var centros = jQuery.parseJSON(data);
	              centros = centros.centros;
	              optionsJson("afiliadosFilterCentros", centros, "Seleccione un Centro", "Centro");
	          }
        });                   
       } else {
       	optionsJson("afiliadosFilterLocalidades", [], "Seleccione una Localidad", "Localidad");
       	optionsJson("afiliadosFilterCentros", [], "Seleccione un Centro", "Centro");       	
       }            
	});
	
	//Busca el centro y la loclidad y me trae todos los centros de esos dos parametros
    $("#afiliadosFilterLocalidades").change(function(){
		var localidad_id = $(this).val();
		var departamento_id = $("#afiliadosFilterDepartamento").val();
		if (localidad_id != "" ) {
				$.ajax({
		              url: root +'centros/getCentrosByDepartamentoLocalidad/' + departamento_id+ '/'+ localidad_id,            
		              error: function(jqXHR, textStatus, errorThrown){
		                   alert( "Error en la busqueda del centro "+textStatus);
		              },
		              success: function(data) {
		                   var centros = jQuery.parseJSON(data);
		                   centros = centros.centros;
		                   optionsJson("afiliadosFilterCentros", centros, "Seleccione un Centro", "Centro");
		              }
		        }); 
      } else  {
      	 if (departamento_id == "") {
      	    optionsJson("afiliadosFilterCentros", [], "Seleccione un Centro", "Centro");
      	 }  else {
				$.ajax({
			          url: root +'centros/getCentrosByDepartamento/'+key+'/',            
			          error: function(jqXHR, textStatus, errorThrown){
			              alert( "Error en la busqueda de datos "+textStatus);
			          },
			          success: function(data) {                
			              var centros = jQuery.parseJSON(data);
			              centros = centros.centros;
			              optionsJson("afiliadosFilterCentros", centros, "Seleccione un Centro", "Centro");
			          }
		        });                  
      	 }
      }
		
		
	});
	
});

optionsJson = function(selectID, elements, textSelect, objectName){
	var select_tag = $("#"+selectID);
	var options    = "";
	//Limpio el select
	select_tag.html("");
	//Asign empty value for the first element for the options
    options = "<option value='0'>"+ textSelect+"</option>";
     $.each(elements, function(i,row){     	
     	jsonObject = eval("elements[i]."+ objectName);
     	options += '<option value="' + jsonObject.id + '">' + jsonObject.nombre + '</option>';
      });    
    select_tag.html(options);
	
}
