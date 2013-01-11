$(document).ready(function(){
	$("#AfiliadoDepartamento").change(function(){
		       var key = $(this).val();
		       $.ajax({
                     url: root +'localidades/getLocalidades/'+key,            
                     error: function(jqXHR, textStatus, errorThrown){
                           alert( "Error en la busqueda de la localidad "+textStatus);
                     },
                     success: function(data) {                
                       var localidades = jQuery.parseJSON(data);
                       localidades = localidades.localidades;
                       //alert(localidades.length);
                       localidad = $("#AfiliadoLocalidad");
                       localidad.html("");
                       var options = "";
                       for (var i = 0; i < localidades.length; i++) {
                       	//alert(localidades[i]);
                         options += '<option value="' + localidades[i].Localidad.id + '">' + localidades[i].Localidad.nombre + '</option>';
                       }                       
                       localidad.html(options);
                       
                     }
                   }); 
	})
});