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
                 <td class="with-4 right">Fecha Inicio :</td>
                 <td class="left">
                     <?php echo $this->form->input('fecha',   array('label'=> false,'type'=>'text', 'size'=>30, 'id' => "datepickerDesde", 'div' => array('tag' => '')));?>
                 </td>
               </tr>               

             
               
               <tr >
                 <td class="with-4 right">Prestación :</td>
                 <td class="left">
                     <?php echo $this->form->select('nombre', $prestaciones, array("class" => "",   "empty" => "Seleccione una Prestación")) ?>                 
                 </td>
               </tr>
               <tr >
                 <td class="with-4 right">Prestador :</td>
                 <td class="left">
                     <?php echo $this->form->select('prestador_id', $prestadores, array("class" => "",   "empty" => "Seleccione un Prestador")) ?>
                  </td>
               </tr>

             </tbody>
           </table>
    </fieldset>  