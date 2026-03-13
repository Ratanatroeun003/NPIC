<div class="container">
    <div class="table-responsive">
        <div class="d-flex justify-content-between">
            <h3>User List</h3>
            <a href="./?page=user/create" class="btn btn-success">Create New</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $users = getUsers();
                $count = 1;
                while ($row = $users->fetch_object()) {
                ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><img src="<?php echo $row->photo ?? './assets/images/emptyuser.png' ?>" alt=""></td>
                        <td><?php echo $row->name ?></td>
                        <td>
                            <button class="btn btn-danger">Update</button>
                            <button class="btn btn-success">Delete</button>
                        </td>
                    </tr>
                <?php
                    $count++;
                }
                ?>
            </tbody>

        </table>
    </div>

</div>