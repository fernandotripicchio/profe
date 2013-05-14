<fieldset>
    <?php echo $this->form->input('afiliado_id', array('label'=> false,'type'=>'hidden', 'value' => $afiliado["id"] )); ?>	  
    <legend><?=$title?> </legend>
    
    <!-- Tabla de Afiliados -->  
    <table>
        <caption>Afiliado</caption>
        <? if ($nuevo_expediente) { ?>
	       	<tr>
	           <td class="right">Buscar:</td>
	           <td class="left">
	              <?php echo $this->form->input('buscar_afiliado',    array('label'=> false,'type'=>'text', 'size'=>10,'id' =>'afiliado_key', 'div' => array('tag' => '')));?>
	              <input type="button" name="buscarAfiliado" value="Buscar" id="buttonAfiliadoBuscar">
	           </td>
	       	</tr>
       	<? }  ?>
        <tr>
           <td class="right with-3">Nombre:</td>
           <td class="left">
              <?php echo $this->form->input('afiliado_nomnbre',    array('label'=> false, 'value' => $afiliado["nombre"],'readonly' => true,'type'=>'text', 'size'=>50, 'class' => 'required', 'div' => array('tag' => '')));?>
           </td>
       	</tr>
        <tr>
          <td class="right">Documento:</td>
          <td class="left">
              <?php echo $this->form->input('afiliado_documento',    array('label'=> false,'value' => $afiliado["documento"] ,'readonly' => true,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
          </td>
        </tr>
        <tr>
          <td class="right">Clave:</td>
          <td class="left">
              <?php echo $this->form->input('afiliado_clave',    array('label'=> false, 'value' => $afiliado["nro_pension"], 'readonly' => true,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
          </td>
        </tr>
    </table>
        
    <!-- Tabla de Expedientes -->    
    <div id="afiliadoExpedienteDiv" style="display: <?php echo ( empty($afiliado["id" ]) ? "none" : "") ?>">
		    <table>
		      	<caption>Expediente </caption>
                <? if (!$nuevo_expediente) { ?>		      	
		       	     <tr>
		           		<td class="right">Expediente ID:</td>
		           		<td class="left">
		              		<?php echo $expediente["Expediente"]["id"]; ?>
		           		</td>
		       	    </tr>	
	       	    <? } ?>	      	
		        <tr>
		           <td class="right with-3">Fecha Inicio:</td>
		           <td class="left">
		             <?php echo $this->form->input('fecha_inicio', array('label'=> false,'type'=>'text', 'size'=>10, 'value' => $this->Time->format('d/m/Y', $fecha_inicio ),'class' => 'required', 'div' => array('tag' => '')));?>
		           </td>
		        </tr>
		        <tr>
		           <td class="right">Tipo:</td>
		           <td class="left">
		              <?php echo $this->form->input('tipo_expediente_id', array('label' => false,'legend' => false ,'type' => 'radio', 'options' => $tipos_expedientes, 'div' => array('tag' => '')  )  ); ?>                               
		           </td>
		        </tr>                 
		        
		        <tr>
		           <td class="right">Urgente:</td>
		           <td class="left">
		              <?php echo $this->form->input('urgente', array('label' => false,'legend' => false ,'type' => 'radio', 'options' => array('0'=>'No Urgente','1'=>'Urgente'), 'div' => array('tag' => '')  )  ); ?>                               
		           </td>
		        </tr>                 
		        <tr>
		           <td colspan="2">  <hr /> </td>
		        </tr>

		    </table>
		    
		    <? if (!$nuevo_expediente) { ?>
				    <table>
				       <caption>Archivos </caption>
				 	   <tr>
						  <td class="text-align-left">
						 		<?php echo $this->Upload->edit('Expediente', $afiliado['id'], false); ?>
						  </td>
					   </tr>         			
				    </table>
		    <? } ?>
		    <!--
		    <table>
		        <tr>
		           <td  style="text-align: center">
		                     <?php echo $this->html->link('Volver','/expedientes/', array('class' => 'button left'));?>		           	
		                     <?php echo $this->form->submit("Guardar" , array('div' => false, 'id' => 'buttonGuardarExpediente', 'class' => 'button left' ) )?>
		           </td>
		        </tr>
		    </table>  
		    -->  
    </div>
    <div id="afiliadoExpedienteEmptyDiv" style="display: <?php echo ( empty($afiliado["id" ]) ? "" : "none") ?>">
    	<table>
    		<tr>
    			<td>
    				<h3 id="noExisteAfiliado">Debe seleccionar un Afiliado</h3>
    			</td>
    		</tr>
    	</table>
    	
    </div>
</fieldset>  