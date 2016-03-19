<?php $this->load->view('header'); ?>

<div class="container-fluid" style="margin-top: 55px;">
	<div class="row">
		<div class="col-md-12 col-sm-12">

			<div class="panel panel-default">
				<div class="panel-heading">Просмотр агенства №<? echo $main->id ?></div>
				<div class="panel-body">
	


<form action="<? echo site_url("main/update_agency") ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
<fieldset>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Название:</label>  
	  <div class="col-md-4">
	  <input name="name" class="form-control input-md" type="text" value="<? echo $main->name ?>">
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">email:</label>  
	  <div class="col-md-4">
	  <input name="email" class="form-control input-md" type="text" value="<? echo $main->email ?>">
	  </div>
	</div>	

	<!-- File Button --> 
	<div class="form-group">
	  <label class="col-md-4 control-label" for="filebutton">Логотип:</label>
	  <div class="col-md-4">
	  	<? if($main->favicon) { 
	  		echo '<img src="'.base_url().'icons/'.$main->favicon.'" class="img-thumbnail" /><br><a href="'.site_url("main/del_img/".$main->id).'">Удалить картинку</a>'; } else { ?>
	    <input id="filebutton" name="file" class="input-file" type="file">
	    <? } ?>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">URL:</label>  
	  <div class="col-md-4">
	  <input name="url" class="form-control input-md" type="text" value="<? echo $main->url ?>">
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Год основания:</label>  
	  <div class="col-md-4">
		<select name="year" class="form-control">
			<option value=""></option>
			<?php
				for($i=1990; $i<=2017; $i++) {
					echo '<option value="'.$i.'" '.(($main->year==$i)?"selected":"").'>'.$i.'</option>';
				}
			?>
		</select>
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Месяц:</label>  
	  <div class="col-md-4">
		<select name="month" class="form-control">
			<option value=""></option>
			<?php
				for($i=1; $i<=12; $i++) {
					echo '<option value="'.$i.'" '.(($main->month==$i)?"selected":"").'>'.$i.'</option>';
				}
			?>
		</select>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Описание:</label>  
	  <div class="col-md-4">
	  	<textarea class="form-control" name="description" cols="30" rows="8"><? echo $main->description ?></textarea>
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Мин. бюджет:</label>  
	  <div class="col-md-4">
	  <input name="min_cost" class="form-control input-md" type="text" value="<? echo $main->min_cost ?>">
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">География гл.:</label>  
	  <div class="col-md-4">
		<select name="geography_chapter" class="form-control">
			<option value=""></option>
			<?php
				foreach ($city->result() as $row) {
					if($main->geography_chapter == $row->nazva) {
						echo '<option value="'.$row->nazva.'" selected>'.$row->nazva.'</option>';
					} else {
						echo '<option value="'.$row->nazva.'">'.$row->nazva.'</option>';
					}
				}
			?>
		</select>
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Офис доп.1.:</label>  
	  <div class="col-md-4">
		<select name="office1" class="form-control">
			<option value=""></option>
			<?php
				foreach ($city->result() as $row) {
					if($main->office1 == $row->nazva) {
						echo '<option value="'.$row->nazva.'" selected>'.$row->nazva.'</option>';
					} else {
						echo '<option value="'.$row->nazva.'">'.$row->nazva.'</option>';
					}
				}
			?>
		</select>	  
	  </div>
	</div>		

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Офис доп.2.:</label>  
	  <div class="col-md-4">
		<select name="office2" class="form-control">
			<option value=""></option>
			<?php
				foreach ($city->result() as $row) {
					if($main->office2 == $row->nazva) {
						echo '<option value="'.$row->nazva.'" selected>'.$row->nazva.'</option>';
					} else {
						echo '<option value="'.$row->nazva.'">'.$row->nazva.'</option>';
					}
				}
			?>
		</select>
	  </div>
	</div>		

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Офис доп.3.:</label>  
	  <div class="col-md-4">
		<select name="office3" class="form-control">
			<option value=""></option>
			<?php
				foreach ($city->result() as $row) {
					if($main->office3 == $row->nazva) {
						echo '<option value="'.$row->nazva.'" selected>'.$row->nazva.'</option>';
					} else {
						echo '<option value="'.$row->nazva.'">'.$row->nazva.'</option>';
					}
				}
			?>
		</select>
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Код карты:</label>  
	  <div class="col-md-4">
	  	<textarea class="form-control" name="map1" cols="30" rows="3"><? echo $main->map1 ?></textarea>
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Адресс:</label>  
	  <div class="col-md-4">
	  <input name="adress" class="form-control input-md" type="text" value="<? echo $main->adress ?>">
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Телефон:</label>  
	  <div class="col-md-4">
	  <input name="tel" class="form-control input-md" type="text" value="<? echo $main->tel ?>">
	  </div>
	</div>



