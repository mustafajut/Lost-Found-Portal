<div class="container p-5">
    <h4>Edit User Detail</h4>
    <?php
    include_once "../config/dbconnect.php";
    // Check if the 'record' value is set
    if (isset($_POST['record'])) {
        $ID = $_POST['record'];
        $qry = mysqli_query($conn, "SELECT * FROM users WHERE Id='$ID'");
        // Check if any rows are fetched
        if ($qry && mysqli_num_rows($qry) > 0) {
            $result = mysqli_fetch_assoc($qry);
            $res_Uname = $result['Username'];
            $res_Email = $result['Email'];
            $res_Phone = $result['Phone'];
    ?>
    <form id="update-User" onsubmit="updateUser()" enctype='multipart/form-data'>
        <!-- Add a hidden input field to pass the record ID -->
        <div class="form-group">
            <input type="text" class="form-control" id="Id" value="<?=$row1['Id']?>" hidden>
        </div>
        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" class="form-control" id="Username" value="<?=$res_Uname?>">
        </div>
        <div class="form-group">
            <label for="desc">Email</label>
            <input type="text" class="form-control" id="Email" value="<?=$res_Email?>">
        </div>
        <div class="form-group">
            <label for="price">Contact</label>
            <input type="text" class="form-control" id="Phone" value="<?=$res_Phone?>">
        </div>
        <div class="form-group">
            <button type="submit" style="height:40px" class="btn btn-primary">Update</button>
        </div>
    </form>
    <?php
        } else {
            echo "No user found with ID: $ID";
        }
    } else {
        echo "Record ID not provided.";
    }
    ?>
</div>