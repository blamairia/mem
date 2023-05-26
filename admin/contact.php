<?php   
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../middleware/adminMiddleware.php');
include('includes/header.php');
include('../functions/reservation.php');

if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']); // Clear the session message
}


if (isset($_POST['delete'])) {
    global $con;
    $message_id = $_POST['message_id'];
    $sql = "DELETE FROM contact WHERE id = $message_id";
    
    if(mysqli_query($con, $sql)){
        $_SESSION['message'] = 'Message Deleted Successfully!';
    } else {
        $_SESSION['message'] = 'Failed to delete the message!';
    }
}


?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Contact Messages</h4>
                </div>
                <div class="card-body table-responsive" id="contact_table">
                    <table class="table table-bordred table-striped table-hover">
                        <thead>
                            <tr class="table-success">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $messages = getAllMessages();

                            if (mysqli_num_rows($messages) > 0) {
                                while ($item = mysqli_fetch_assoc($messages)) {
                                    ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td><?= $item['email']; ?></td>
                                        <td><?= $item['subject']; ?></td>
                                        <td style="max-width: 500px; white-space: normal;"><?= $item['message']; ?></td>
                                        <td>
                                            <form action="contact.php" method="POST">
                                                <input type="hidden" name="message_id" value="<?= $item['id']; ?>">
                                                <button type="submit" class="btn btn-danger btn-sm" name="delete">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "No Record Found";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php');?>
