<?php   
session_start();
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Trips</h4>
                </div>
                <div class="card-body" id="trips_table">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="table-info">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $trips = getAll("trips");
        
                            if(mysqli_num_rows($trips) > 0)
                            {
                                foreach($trips as $item)
                                {?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['images']; ?>" width="50px" height="50px" alt="<?= $item['name'] ?>">
                                        </td>
                                        <td>
                                            <?= $item['status'] == '0' ? "Visible" : "Hidden"?>
                                        </td>
                                        <td>
                                            <a href="edit-trip.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-danger btn-sm delete_trip_btn" name="delete_trip_btn" value="<?= $item['id'];?>">Delete</button>
                                        </td>
                                    </tr>
                              <?php      
                                }
                            }
                            else
                            {
                                echo "No Record Found";
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>

<?php   include('includes/footer.php');?>
