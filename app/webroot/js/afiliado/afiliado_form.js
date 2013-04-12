$(document).ready(function(){
	$("#departamentoAfiliadoForm").change(function(){
		var key = $(this).val();
		
		if (key != "") {

		$.ajax({
	         url: root +'localidades/getLocalidades/19/'+key+'/',            
	         error: function(jqXHR, textStatus, errorThrown){
	            alert( "Error en la busqueda de datos "+textStatus);
	         },
	         success: function(data) {  
	            var localidades = jQuery.parseJSON(data);
	            localidades = localidades.localidades;                       
	            optionsJson("localidadesAfiliadoForm", localidades, "Seleccione una Localidad", "Localidad");
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
	              optionsJson("centrosAfiliadoForm", centros, "Seleccione un Centro", "Centro");
	          }
        });                   
       } else {
       	optionsJson("localidadesAfiliadoForm", [], "Seleccione una Localidad", "Localidad");
       	optionsJson("centrosAfiliadoForm", [], "Seleccione un Centro", "Centro");       	
       }            
		
	});
	
	
	//Busca el centro y la loclidad y me trae todos los centros de esos dos parametros
    $("#localidadesAfiliadoForm").change(function(){
		var localidad_id = $(this).val();
		var departamento_id = $("#departamentoAfiliadoForm").val();
		if (localidad_id != "" ) {
				$.ajax({
		              url: root +'centros/getCentrosByDepartamentoLocalidad/' + departamento_id+ '/'+ localidad_id,            
		              error: function(jqXHR, textStatus, errorThrown){
		                   alert( "Error en la busqueda del centro "+textStatus);
		              },
		              success: function(data) {
		                   var centros = jQuery.parseJSON(data);
		                   centros = centros.centros;
		                   optionsJson("centrosAfiliadoForm", centros, "Seleccione un Centro", "Centro");
		              }
		        }); 
      } else  {
      	 if (departamento_id == "") {
      	    optionsJson("centrosAfiliadoForm", [], "Seleccione un Centro", "Centro");
      	 }  else {
				$.ajax({
			          url: root +'centros/getCentrosByDepartamento/'+key+'/',            
			          error: function(jqXHR, textStatus, errorThrown){
			              alert( "Error en la busqueda de datos "+textStatus);
			          },
			          success: function(data) {                
			              var centros = jQuery.parseJSON(data);
			              centros = centros.centros;
			              optionsJson("centrosAfiliadoForm", centros, "Seleccione un Centro", "Centro");
			          }
		        });                  
      	 }
      }
		
		
	});	
});
	