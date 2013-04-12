    <fieldset>  
        <legend><?=$title?> </legend> 
        <?php echo $this->form->input('afiliado_id',    array('label'=> false,'type'=>'hidden', 'value' => $afiliado["Afiliado"]["id"]));?> 
        <table class="full">
             <tbody>
               <tr >
                 <td class="with-4 right">Afiliado Nombre:</td>
                 <td class="left">
                     <?php echo $afiliado["Afiliado"]["nombre"]; ?>
                 </td>
               </tr>
               <tr >
                 <td class="with-4 right">Afiliado Documento :</td>
                 <td class="left">
                     <?php echo $afiliado["Afiliado"]["documento"]; ?>
                 </td>
               </tr>
               
               <tr >
                 <td class="with-4 right">Diagnostico :</td>
                 <td class="left">
                     <?php echo $this->form->select('diagnostico_id', $diagnosticos, array("class" => "",   "empty" => "Seleccione un Diagnostico")) ?>                 
                 </td>
               </tr>

             </tbody>
           </table>
    </fieldset>  