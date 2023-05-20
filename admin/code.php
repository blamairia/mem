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
    // Retrieve form data
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $trip_price = $_POST['trip_price'];
    $max_participants = $_POST['max_participants'];
    $status = isset($_POST['status']) ? 1 : 0;
    $category_id = $_POST['category_id'];

    // Upload images
    $image_filenames = [];
    $path = "../uploads/";

    if (!empty($_FILES['images']['name'])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $image_name = $_FILES['images']['name'][$key];
            $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
            $filename = time() . '_' . $key . '.' . $image_ext;
            move_uploaded_file($tmp_name, $path . $filename);
            $image_filenames[] = $filename;
        }
    }

    // Insert trip into the database
    $insert_query = "INSERT INTO trips (name, slug, description, start_date, end_date, trip_price, max_participants, status, images, category_id)
    VALUES ('$name', '$slug', '$description', '$start_date', '$end_date', '$trip_price', '$max_participants', '$status', '" . implode(",", $image_filenames) . "', '$category_id')";

    $insert_result = mysqli_query($con, $insert_query);

    if ($insert_result) {
        redirect("add-trip.php", "Trip Added Successfully");
    } else {
        redirect("add-trip.php", "Something went wrong");
    }
}
else if (isset($_POST['update_trip_btn'])) {
    $trip_id = $_POST['trip_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $trip_price = $_POST['trip_price'];
    $max_participants = $_POST['max_participants'];
    $status = isset($_POST['status']) ? 1 : 0;

    $path = "../uploads";

    $new_images = $_FILES['images']['name'];
    $existing_images = $_POST['existing_images'];

    // Get the existing image filenames
    $existing_images_array = explode(",", $existing_images);

    $updated_images = [];
    $deleted_images = [];

    foreach ($existing_images_array as $existing_image) {
        if (!in_array($existing_image, $new_images)) {
            array_push($deleted_images, $existing_image);
        } else {
            array_push($updated_images, $existing_image);
        }
    }

    $image_filenames = [];

    foreach ($new_images as $key => $new_image) {
        if (!empty($new_image) && !in_array($new_image, $updated_images)) {
            $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
            $filename = time() . '_' . $key . '.' . $image_ext;
            array_push($image_filenames, $filename);
        }
    }

    $image_filenames_str = implode(",", array_merge($updated_images, $image_filenames));

    $update_trip_query = "UPDATE trips SET name='$name', slug='$slug', description='$description', start_date='$start_date', end_date='$end_date', trip_price='$trip_price', max_participants='$max_participants', status='$status'";

    // Check if there are new images to update
    if (!empty($image_filenames)) {
        $update_trip_query .= ", images='$image_filenames_str'";
    }

    $update_trip_query .= " WHERE id='$trip_id'";

    $update_trip_query_run = mysqli_query($con, $update_trip_query);

    if ($update_trip_query_run) {
        // Upload new images
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if (!empty($_FILES['images']['name'][$key]) && !in_array($_FILES['images']['name'][$key], $updated_images)) {
                move_uploaded_file($tmp_name, $path . '/' . $image_filenames[$key]);
            }
        }

        // Delete deleted images
        foreach ($deleted_images as $deleted_image) {
            if (file_exists("../uploads/" . $deleted_image)) {
                unlink("../uploads/" . $deleted_image);
            }
        }

        redirect("edit-trip.php?id=$trip_id", "Trip updated successfully");
    } else {
        redirect("edit-trip.php?id=$trip_id", "Something went wrong");
    }
}

    
if (isset($_POST['delete_category_btn'])) {
    $category_id = $_POST['category_id'];
    
    // Retrieve the category data to get the image filename
    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    
    $image_filename = $category_data['image'];
    
    $delete_query = "DELETE FROM categories WHERE id='$category_id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    
    if ($delete_query_run) {
        // Delete category image
        if (file_exists("../uploads/" . $image_filename)) {
            unlink("../uploads/" . $image_filename);
        }
        redirect("category.php", "Category deleted successfully");
    } else {
        redirect("edit-category.php?id=$category_id", "Something went wrong");
    }
}

    else if (isset($_POST['delete_trip_btn'])) {
        $trip_id = $_POST['trip_id'];
    
        // Retrieve the trip data to get the image filenames
        $trip_query = "SELECT * FROM trips WHERE id='$trip_id'";
        $trip_query_run = mysqli_query($con, $trip_query);
        $trip_data = mysqli_fetch_array($trip_query_run);
    
        $image_filenames = explode(",", $trip_data['images']);
    
        $delete_query = "DELETE FROM trips WHERE id='$trip_id'";
        $delete_query_run = mysqli_query($con, $delete_query);
    
        if ($delete_query_run) {
            // Delete trip images
            foreach ($image_filenames as $image) {
                if (file_exists("../uploads/" . $image)) {
                    unlink("../uploads/" . $image);
                }
            }
            redirect("trips.php", "Trip deleted successfully");
        } else {
            redirect("edit-trip.php?id=$trip_id", "Something went wrong");
        }
    }
    
    include('../functions/reservation.php');

if (isset($_POST['accept_reservation_btn'])) {
    $reservationId = $_POST['reservation_id'];
    if (acceptReservation($reservationId)) {
        header('Location: reservations.php');
    } else {
        // Handle error.
        echo "Error accepting reservation";
    }
}

if (isset($_POST['decline_reservation_btn'])) {
    $reservationId = $_POST['reservation_id'];
    if (declineReservation($reservationId)) {
        header('Location: reservations.php');
    } else {
        echo "Error declining reservation";
    }
}


?>