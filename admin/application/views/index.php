<?php $this->load->view('header'); ?>

<link href="<? echo base_url() ?>application/views/DataTables-1.10.9/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="<? echo base_url() ?>application/views/DataTables-1.10.9/js/jquery.dataTables.min.js"></script>  
<script src="<? echo base_url() ?>application/views/DataTables-1.10.9/js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready(function() {
	$('#example').dataTable({
		"iDisplayLength": 50,
		//"bFilter": false,
		//"bPaginate": false,
		//"bInfo": false,
		//"order": [[ 3, "desc" ]]
		//"language":{ emptyTable:"Ничего нету" }
		"language": {
            "url": "<? echo base_url() ?>application/views/DataTables-1.10.9/dataTables.german.lang"
		}
	});

	$('.del_agency').click(function() {
		if (confirm("Удалить заявку ?")) {
			window.location = '<? echo site_url("main/del_zayavka") ?>/'+$(this).attr("id_zap");
		}
	});	

	$('.send').click(function() {
		var $btn = $(this).button('loading');
		text_status = $(this).parent().parent().prev();
		$.ajax({
			type: "POST",
			url: "/admin/zakaz/ajax_send_from_admin",
			data: { 
				"id_zap": $(this).attr("id_zap"),
			},
			dataType: "html",
			success: function(msg){
				//alert(msg);
				setInterval(function(){
					$btn.button('reset');
					text_status.text("Отправлена");
					//location.reload(0);
				},2000); // 10sec (10000)
			}
		});
	});
});
</script>

<div class="container-fluid" style="margin-top: 55px;">
	<div class="row">
		<div class="col-md-12 col-sm-12">

			<div class="panel panel-default">
				<div class="panel-heading">Заявки</div>
				<div class="panel-body">

					<table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" id="example">
						<thead>
							<tr>
								<th><center>#</center></th>
								<th><center>Дата и время</center></th>
								<th><center>emails</center></th>
								<th><center>Текст заявки</center></th>
								<th><center>Статус</center></th>
								<th><center>Отправить</center></th>
								<th><center>Изменить</center></th>
							</tr>
						</thead>
						<tbody>


<?php 
$a=1;
foreach ($main->result() as $row) { 
	echo '
							<tr>
								<td><center>'.$a++.'</center></td>
								<td><center><a href="'.site_url("main/edit_zayavka/".$row->id).'">'.$row->date_create.'</a></center></td>
								<td>'.str_replace(",", ", ", $row->emails).'</td>
								<td>'.$row->text_zayavki.'</td>
								<td><center>'.(($row->status==1)?"Новая":"Отправлена").'</center></td>
								<td><center>
									<button type="button" data-loading-text="Отправка..." class="btn btn-primary send" autocomplete="off" id_zap="'.$row->id.'">
										<i class="glyphicon glyphicon-envelope"></i> Отправить
									</button>
								</center></td>
								<td><center>
								<a href="'.site_url("main/edit_zayavka/".$row->id).'">
									<img src="'.base_url().'application/views/img/pencil.png">
								</a>&nbsp;&nbsp;
								<a href="#" class="del_agency" id_zap="'.$row->id.'">
									<img src="'.base_url().'application/views/img/validno.png">
								</a></center></td>
							</tr>';
}
?>

						</tbody>
					</table>


				</div>
			</div>

		</div>
	</div>




<?php $this->load->view('footer'); ?>