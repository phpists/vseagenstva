<?php $this->load->view('header'); ?>

<div class="container-fluid" style="margin-top: 55px;">
	<div class="row">
		<div class="col-md-12 col-sm-12">

			<div class="panel panel-default">
				<div class="panel-heading">Администратор: настройка учетной записи</div>
				<div class="panel-body">
	


<form action="<? echo site_url("main/update_profile") ?>" method="POST" class="form-horizontal">
<fieldset>

<? if($message) { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button class="close" aria-label="Close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>
		<strong>Сохранено !</strong>
	</div>	
<? } ?>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Имя:</label>  
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

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Логин:</label>  
	  <div class="col-md-4">
	  <input class="form-control input-md" type="text" value="<? echo $main->login ?>" readonly>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label">Пароль:</label>  
	  <div class="col-md-4">
	  <input name="pass" class="form-control input-md" type="text" value="<? echo $main->pass ?>">
	  </div>
	</div>	
	
	<!-- Button (Double) -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="button1id"> </label>
	  <div class="col-md-4">
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