<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Доп. опции:</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="checkboxes-0" style="margin-left: 10px;"><input name="seo" id="checkboxes-0" value="1" type="checkbox" <? if($main->seo == 1) echo "checked" ?>>СЕО</label>
    <label class="checkbox-inline" for="checkboxes-1"><input name="contact_marketing" id="checkboxes-1" value="1" type="checkbox" <? if($main->contact_marketing == 1) echo "checked" ?>>Контент-маркетинг</label>
    <label class="checkbox-inline" for="checkboxes-2"><input name="sites" id="checkboxes-2" value="1" type="checkbox" <? if($main->sites == 1) echo "checked" ?>>Создание сайтов</label>
    <label class="checkbox-inline" for="checkboxes-3"><input name="context" id="checkboxes-3" value="1" type="checkbox" <? if($main->context == 1) echo "checked" ?>>Контекст</label>
    <label class="checkbox-inline" for="checkboxes-4"><input name="price_place" id="checkboxes-4" value="1" type="checkbox" <? if($main->price_place == 1) echo "checked" ?>>Прайс-площадки</label>
    <label class="checkbox-inline" for="checkboxes-5"><input name="landing" id="checkboxes-5" value="1" type="checkbox" <? if($main->landing == 1) echo "checked" ?>>Лендинги</label>
    <label class="checkbox-inline" for="checkboxes-6"><input name="media" id="checkboxes-6" value="1" type="checkbox" <? if($main->media == 1) echo "checked" ?>>Медийка</label>
    <label class="checkbox-inline" for="checkboxes-7"><input name="conversion" id="checkboxes-7" value="1" type="checkbox" <? if($main->conversion == 1) echo "checked" ?>>Конверсия</label>
    <label class="checkbox-inline" for="checkboxes-8"><input name="offlain_rekl" id="checkboxes-8" value="1" type="checkbox" <? if($main->offlain_rekl == 1) echo "checked" ?>>Оффлайн-реклама</label>
    <label class="checkbox-inline" for="checkboxes-9"><input name="smm" id="checkboxes-9" value="1" type="checkbox" <? if($main->smm == 1) echo "checked" ?>>SMM</label>
    <label class="checkbox-inline" for="checkboxes-10"><input name="through_analytics" id="checkboxes-10" value="1" type="checkbox" <? if($main->through_analytics == 1) echo "checked" ?>>Сквозная аналитика</label>
    <label class="checkbox-inline" for="checkboxes-11"><input name="specproekty" id="checkboxes-11" value="1" type="checkbox" <? if($main->specproekty == 1) echo "checked" ?>>Спецпроекты</label>
    <label class="checkbox-inline" for="checkboxes-12"><input name="serm" id="checkboxes-12" value="1" type="checkbox" <? if($main->serm == 1) echo "checked" ?>>SERM</label>
    <!-- <label class="checkbox-inline" for="checkboxes-13"><input name="btl" id="checkboxes-13" value="1" type="checkbox" <? if($main->btl == 1) echo "checked" ?>>BTL</label> -->
    <label class="checkbox-inline" for="checkboxes-14"><input name="biznes_analitika" id="checkboxes-14" value="1" type="checkbox" <? if($main->biznes_analitika == 1) echo "checked" ?>>Бизнес-аналитка</label>
    <label class="checkbox-inline" for="checkboxes-15"><input name="pr" id="checkboxes-15" value="1" type="checkbox" <? if($main->pr == 1) echo "checked" ?>>PR, брендинг</label>
    <label class="checkbox-inline" for="checkboxes-16"><input name="strategy" id="checkboxes-16" value="1" type="checkbox" <? if($main->strategy == 1) echo "checked" ?>><b>Комплексная стратегия</b></label>
  </div>
</div>


<!-- Multiple Checkboxes
	<div class="form-group">
	  <label class="col-md-4 control-label" for="checkboxes">Доп. опции:</label>
	  <div class="col-md-4">
		<div class="checkbox"><label for="checkboxes-1"><input name="checkboxes" id="checkboxes-1" value="1" type="checkbox">СЕО</label></div>
		<div class="checkbox"><label for="checkboxes-2"><input name="checkboxes" id="checkboxes-2" value="1" type="checkbox">СЕО</label></div>
		<div class="checkbox"><label for="checkboxes-3"><input name="checkboxes" id="checkboxes-3" value="1" type="checkbox">СЕО</label></div>
		<div class="checkbox"><label for="checkboxes-4"><input name="checkboxes" id="checkboxes-4" value="1" type="checkbox">СЕО</label></div>
	  </div>
	</div>
 -->

	
	<!-- Button (Double) -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="button1id"> </label>
	  <div class="col-md-4">
	  	<input type="hidden" name="id" value="<? echo $main->id ?>">
		<button type="submit" class="btn btn-success">Сохранить</button>
		<a href="<? echo site_url("main/index") ?>" class="btn btn-danger">Отмена</a>
	  </div>
	</div>	

	
</fieldset>
</form>	
			
							

				</div>
			</div>

		</div>
	</div>




<?php $this->load->view('footer'); ?>