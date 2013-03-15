$(document).ready(function(){
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
	
	
	$("#AfiliadoLocalidadId").change(function(){
		       var key = $(this).val();
		       $.ajax({
                     url: root +'centros/getCentros/'+key,            
                     error: function(jqXHR, textStatus, errorThrown){
                           alert( "Error en la busqueda del centro "+textStatus);
                     },
                     beforeSend: function(data){
                     	//alert("anda");
                     	$("#AfiliadoCentroId").html("");
                     },
                     success: function(data) {                
                       var centros = jQuery.parseJSON(data);
                       centros = centros.centros;
                       //alert(localidades.length);
                       centro = $("#AfiliadoCentroId");
                       centro.html("");
                       var options = "<option>Seleccione un Centro</option>";
                       
                       for (var i = 0; i < centros.length; i++) {
                       	//alert(localidades[i]);
                         options += '<option value="' + centros[i].Centro.id + '">' + centros[i].Centro.nombre + '</option>';
                       }                       
                       centro.html(options);
                       
                     }
                   }); 
		
	})
});