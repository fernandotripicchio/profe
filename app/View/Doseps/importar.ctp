<div class="container">
	
	<?php echo $this->Form->create('Dosep', array('action' => 'importar','type' => 'file')); ?>
	
	<table>
		<tr>
			<td>
	           <?php echo $this->form->input("field", array('type' => 'file', 'label' => false)); ?>			
			</td>
			<td>
	           <input type="submit" name="Procesar" value="Procesar Dosep">			
			</td>
		</tr>
		<tr>
			<td colspan="2">
				Se han importado <?=$cantidad_afiliados ?> afiliados
			</td>
		</tr>
	</table>	
	
	
	</form>
</div>