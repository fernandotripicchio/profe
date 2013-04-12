    <fieldset>  
        <legend><?=$title?> </legend>  
        <table class="full">
             <tbody>
               <tr >
                 <td class="with-4 right">Nombre:</td>
                 <td class="left">
                     <?=$this->form->input('nombre',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td class="with-4 right">Documento:</td>
                 <td class="left">
                     <?=$this->form->input('documento',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>               
               <tr >
                 <td class="with-4 right">Empresa:</td>
                 <td class="left">
                     <?=$this->form->input('empresa',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               
               <tr >
                 <td class="with-4 right">Télefono:</td>
                 <td class="left">
                     <?=$this->form->input('telefono',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td class="with-4 right">Email:</td>
                 <td class="left">
                     <?=$this->form->input('email',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'email', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               
               
               <tr >
                 <td class="with-4 right">Observaciones:</td>
                 <td class="left">
                     <?=$this->form->input('observaciones',    array('label'=> false, 'div' => array('tag' => '')));?>
                 </td>
               </tr>

             </tbody>
           </table>
    </fieldset>  