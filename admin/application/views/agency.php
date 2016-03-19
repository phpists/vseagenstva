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
		if (confirm("Удалить агенство ?")) {
			window.location = '<? echo site_url("main/del_agency") ?>/'+$(this).attr("id_agency");
		}
	});
});
</script>

<div class="container-fluid" style="margin-top: 55px;">
	<div class="row">
		<div class="col-md-12 col-sm-12">

			<div class="panel panel-default">
				<div class="panel-heading">Агенства</div>
				<div class="panel-body">

					<table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" id="example">
						<thead>
							<tr>
								<th><center>#</center></th>
								<th><center>Название</center></th>
								<th><center>email</center></th>
								<th><center>Год основ.</center></th>
								<th><center>Мин. бюджет</center></th>
								<th><center>Описание</center></th>
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
								<td><center><a href="'.site_url("main/agency_edit/".$row->id).'">'.$row->name.'</a></center></td>
								<td><center>'.$row->email.'</center></td>
								<td><center>'.$row->year.'</center></td>
								<td><center>'.$row->min_cost.'</center></td>
								<td><center>'.$row->description.'</center></td>
								<td><center>
								<a href="'.site_url("main/agency_edit/".$row->id).'">
									<img src="'.base_url().'application/views/img/pencil.png">
								</a>&nbsp;&nbsp;
								<a href="#" class="del_agency" id_agency="'.$row->id.'">
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