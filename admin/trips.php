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
                                <th>Category</th>
                                
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Images</th>
                                <th>Price</th>
                                
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
                                        <td><?= getCategory($item['category_id']); // assuming you have a function to get category by id ?></td>
                                        
                                        <td><?= $item['start_date']; ?></td>
                                        <td><?= $item['end_date']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['images']; ?>" width="50px" height="50px" alt="<?= $item['name'] ?>">
                                        </td>
                                        <td><?= $item['trip_price']; ?></td>
                                        
                                        <td>
                                            <?= $item['status'] == '0' ? "Visible" : "Hidden"?>
                                        </td>
                                        <td>
                                            <a href="edit-trip.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <input type="hidden" name="trip_id" value="<?= $item['id']; ?>">
                                                <button type="submit" class="btn btn-danger btn-sm" name="delete_trip_btn">Delete</button>
                                            </form>
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
