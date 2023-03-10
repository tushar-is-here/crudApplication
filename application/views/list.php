<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application - List View</title>
    <link rel="stylesheet" href="<?php echo base_url().'asset/css/bootstrap.min.css';?>">
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">CRUD Application</a>
        </div>
    </div>
    <div class="container" style="padding-top: 10px" >
        <div class="row">
            <div class="col-6"><h3>List Users</h3></div>
            <div class="col-6">
                <td>
                    <a href="<?php echo base_url().'index.php/user/create/'; ?>" class="btn btn-primary">Create</a>
                </td>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?php
                $success = $this->session->flashdata('success');
                $danger = $this->session->flashdata('danger');
                if($success != ""){
                ?>
                <div class="alert alert-success"><?php echo $success;?></div>
                <?php } else if($danger != "") {?>
                    <div class="alert alert-danger"><?php echo $danger;?></div>
                <?php } ?>
            </div>
        </div>
        <hr class="col-md-8">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    
                    <?php if(!empty($users)){ $i=1; foreach($users as $user){ ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td>
                            <a href="<?php echo base_url().'index.php/user/edit/'.$user['user_id'] ?>" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="deleteUser(<?php echo $user['user_id'] ?>)">Delete</a>
                        </td>
                    </tr>
                    <?php }} else{ ?>
                        <tr>
                            <td colspan=5>Record not found !!!</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        
        function deleteUser(id){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var base_url = '<?php echo base_url() ?>';
                var post_url = base_url+'index.php/user/delete';
                var data = {
                id: id,
            };
            $.ajax({
                url: post_url,
                type: 'POST',
                data: data,
                success: function(){
                    window.location.reload();
                },
                error: function(){
                    console.log("Not done");
                }
            })
                
            }
            })

            
        }
    </script>
</html>