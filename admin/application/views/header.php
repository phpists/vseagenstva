<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Админка Всеагентства.рф</title>
	<!-- SoftDeal.net -->
	<link href="<? echo base_url() ?>application/views/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<body>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
	<script src="<? echo base_url() ?>application/views/js/jquery.js"></script>
	<script src="<? echo base_url() ?>application/views/bootstrap-3.3.5/js/bootstrap.min.js"></script>  

	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2" style="padding-left: 0; padding-right: 0;">
				 <a class="navbar-brand" href="<? echo site_url() ?>">Всеагентства.рф</a>
			 </div>
			 <!-- Collect the nav links, forms, and other content for toggling -->
			 <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
				 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<ul class="nav navbar-nav">
						<li <? if($this->uri->segment(2, '') == '' or $this->uri->segment(2, '') == "index") echo 'class="active"'; ?>><a href="<? echo site_url("main/index") ?>">Заявки</a></li>
						<li <? if($this->uri->segment(2, '') == "agency") echo 'class="active"'; ?>><a href="<? echo site_url("main/agency") ?>">Агенства</a></li>
						<li <? if($this->uri->segment(2, '') == "add") echo 'class="active"'; ?>><a href="<? echo site_url("main/add") ?>">Создать</a></li>
						<li><a href="http://всеагентства.рф/" target="_blank">Сайт</a></li>
					</ul> 

		 			<ul class="nav navbar-nav navbar-right">
						<li><a href="<? echo site_url("main/profile") ?>">Привет <b><? echo $this->session->userdata('user_name') ?></b></a></li>
						<li><a href="<? echo site_url("login/logout") ?>">Выход <span class="glyphicon glyphicon-log-out"></span></a></li>
					</ul>
				
				</div><!-- /.navbar-collapse -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			</div>  	
		</div><!-- /.container-fluid -->
	</nav>