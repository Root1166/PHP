<?php 
    $open = "admin";
	require_once __DIR__ . '/../../autoload/autoload.php';


    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }
    else{
        $p = 1;
    }
    
	$sql = "SELECT admin.* FROM admin ORDER BY ID DESC ";
	$admin = $db->fetchsql($sql);
    // $admin = $db->fetchJone("admin",$sql,$p,5,true);

    // // if(isset($admin['page'])){
    // //     $sotrang = $admin['page'];
    // //     unset($admin['page']);
    // // }
?>
<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Admin
			<a href="add.php" class="btn btn-primary">Add</a>
		</h1>
		<ol class="breadcrumb">
			<li class="<?php echo isset($open) && $open == 'admin' ? 'active' : ''?>" style="margin-right: 5px;margin-left: 5px;">
				<a href="<?php echo modules("admin/indext.php ")?>">
					<i class="fa fa-list"></i>
					<span>Admin</span>
				</a>
			</li> /
			<li class="active" style="margin-left: 5px;">
				<i class="fa fa-file"></i> Blank Page
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
				Admin
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" width="100%" id="dataTable" cellspacing="1">
						<thead class="thead-dark">
							<tr>
								<th scope="col">STT</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
								<th scope="col">Address</th>
								<!-- <th scope="col">Level</th> -->
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $stt=1 ; foreach($admin as $item): ?>
							<tr>
								<td>
									<?php echo $stt?>
								</td>
								<td>
									<?php echo $item['name']?>
								</td>
								<td>
									<?php echo $item['email']?>
								</td>
								<td>
									<?php echo $item['phone']?>
								</td>
								<td>
                                    <?php echo $item['address']?>
								</td>
								<!-- <td>
                                    <?php echo $item['level']?>
								</td> -->
								<td>
									<a type="submit" class="btn btn-warning" style="margin-right: 5px;
                                    /* Green */
                                    border: none;
                                    color: white;
                                    padding: 10px 10px;
                                    text-align: center;
                                    text-decoration: none;
                                    display: inline-block;
                                    font-size: 10px;
                                    margin: 4px 2px;
                                    cursor: pointer;
                                    " href="edit.php?id=<?php echo $item['id']?>">
										<span class="fa fa-edit"></span> Edit
									</a>
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
										<span class="fa fa-trash "></span> Delete
									</a>
								</td>
							</tr>

							<?php  $stt++; endforeach?>

						</tbody>
						<tfoot>
                            <tr>
								<th scope="col">STT</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
								<th scope="col">Address</th>
								<!-- <th scope="col">Level</th> -->
								<th scope="col">Action</th>
							</tr>
						</tfoot>

					</table>
					<!-- <nav aria-label="Page navigation example">
						<ul class="pagination justify-content-end">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1">Previous</a>
							</li>
							<?php for($i = 1;$i <= $sotrang; $i++):?>
							<?php
										if(isset($_GET['page'])){
											$p = $_GET['page'];
										}
										else{
											$p = 1;
										}
									?>
							<li class="<?php echo ($i == $p) ? 'active' : ''?> page-item">
								<a class="page-link" href="?page=<?php echo $i;?>">
									<?php echo $i; ?>
								</a>
							</li>
							<?php endfor; ?>
							<li>
							<a class="page-link" href="#">Next</a>
							</li>
						</ul>
					</nav> -->
				</div>
			</div>
			<div class=" card-footer small text-muted ">Updated yesterday at 11:59 PM</div>
		</div>
	</div>


</div>
<!--End DataTables Example -->

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>