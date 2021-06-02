<?php
$query = "SELECT * FROM admins ORDER BY aid DESC";
$adminData = mysqli_query($connection, $query);
?>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="bg-color-green">
                    <i class="fa fa-eye"></i> show Admin Users</h1>
            <hr>

                    <?= messages();?>
            </div>

            <div class="col-md-12 bg-color-red">
                <table class="table table-hover border-dark">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>User Types</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Images</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($adminData as $key=>$admin) :?>
                    <tr>
                        <td><?=++$key;?></td>
                        <td><?=$admin['full_name']?></td>
                        <td><?=$admin['username']?></td>
                        <td><?=$admin['email']?></td>
                        <td><?=$admin['user_type']?></td>
                        <td><?=$admin['gender']?></td>
                        <td>
                            <?php if ($admin['status']==1) :?>
                            <button class="btn btn-circle btn-xs btn-success"><i class="fa fa-check"></i></button>
                            <?php else :?>
                            <button class="btn btn-circle btn-xs btn-info"><i class="fa fa-times"></i></button>
                        <?php endif; ?>
                        </td>
                        <td><?=$admin['image']?></td>
                        <td>
                            <a href="" class="btn-xs btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="" class="btn-xs btn-danger">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>