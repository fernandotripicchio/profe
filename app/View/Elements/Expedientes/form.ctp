<?php echo $this->form->input('afiliado_id',    array('label'=> false,'type'=>'hidden', 'value' => $afiliado["id"] ));?> 
<fieldset>  
        <legend><?=$title?> </legend>  
        <table class="span-17">
        		<caption>
			      Afiliado
   		       </caption>
   		       
             	<tr>
             		<td>Buscar Afiliado</td>
             		<td>
                        <?=$this->form->input('buscar_afiliado',    array('label'=> false,'type'=>'text', 'size'=>30,'id' =>'afiliado_key', 'div' => array('tag' => '')));?>
                        <input type="button" name="buscarAfiliado" value="Buscar" id="buttonAfiliadoBuscar">
             	   </td>
             	</tr>
             	
             	<tr>
             		<td>Nombre:</td>
             		<td>
                        <?=$this->form->input('afiliado_nomnbre',    array('label'=> false, 'value' => $afiliado["nombre"],'readonly' => true,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
             	   </td>
             	</tr>
             	
             	<tr>
             		<td>Documento:</td>
             		<td>
                        <?=$this->form->input('afiliado_documento',    array('label'=> false,'value' => $afiliado["documento"] ,'readonly' => true,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
             	   </td>
             	</tr>
             	
             	<tr>
             		<td>Clave:</td>
             		<td>
                        <?=$this->form->input('afiliado_clave',    array('label'=> false, 'value' => $afiliado["nro_pension"], 'readonly' => true,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
             	   </td>
             	</tr>
        </table>
        
        <table class="span-17">
             <tbody>
             	<caption>	Expediente		</caption>
               <tr>
                 <td>Fecha Inicio:</td>
                 <td class="last">
                    <?php echo $this->form->input('fecha_inicio', array('label'=> false,'type'=>'text', 'size'=>30, 'value' => $fecha_inicio,'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               
               <tr >
                 <td>Urgente:</td>
                 <td>
                    <?php echo $this->form->input('urgente', array('label' => false,'legend' => false ,'type' => 'radio', 'options' => array('0'=>'No Urgente','1'=>'Urgente'), 'value' => 0, 'div' => array('tag' => '')  )  ); ?>                               
                 </td>
               </tr>                 

               <tr>
                 <td colspan="2">
                   <hr />
                 </td>
               </tr>
               
               <tr>
                 <td colspan="2" style="text-align: center">
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
                     <?=$this->html->link('Volver','/expedientes/', array('class' => 'button left'));?>
                 </td>
               </tr>
                
               
             </tbody>

           </table>
    </fieldset>  