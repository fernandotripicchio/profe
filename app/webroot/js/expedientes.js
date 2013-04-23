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
                     	 alert("No existe el afiliado");
		                 setField( "#ExpedienteAfiliadoNomnbre", "" ) ;
		                 setField( "#ExpedienteAfiliadoDocumento", "" ) ;
		                 setField( "#ExpedienteAfiliadoClave", "" ) ;
		                 setField( "#ExpedienteAfiliadoId", "");		            	
                     	 
	                } else {
	                	 setField( "#ExpedienteAfiliadoId", afiliado.Afiliado.id);
		                 setField( "#ExpedienteAfiliadoNomnbre", afiliado.Afiliado.nombre ) ;
		                 setField( "#ExpedienteAfiliadoDocumento", afiliado.Afiliado.documento ) ;		
		                 setField( "#ExpedienteAfiliadoClave", clave ( afiliado.Afiliado ) ) ;            	
		            }
		         }
	        });
			
		}
	} );
	
});


function clave(afiliado) {
  var nro_pension = "";
  nro_pension = afiliado.clave_excaja + "-" + afiliado.clave_tipo + "-"+ afiliado.clave_numero + "-" + afiliado.clave_coparticipe + "-" + afiliado.clave_parentezco; 
  return nro_pension;	
}

function setField(field_id, value) {
	$(field_id).attr("value", value);
}
