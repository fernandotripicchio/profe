$(document).ready(function(){
	
	//Funciones para asiganar un centro a un afiliado en la pagina de edicion
	$("#AfiliadoDepartamento").change(function(){
		       var key = $(this).val();
		       var key_provincia = 19;
		       $.ajax({
                     url: root +'localidades/getLocalidades/'+key_provincia+"/"+key,            
                     error: function(jqXHR, textStatus, errorThrown){
                           alert( "Error en la busqueda de la localidad "+textStatus);
                     },
                     beforeSend: function(data){
                     	//alert("anda");
                     	$("#AfiliadoLocalidadId").html("");
                     },
                     success: function(data) {                
                       var localidades = jQuery.parseJSON(data);
                       localidades = localidades.localidades;
                       //alert(localidades.length);
                       localidad = $("#AfiliadoLocalidadId");
                       localidad.html("");
                       var options = "<option>Seleccione una Localidad</option>";
                       
                       for (var i = 0; i < localidades.length; i++) {
                       	//alert(localidades[i]);
                         options += '<option value="' + localidades[i].Localidad.id + '">' + localidades[i].Localidad.nombre + '</option>';
                       }                       
                       localidad.html(options);
                       
                     }
                   }); 
	})
	
	// Funciones para filtrar los afiliados
	
	$("#afiliadosFilterDepartamento").change(function(){
		var key = $(this).val();
		             //Obtengo las localidades
				     $.ajax({
	                     url: root +'localidades/getLocalidades/19/'+key+'/',            
	                     error: function(jqXHR, textStatus, errorThrown){
	                           alert( "Error en la busqueda de datos "+textStatus);
	                     },
	                     beforeSend: function(data){
	                     	$("#afiliadosFilterLocalidades").html("");
	                     },
	                     success: function(data) {  
	                     	console.log(data);              
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
                   
	});
	
	//Busca el centro y la loclidad y me trae todos los centros de esos dos parametros
    $("#afiliadosFilterLocalidades").change(function(){
		       var localidad_id = $(this).val();
		       var departamento_id = $("#afiliadosFilterDepartamento").val();
		       $.ajax({
                     url: root +'centros/getCentrosByDepartamentoLocalidad/' + departamento_id+ '/'+ localidad_id,            
                     error: function(jqXHR, textStatus, errorThrown){
                           alert( "Error en la busqueda del centro "+textStatus);
                     },
                     beforeSend: function(data){
                     	$("#AfiliadoCentroId").html("");
                     },
                     success: function(data) {
                       var centros = jQuery.parseJSON(data);
                       centros = centros.centros;
                       optionsJson("afiliadosFilterCentros", centros, "Seleccione un Centro", "Centro");
                     	                
                     }
                   }); 
		
		
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
