<?//echo $this->Html->script('login');?>
<div>
  
  <div class="login">
    <h2>Ingreso al Sistema</h2>
    
    <?=$this->Form->create('Usuario'); ?>
    <fieldset>
      	
      <table>
      	<tr>
      		<td colspan="2">
      			<h3>  Login  - Ingrese Email y Contraseña </h3>
      		</td>
      	</tr>
        <tr>
          <td class="span-3"> <strong><?=$this->Form->label("Email:") ?></strong></td>
          <td>
            <?=$this->Form->input('email', array('div' => array('tag' => 'div'),'size'=> '50','label' => false, 'class' => 'required ') ); ?>
          </td>
        </tr>
        <tr>
          <td colspan="2">
               &nbsp;
          </td>
        </tr>
        <tr>
          <td> <strong> <?=$this->Form->label("Password:") ?> </strong> </td>
          <td>
            <?=$this->Form->input('password', array('div' => array('tag' => 'div'),'type'=> 'password','size'=> '50', 'label' => false, 'class' => 'required' ) ); ?>
          </td>
        </tr>
        <tr>
          <td colspan="2">
               &nbsp;
          </td>
        </tr>
        <tr>
          <td colspan="2">
                <hr />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
             <?=$this->form->end('Ingresar');?>
          </td>
        </tr>
      </table>
     
      
    </fieldset>      
    

    </div>

</div>
