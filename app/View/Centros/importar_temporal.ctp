<div class="container">
	
	<?php echo $this->Form->create('Centro', array('action' => 'importar_temporal','type' => 'file')); ?>
	
	<table>
		<tr>
			<td>
	           <?php echo $this->form->input("field", array('type' => 'file', 'label' => false)); ?>			
			</td>
			<td>
	           <input type="submit" name="Procesar" value="Procesar Centros">			
			</td>
		</tr>
		<tr>
			<td colspan="2">
				Se han importado <?=$cantidad_centros ?> centros
			</td>
		</tr>
	</table>	
	
	
	</form>
</div>