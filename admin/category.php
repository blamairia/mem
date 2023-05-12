<?php   
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../middleware/adminMiddleware.php');

include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category</h4>
                </div>
                <div class="card-body" id="category_table">
                    <table class="table table-bordred table-striped table-hover">
                        <thead>
                            <tr class="table-success">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Profit</th>
                                <th>Action</th>                         
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $category = getAll("categories");
        
                            if(mysqli_num_rows($category) > 0)
                            {
                                foreach($category as $item)
                                {?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name'] ?>">
                                        </td>
                                        <td>
                                            <?= $item['status'] == '0' ? "Visible" : "Hidden"?>
                                        </td>
                                        <td>
                                            <?= $item['is_profit'] == '1' ? "Profit" : "Non-Profit"?>
                                        </td>
                                        <td>
                                            <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-primary bg-gradient-success">Edit</a>
                                            
                                                <button class="btn btn-warning btn-sm delete_category_btn" value="<?= $item['id'];?>" type="submit" name="delete_category_btn">Delete</button>
                                            
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
