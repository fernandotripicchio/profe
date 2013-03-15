<div class="container">
	
	<?php echo $this->Form->create('Afiliado', array('action' => 'bajas','type' => 'file')); ?>
	
	<table>
		<tr>
			<td>
	           <?php echo $this->form->input("field", array('type' => 'file', 'label' => false)); ?>			
			</td>
			<td>
	           <input type="submit" name="Procesar" value="Procesar Bajas Afiliados">			
			</td>
		</tr>
		<tr>
			<td colspan="2">
				Se han importado <?=$cantidad_afiliados?> afiliados
			</td>
		</tr>
	</table>	
	
	
	</form>
</div>