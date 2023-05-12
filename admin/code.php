<?php 
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
    session_start();
    include('../config/dbcon.php');
    include('../functions/myfunctions.php');
  


    if(isset($_POST['add_category_btn']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1' : '0';
    $is_profit = isset($_POST['is_profit']) ? '1' : '0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $cate_query = "INSERT INTO categories (name,slug,description,status,is_profit,image)
    VALUES ('$name','$slug','$description','$status','$is_profit','$filename')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add_category.php" ,"Added Successfully");
    }
    else
    {
        redirect("add_category.php" ,"Something went wrong");
    }

}
else if(isset($_POST['update_category_btn'])){
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1' : '0';
    $is_profit = isset($_POST['is_profit']) ? '1' : '0';
    
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    { 
        $update_filename = $old_image;
    }

    $path = "../uploads";

    $update_query ="UPDATE categories SET name='$name', slug='$slug',description='$description',
    status='$status' ,is_profit='$is_profit', image='$update_filename'
     WHERE id='$category_id' ";

     $update_query_run = mysqli_query($con, $update_query);

     if($update_query_run)
     {
         if($_FILES['image']['name'] != "")
         {
             move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
             if(file_exists("../uploads/".$old_image))
             {
                 unlink("../uploads/".$old_image);
             }           
         }
         redirect("edit-category.php?id=$category_id", "Category Updated successfully");
     }
     else
     {
         redirect("edit-category.php?id=$category_id", "Something went wrong");
     }

}


    if (isset($_POST['add_trip_btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $trip_price = $_POST['trip_price'];
    $max_participants = $_POST['max_participants'];
    $status = isset($_POST['status']) ? '1' : '0';
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];

    $image_names = $_FILES['images']['name'];
    $path = "../uploads";

    $image_filenames = [];

    foreach ($image_names as $key => $image_name) {
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $filename = time() . '_' . $key . '.' . $image_ext;
        array_push($image_filenames, $filename);
    }

    $image_filenames_str = implode(",", $image_filenames);

    $trip_query = "INSERT INTO trips (name,slug,description,trip_price,max_participants,status,meta_title,meta_description,meta_keywords,images)
    VALUES ('$name','$slug','$description','$trip_price','$max_participants','$status','$meta_title','$meta_description','$meta_keywords','$image_filenames_str')";

    $trip_query_run = mysqli_query($con, $trip_query);

    if ($trip_query_run) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            move_uploaded_file($tmp_name, $path . '/' . $image_filenames[$key]);
        }
        redirect("add_trip.php", "Trip Added Successfully");
    } else {
        redirect("add_trip.php", "Something went wrong");
    }
}
// Add other cases for updating, deleting, etc. if needed


   
   
    else if (isset($_POST['update_trip_btn'])) {
        $trip_id = $_POST['trip_id'];
    
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $description = $_POST['description'];
        $trip_price = $_POST['trip_price'];
        $max_participants = $_POST['max_participants'];
        $status = isset($_POST['status']) ? '1' : '0';
        $meta_title = $_POST['meta_title'];
        $meta_description = $_POST['meta_description'];
        $meta_keywords = $_POST['meta_keywords'];
    
        $path = "../uploads";
    
        $new_images = $_FILES['images']['name'];
        $old_images_str = $_POST['old_images'];
        $old_images = explode(",", $old_images_str);
    
        $updated_images = [];
        $deleted_images = [];
    
        foreach ($old_images as $old_image) {
            if (in_array($old_image, $new_images)) {
                array_push($updated_images, $old_image);
            } else {
                array_push($deleted_images, $old_image);
            }
        }
    
        $image_filenames = [];
    
        foreach ($new_images as $key => $new_image) {
            if (!in_array($new_image, $updated_images)) {
                $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
                $filename = time() . '_' . $key . '.' . $image_ext;
                array_push($image_filenames, $filename);
            }
        }
    
        $image_filenames_str = implode(",", array_merge($updated_images, $image_filenames));
    
        $update_trip_query = "UPDATE trips SET name='$name', slug='$slug', description='$description', trip_price='$trip_price', max_participants='$max_participants', status='$status', meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords', images='$image_filenames_str' WHERE id='$trip_id'";
        $update_trip_query_run = mysqli_query($con, $update_trip_query);
    
        if ($update_trip_query_run) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                if (!in_array($_FILES['images']['name'][$key], $updated_images)) {
                    move_uploaded_file($tmp_name, $path . '/' . $image_filenames[$key]);
                }
            }
    
            foreach ($deleted_images as $deleted_image) {
                if (file_exists("../uploads/" . $deleted_image)) {
                    unlink("../uploads/" . $deleted_image);
                }
            }
    
            redirect("edit-trip.php?id=$trip_id", "Trip Updated successfully");
        } else {
            redirect("edit-trip.php?id=$trip_id", "Something went wrong");
        }
    

    }
    else if(isset($_POST['delete_category_btn']))
    {
        $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
        $category_query = "SELECT * FROM categories WHERE id ='$category_id'";

        $category_query_run = mysqli_query($con, $category_query);
        $category_data = mysqli_fetch_array($category_query_run);

        $image = $category_data['image'];

        $delete_query = "DELETE FROM categories WHERE id='$category_id'";
        $delete_query_run = mysqli_query($con,$delete_query);

        if($delete_query_run){
            
            
            if(file_exists("../uploads/".$image))
                {
                    unlink("../uploads/".$image);
                }     
                echo 200;
                //redirect("category.php","categoy deleted successfully");
        }
        else
         { 
             echo 500;
             //redirect("category.php?id=$category_id", "Something went wrong");
         }
    }
    else if(isset($_POST['delete_product_btn']))
    {
        $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
        $product_query = "SELECT * FROM products WHERE id ='$product_id'";

        $product_query_run = mysqli_query($con, $product_query);
        $product_data = mysqli_fetch_array($product_query_run);

        $image = $product_data['image'];

        $delete_query = "DELETE FROM products WHERE id='$product_id'";
        $delete_query_run = mysqli_query($con,$delete_query);

        if($delete_query_run){
            
            
            if(file_exists("../uploads/".$image))
                {
                    unlink("../uploads/".$image);
                }     
            // redirect("products.php","Product deleted successfully");
            echo 200;
        }
        else
         {
            echo 500;
            // redirect("products.php?id=$product_id", "Something went wrong");
         }
    }
    else
    {
        redirect('../index.php',"invalid");
    }
?>