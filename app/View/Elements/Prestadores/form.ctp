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
                 <td>Télefono:</td>
                 <td class="last">
                     <?=$this->form->input('telefono',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td>Email:</td>
                 <td class="last">
                     <?=$this->form->input('email',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'email', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               
               
               <tr >
                 <td>Observaciones:</td>
                 <td class="last">
                     <?=$this->form->input('observaciones',    array('label'=> false, 'div' => array('tag' => '')));?>
                 </td>
               </tr>

             </tbody>
           </table>
    </fieldset>  