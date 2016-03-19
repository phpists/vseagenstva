<?php $this->load->view('header'); ?>

<div class="container-fluid" style="margin-top: 55px;">
	<div class="row">
		<div class="col-md-12 col-sm-12">

			<div class="panel panel-default">
				<div class="panel-heading">Просмотр заявки №<? echo $main->id ?></div>
				<div class="panel-body">
	


<form action="<? echo site_url("main/update_zayavka") ?>" method="POST" class="form-horizontal">
<fieldset>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="sort">Дата создания:</label>  
	  <div class="col-md-4">
	  <input class="form-control input-md" type="text" value="<? echo $main->date_create ?>" readonly>
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="sort">emails:</label>  
	  <div class="col-md-4">
	  <input name="emails" class="form-control input-md" type="text" value="<? echo $main->emails ?>">
	  </div>
	</div>	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="sort">Текст заявки:</label>  
	  <div class="col-md-4">
	  	<textarea class="form-control" name="text_zayavki" cols="30" rows="8"><? echo $main->text_zayavki ?></textarea>
	  </div>
	</div>	

	<!-- Button (Double) -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="button1id"> </label>
	  <div class="col-md-4">
	  	<input type="hidden" name="id" value="<? echo $main->id ?>">
	  	<a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i> Отправить</a>
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