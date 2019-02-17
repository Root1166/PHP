<?php 
    $open = "product";
	require_once __DIR__ . '/../../autoload/autoload.php';
	
   
    
    $sql = "SELECT product.*,category.name as namecategory 
            FROM product LEFT JOIN category on category.id = product.category_id
    ";

     $product = $db->fetchsql($sql);
	// print_r($admin); 

?>
<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Sản phẩm
			<a href="add.php" class="btn btn-primary">Add</a>
		</h1>
		<ol class="breadcrumb">
			<li class="<?php echo isset($open) && $open == 'product' ? 'active' : ''?>" style="margin-right: 5px;margin-left: 5px;">
				<a href="<?php echo modules("product/")?>">
					<i class="mdi mdi-format-list-bulleted"></i>
					<span>Sản phẩm</span>
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
                                <th scope="col">Category</th>
								<th scope="col">Name</th>
								<th scope="col">Slug</th>
                                <th scope="col">Price</th>
                                <th scope="col">Picture</th>
								<!-- <th scope="col">Level</th> -->
								<th scope="col">Funtion</th>
							</tr>
						</thead>
						<tbody>
							<?php $stt=1;foreach($product as $item):?>
								<tr>
									<td><?php echo $stt?></td>
                                    <td><?php echo $item['namecategory']?></td>
									<td><?php echo $item['name']?></td>
									<td><?php echo $item['slug']?></td>
                                   
                                    <td>
                                        <ul>
                                            <li>
                                                Giá: <?php echo $item['price']?>
											</li>
											<li>
                                                Giảm giá: <?php echo $item['sale']?>
                                            </li>
                                            <li>
                                                Số lượng: <?php echo $item['number']?>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
									    <img src="<?php echo upload()?>product/<?php echo $item['thunbar']?>" style="width:80px;height:80px">
								    </td>
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
											<span class="mdi mdi-tooltip-edit"></span> Edit
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
											<span class="mdi mdi-delete-variant"></span> Delete
										</a>
									</td>
								</tr>
							<?php $stt++; endforeach?>
						</tbody>
						<tfoot>
                            <tr>
							<th scope="col">STT</th>
								<th scope="col">Name</th>
								<th scope="col">Slug</th>
								<th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Picture</th>
								<!-- <th scope="col">Level</th> -->
								<th scope="col">Funtion</th>
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