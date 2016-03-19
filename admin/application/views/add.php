<?php $this->load->view('header'); ?>

<div class="container-fluid" style="margin-top: 55px;">
	<div class="row">
		<div class="col-md-12 col-sm-12">

			<div class="panel panel-default">
				<div class="panel-heading">Новое агенство</div>
				<div class="panel-body">
	


<form action="<? echo site_url("main/add_agency") ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
<fieldset>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Название:</label>  
	  <div class="col-md-4">
	  <input name="name" class="form-control input-md" type="text" value="">
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">email:</label>  
	  <div class="col-md-4">
	  <input name="email" class="form-control input-md" type="text" value="">
	  </div>
	</div>

	<!-- File Button --> 
	<div class="form-group">
		<label class="col-md-4 control-label" for="filebutton">Логотип:</label>
		<div class="col-md-4">
			<input id="filebutton" name="file" class="input-file" type="file">
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">URL:</label>  
	  <div class="col-md-4">
	  <input name="url" class="form-control input-md" type="text" value="">
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
					echo '<option value="'.$i.'">'.$i.'</option>';
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
					echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
		</select>
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Описание:</label>  
	  <div class="col-md-4">
	  	<textarea class="form-control" name="description" cols="30" rows="8"></textarea>
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Мин. бюджет:</label>  
	  <div class="col-md-4">
	  <input name="min_cost" class="form-control input-md" type="text" value="">
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
					echo '<option value="'.$row->nazva.'">'.$row->nazva.'</option>';
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
					echo '<option value="'.$row->nazva.'">'.$row->nazva.'</option>';
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
					echo '<option value="'.$row->nazva.'">'.$row->nazva.'</option>';
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
					echo '<option value="'.$row->nazva.'">'.$row->nazva.'</option>';
				}
			?>
		</select>
	  </div>
	</div>	


	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Код карты:</label>  
	  <div class="col-md-4">
	  	<textarea class="form-control" name="map1" cols="30" rows="3"></textarea>
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Адресс:</label>  
	  <div class="col-md-4">
	  <input name="adress" class="form-control input-md" type="text" value="">
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Телефон:</label>  
	  <div class="col-md-4">
	  <input name="tel" class="form-control input-md" type="text" value="">
	  </div>
	</div>	


<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Доп. опции:</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="checkboxes-0" style="margin-left: 10px;"><input name="seo" id="checkboxes-0" value="1" type="checkbox">СЕО</label>
    <label class="checkbox-inline" for="checkboxes-1"><input name="contact_marketing" id="checkboxes-1" value="1" type="checkbox">Контент-маркетинг</label>
    <label class="checkbox-inline" for="checkboxes-2"><input name="sites" id="checkboxes-2" value="1" type="checkbox">Создание сайтов</label>
    <label class="checkbox-inline" for="checkboxes-3"><input name="context" id="checkboxes-3" value="1" type="checkbox">Контекст</label>
    <label class="checkbox-inline" for="checkboxes-4"><input name="price_place" id="checkboxes-4" value="1" type="checkbox">Прайс-площадки</label>
    <label class="checkbox-inline" for="checkboxes-5"><input name="landing" id="checkboxes-5" value="1" type="checkbox">Лендинги</label>
    <label class="checkbox-inline" for="checkboxes-6"><input name="media" id="checkboxes-6" value="1" type="checkbox">Медийка</label>
    <label class="checkbox-inline" for="checkboxes-7"><input name="conversion" id="checkboxes-7" value="1" type="checkbox">Конверсия</label>
    <label class="checkbox-inline" for="checkboxes-8"><input name="offlain_rekl" id="checkboxes-8" value="1" type="checkbox">Оффлайн-реклама</label>
    <label class="checkbox-inline" for="checkboxes-9"><input name="smm" id="checkboxes-9" value="1" type="checkbox">SMM</label>
    <label class="checkbox-inline" for="checkboxes-10"><input name="through_analytics" id="checkboxes-10" value="1" type="checkbox">Сквозная аналитика</label>
    <label class="checkbox-inline" for="checkboxes-11"><input name="specproekty" id="checkboxes-11" value="1" type="checkbox">Спецпроекты</label>
    <label class="checkbox-inline" for="checkboxes-12"><input name="serm" id="checkboxes-12" value="1" type="checkbox">SERM</label>
    <!-- <label class="checkbox-inline" for="checkboxes-13"><input name="btl" id="checkboxes-13" value="1" type="checkbox">BTL</label> -->
    <label class="checkbox-inline" for="checkboxes-14"><input name="biznes_analitika" id="checkboxes-14" value="1" type="checkbox">Бизнес-аналитка</label>
    <label class="checkbox-inline" for="checkboxes-15"><input name="pr" id="checkboxes-15" value="1" type="checkbox">PR, брендинг</label>
    <label class="checkbox-inline" for="checkboxes-16"><input name="strategy" id="checkboxes-16" value="1" type="checkbox"><b>Комплексная стратегия</b></label>
  </div>
</div>


	
	<!-- Button (Double) -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="button1id"> </label>
	  <div class="col-md-4">
		<button type="submit" class="btn btn-success">Добавить</button>
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