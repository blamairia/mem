<?php
include(__DIR__ . '/../config/dbcon.php');

function getAllActive($table, $is_profit = null)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0' ";
    if ($is_profit !== null) {
        $query .= "AND is_profit='$is_profit'";
    }
   
    return $query_run = mysqli_query($con, $query);
}


function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";

    return $query_run = mysqli_query($con, $query);
}

function getIDActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='0'";

    return $query_run = mysqli_query($con, $query);
}

function getSlugActive($table, $slug)
{
    global $con;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";

    return $query_run = mysqli_query($con, $query);
}

function getTripsByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM trips WHERE category_id='$category_id' AND status='0'";

    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

function getCategory($categoryId) {
    global $con;

    $result = mysqli_query($con, "SELECT * FROM categories WHERE id = $categoryId");
    return mysqli_fetch_assoc($result);
}

?>
