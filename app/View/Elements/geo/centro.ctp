<select name="data[centros]" id="afiliadosFilterCentros" class="select-filter-afiliados">
    <option value="">Seleccione un Centro</option>
            <?php foreach($centros as $key=>$value) { ?>
                                   <option value="<?=$key?>" <?=(($afiliadosSession["centros"] == $key) ? "selected": "")?>><?=$value?></option>                             	
                             <?php } ?>
</select>	