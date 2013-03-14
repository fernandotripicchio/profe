    <fieldset>  
        <legend><?=$title?> </legend>  
        <table class="span-17">
             <tbody>
               <tr >
                 <td>Nombre:</td>
                 <td class="last">
                     <?=$this->form->input('nombre',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Direccion:</td>
                 <td class="last">
                     <?=$this->form->input('direccion',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Teléfonos:</td>
                 <td class="last">
                     <?=$this->form->input('telefonos',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'email', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Voz IP:</td>
                 <td class="last">
                     <?=$this->form->input('voz_ip', array('label'=>false, 'type'=>'password', 'size'=>30, 'class' => 'required', 'value' => "", 'id' => 'password', 'div' => array('tag' => '')));?>
                 </td>
               </tr>



               <tr>
                 <td colspan="2">
                   <hr />
                 </td>
               </tr>
               
               <tr>
                 <td colspan="2" style="text-align: center">
                     <?=$this->form->submit("Enviar" , array('div' => false,'class' => 'button left' ) )?>
                     <?=$this->html->link('Listado','/centros/', array('class' => 'button left'));?>
                 </td>
               </tr>
                
               
             </tbody>

           </table>
    </fieldset> 