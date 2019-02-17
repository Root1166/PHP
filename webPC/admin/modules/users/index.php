<?php 
    $open = "users";
	require_once __DIR__ . '/../../autoload/autoload.php';
	


     $users = $db->fetchAll('users');
	// print_r($admin); 

?>
<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			USERS
		</h1>
		<ol class="breadcrumb">
			<li class="<?php echo isset($open) && $open == 'users' ? 'active' : ''?>" style="margin-right: 5px;margin-left: 5px;">
				<a href="<?php echo modules("product/")?>">
					<i class="mdi mdi-format-list-bulleted"></i>
					<span>Users</span>
				</a>
			</li> /
			<li class="active" style="margin-left: 5px;">
				<i class="mdi mdi-file"></i> Blank Page
			</li>
		</ol>
		<div class="clearfix"></div>

		<!-- thông báo lỗi -->
		<?php require_once __DIR__ . '/../../../partials/notification.php'; ?>
	</div>
</div>
<!-- DataTables Example -->
<div class="row">
	<div class="col-md-12">
		<div class="card col-mb">
			<div class="card-header">
				<i class="fas fa-table"></i>
				Danh mục
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" width="100%" id="dataTable" cellspacing="1">
						<thead class="thead-dark">
							<tr>
                                <th scope="col">STT</th>
                                <th scope="col">Avartar</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Created_at</th>
								<!-- <th scope="col">Level</th> -->
								<th scope="col">Funtion</th>
							</tr>
							</tr>
						</thead>
						<tbody>
							<?php $stt=1;foreach($users as $item):?>
								<tr>
                                    <td><?php echo $stt?></td>
                                    <td>
									    <img src="<?php echo upload()?>avartarUsers/<?php echo $item['avartar']?>" style="width:80px;height:80px">
								    </td>
                                    <td><?php echo $item['name']?></td>
									<td><?php echo $item['email']?></td>
                                    <td><?php echo $item['phone']?></td>
                                    <td><?php echo $item['address']?></td>
                                    <td><?php echo $item['created_at']?></td>
									<td>
										<a class="btn btn-danger" style="
										/* Green */
										border: none;
										font-size: 10px;
										color: white;
										padding: 10px 5px;
										text-align: center;
										text-decoration: none;
										display: inline-block;
										margin: 4px 2px;
										cursor: pointer;" href="Delete.php?id=<?php echo $item['id']?>">
											<span class="mdi mdi-delete-variant"></span> Delete
										</a>
									</td>
								</tr>
							<?php $stt++; endforeach?>
						</tbody>
						<tfoot>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Avartar</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Created_at</th>
								<!-- <th scope="col">Level</th> -->
								<th scope="col">Funtion</th>
							</tr>
						</tfoot>

					</table>
				</div>
			</div>
			<div class=" card-footer small text-muted ">Updated yesterday at 11:59 PM</div>
		</div>
	</div>


</div>
<!--End DataTables Example -->

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>