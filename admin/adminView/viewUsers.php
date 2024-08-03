<div >
  <h2>All Users</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">Contact Number</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from users";
      $result=$conn-> query($sql);
      $count=1;
      
      // Check if $result is not false before accessing its properties
      if ($result !== false && $result->num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["Username"]?></td>
      <td><?=$row["Email"]?></td>
      <td><?=$row["Phone"]?></td>
      <td><button class="btn btn-success" onclick="showUpdateModal('<?=$row['Id']?>', '<?=addslashes($row['Username'])?>', '<?=addslashes($row['Email'])?>', '<?=addslashes($row['Phone'])?>')">Edit</button> 
      <td><button class="btn btn-danger" style="height:40px" onclick="userDelete('<?=$row['Id']?>')">Delete</button></td>
    <?php
            $count++;
        }
      } else {
          // Handle the case where the query fails
          echo "<tr><td colspan='5'>No customers found</td></tr>";
      }
    ?>
  </table>
</div>


<!-- Modal -->
<div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateUserModalLabel">Update User</h5>
      </div>
      <div class="modal-body">
        <form id="update-User" enctype='multipart/form-data'>
          <!-- Add a hidden input field to pass the record ID -->
          <div class="form-group">
            <input type="text" class="form-control" id="Id" hidden value="<?= $row['Id'] ?>">
          </div>
          <div class="form-group">
            <label for="name">Username</label>
            <input type="text" class="form-control" id="Username">
          </div>
          <div class="form-group">
            <label for="desc">Email</label>
            <input type="text" class="form-control" id="Email">
          </div>
          <div class="form-group">
            <label for="price">Contact</label>
            <input type="text" class="form-control" id="Phone">
          </div>
          <div class="form-group">
            <button type="submit" style="height:40px" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Make sure to include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript to handle the modal display and populate form fields -->
<script>
  function showUpdateModal(id, username, email, phone) {
    document.getElementById('Id').value = id;
    document.getElementById('Username').value = username;
    document.getElementById('Email').value = email;
    document.getElementById('Phone').value = phone;
    var updateUserModal = new bootstrap.Modal(document.getElementById('updateUserModal'), {
      keyboard: false
    });
    updateUserModal.show();
  }

  // Ensure the DOM is fully loaded
  $(document).ready(function() {
    // Handle form submission with AJAX
    $("#update-User").on("submit", function(event) {
      event.preventDefault(); // Prevent the default form submission

      // Gather form data using getElementById
      var u_id = document.getElementById('Id').value;
      var u_name = document.getElementById('Username').value;
      var u_email = document.getElementById('Email').value;
      var u_phone = document.getElementById('Phone').value;

      // Log form data key-value pairs
      console.log('Id: ' + u_id);
      console.log('Username: ' + u_name);
      console.log('Email: ' + u_email);
      console.log('Phone: ' + u_phone);
      console.log("Form data logged successfully.");

      // Create a FormData object to send
      var formData = new FormData();
      formData.append('Id', u_id);
      formData.append('Username', u_name);
      formData.append('Email', u_email);
      formData.append('Phone', u_phone);

    
      

      // Log form data key-value pairs
      for (var pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
      }

      console.log("Form data logged successfully.");

      // Send AJAX request
      $.ajax({
        url: './controller/updateUserController.php',
        type: 'POST',
        data: formData,
        contentType: false, // Important for sending FormData
        processData: false, // Important for sending FormData
        success: function(response) {
          // Handle success
          if (response === "true") {
            alert("User updated successfully!");
            // Optionally hide the modal
            $('#updateUserModal').modal('hide');
            // Optionally refresh the page or update the UI
          } else {
            alert("Error: " + response);
          }
        },
        error: function(xhr, status, error) {
          // Handle error
          alert("An error occurred: " + error);
        }
      });
    });
  });
</script>
