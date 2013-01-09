    <fieldset>  
        <legend><?php echo $title?> </legend>  
        <table class="full">
             <tbody>
               <tr >
                 <td class="right with-4">Nombre:</td>
                 <td class="last left">
                     <?php echo $this->form->input('nombre',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td class="right">Teléfono Particular:</td>
                 <td class="last left">
                     <?php echo $this->form->input('telefono_particular',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td class="right">Teléfono Celular:</td>
                 <td class="last left">
                     <?php echo $this->form->input('telefono_celular',    array('label'=> false,'type'=>'text', 'size'=>30,  'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr >
                 <td class="right">Email:</td>
                 <td class="last left">
                     <?php echo $this->form->input('email',    array('label'=> false,'type'=>'text', 'size'=>30,  'div' => array('tag' => '')));?>
                 </td>
               </tr>
               
                <tr>
                 <td colspan="2">
                   <hr />
                 </td>
               </tr>                
               
             </tbody>

           </table>
    </fieldset>  