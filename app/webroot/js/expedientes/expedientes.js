$(document).ready(function(){
	
    $("#ExpedienteFechaInicio" ).datepicker({
                  changeMonth: true,
                  changeYear: true,
                  dateformat: 'dd/mm/yy',
                  firstDay: 1
    });
    $("#ExpedienteFechaInicio" ).datepicker($.datepicker.regional['es']);
   
    	
	$("#buttonAfiliadoBuscar").on("click", function() {
		var key = $("#afiliado_key").val();
		if ( key != ""){
			$.ajax({
		         url: root +'afiliados/getAfiliado/'+key,            
		         error: function(jqXHR, textStatus, errorThrown){
		            alert( "Error en la busqueda de datos "+textStatus);
		         },
		         success: function(data) {  
		            var afiliado = jQuery.parseJSON(data);
		            afiliado = afiliado.afiliado;                   
                    if ( typeof afiliado.Afiliado == 'undefined' ) {
                     	 $("#noExisteAfiliado").html("<span class='baja'>No existe el afiliado</span>");
		                 setField( "#ExpedienteAfiliadoNomnbre", "" ) ;
		                 setField( "#ExpedienteAfiliadoDocumento", "" ) ;
		                 setField( "#ExpedienteAfiliadoClave", "" ) ;
		                 setField( "#ExpedienteAfiliadoId", "");		            	
                     	 $("#afiliadoExpedienteDiv").hide("slow");
                         $("#afiliadoExpedienteEmptyDiv").show();                     	 
	                } else {
	                	 $("#noExisteAfiliado").html("Debe seleccionar un Afiliado");
	                	 setField( "#ExpedienteAfiliadoId", afiliado.Afiliado.id);
		                 setField( "#ExpedienteAfiliadoNomnbre", afiliado.Afiliado.nombre ) ;
		                 setField( "#ExpedienteAfiliadoDocumento", afiliado.Afiliado.documento ) ;		
		                 setField( "#ExpedienteAfiliadoClave", clave ( afiliado.Afiliado ) ) ;
		                 $("#afiliadoExpedienteDiv").show("slow");
		                 $("#afiliadoExpedienteEmptyDiv").hide();     
		                        	
		            }
		         }
	        });
			
		}
	} );
	
    $("#buttonResetExpedientes").on("click", function(){
    	
       var form = $("#expedienteSearchForm");
       $("#submit_action").attr("value", "reset");
       // Submit the form
       form.submit();
	   return false;
	})
	
});


function clave(afiliado) {
  var nro_pension = "";
  nro_pension = afiliado.clave_excaja + "-" + afiliado.clave_tipo + "-"+ afiliado.clave_numero + "-" + afiliado.clave_coparticipe + "-" + afiliado.clave_parentezco; 
  return nro_pension;	
}

function setField(field_id, value) {
	$(field_id).attr("value", value);
}
