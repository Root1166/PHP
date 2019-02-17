<?php 
    $open = "category";
    require_once __DIR__ . '/../../autoload/autoload.php'; 
    $category = $db->fetchAll("category");
?>
<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Category
            <a href="add.php" class="btn btn-primary">Add</a>
        </h1>
        <ol class="breadcrumb">
            <li class="<?php echo isset($open) && $open == 'category' ? 'active' : ''?>" style="margin-right: 5px;margin-left: 5px;">
                <a href="<?php echo modules(" category/indext.php ")?>">
                    <i class="fa fa-list"></i>
                    <span>Category</span>
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
                Category
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <tH scope="col">Home</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1 ; foreach($category as $item): ?>
                            <tr>
                                <td>
                                    <?php echo $stt?>
                                </td>
                                <td>
                                    <?php echo $item['name']?>
                                </td>
                                <td>
                                    <?php echo $item['slug']?>
                                </td>
                                <td>
                                    <a href="home.php?id=<?php echo $item['id']?>" class="btn btn-xs <?php echo $item['home']==1 ? 'btn-info': 'btn-danger'?>">
                                        <?php echo $item['home']==1 ? 'hiển thị' : 'không'?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $item['status']?>
                                </td>
                                <td>
                                    <?php echo $item['created_at']?>
                                </td>
                                <td>
                                    <a type="submit" class="btn btn-warning" style="margin-right: 5px;
                                    /* Green */
                                    border: none;
                                    color: white;
                                    padding: 10px 30px;
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
                                    padding: 10px 24px;
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
                    </table>
                </div>
            </div>
            <div class=" card-footer small text-muted ">Updated yesterday at 11:59 PM</div>
        </div>
    </div>


</div>
<!--End DataTables Example -->

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>