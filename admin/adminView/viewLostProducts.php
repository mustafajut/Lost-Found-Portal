<div>
  <h2>Lost Items</h2>
  <a href="../Reportlost.php" class="btn btn-secondary">Add Lost Items</a>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Item Image</th>
        <th class="text-center">Item Name</th>
        <th class="text-center">Category</th>
        <th class="text-center">Lost Date</th>
        <th class="text-center">Lost Location</th>
        <th class="text-center">Lost Time</th>
        <th class="text-center">Item Description</th>
        <th class="text-center">Contact</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT reportlost.*, category.category_name FROM reportlost INNER JOIN category ON reportlost.category_name = category.category_name";
        $result = $conn->query($sql);
        $count = 1;

        // Check if $result is not false before accessing its properties
        if ($result !== false && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
      ?>
      <tr>
        <td class="text-center"><?=$count?></td>
        <td class="text-center"><img height='100px' src='<?=$row["itemimage"]?>'></td>
        <td class="text-center"><?=$row["litemName"]?></td>
        <td class="text-center"><?=$row["category_name"]?></td>
        <td class="text-center"><?=$row["LostDate"]?></td>
        <td class="text-center"><?=$row["lLostLocation"]?></td>
        <td class="text-center"><?=$row["lLostTime"]?></td>
        <td class="text-center"><?=$row["lItemDescription"]?></td>
        <td class="text-center"><?=$row["Contact"]?></td>
        <td class="text-center"><button class="btn btn-primary" style="height:40px" onclick="showUpdateFoundProductModal('<?=$row['litemId']?>', '<?=addslashes($row['litemName'])?>', '<?=addslashes($row['category_name'])?>', '<?=addslashes($row['LostDate'])?>', '<?=addslashes($row['lLostLocation'])?>', '<?=addslashes($row['lLostTime'])?>', '<?=addslashes($row['lItemDescription'])?>', '<?=addslashes($row['Contact'])?>')">Edit</button></td>
        <td class="text-center"><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['litemId']?>')">Delete</button></td>
      </tr>
      <?php
              $count++;
            }
        } else {
            // Handle the case where the query fails
            echo "<tr><td colspan='10' class='text-center'>No Items found</td></tr>";
            if ($result === false) {
              echo "<tr><td colspan='10' class='text-center'>Error: " . $conn->error . "</td></tr>";
            }
        }
      ?>
    </tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Lost Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' onsubmit="addItems()" method="POST">
            <div class="form-group">
              <label for="name">Item Name:</label>
              <input type="text" class="form-control" id="litemName" name="litemName" required>
            </div>
            <div class="form-group">
              <label for="price">Contact</label>
              <input type="tel" class="form-control" id="p_price" name="Contact" maxlength="12" placeholder="xxxx-xxxxxxx" required>
            </div>
            <div class="form-group">
              <label for="qty">Item Description:</label>
              <input type="text" class="form-control" id="p_desc" name="ItemDescription" required>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select id="category" name="category_name" required>
                <option disabled selected>Select category</option>
                <?php
                  $sql = "SELECT * from category";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="file">Choose Image:</label>
              <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Item</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="updateFoundProductModal" tabindex="-1" aria-labelledby="updateFoundProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateFoundProductModalLabel">Update Found Product</h5>
      </div>
      <div class="modal-body">
        <form id="update-FoundProduct" enctype='multipart/form-data'>
          <!-- Add a hidden input field to pass the record ID -->
          <div class="form-group">
            <input type="text" class="form-control" id="fitemId" hidden>
          </div>
          <div class="form-group">
            <label for="fitemName">Item Name</label>
            <input type="text" class="form-control" id="fitemName">
          </div>
          <div class="form-group">
            <label for="category_name">Category</label>
            <select class="form-control" id="category_name">
              <option disabled selected>Select category</option>
              <?php
                include_once "../config/dbconnect.php";
                $sql="SELECT * from category";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['category_name']."'>".$row['category_name']."</option>";
                  }
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="FDate">Date</label>
            <input type="date" class="form-control" id="FDate">
          </div>
          <div class="form-group">
            <label for="fLocation">Location</label>
            <input type="text" class="form-control" id="fLocation">
          </div>
          <div class="form-group">
            <label for="fTime">Time</label>
            <input type="time" class="form-control" id="fTime">
          </div>
          <div class="form-group">
            <label for="fItemDescription">Description</label>
            <textarea class="form-control" id="fItemDescription"></textarea>
          </div>
          <div class="form-group">
            <label for="Contact">Contact</label>
            <input type="text" class="form-control" id="Contact">
          </div>
          <div class="form-group">
            <button type="submit" style="height:40px" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript to handle the modal display and populate form fields -->
<script>
 function showUpdateFoundProductModal(id, name, category, date, location, time, description, contact) {
    document.getElementById('fitemId').value = id;
    document.getElementById('fitemName').value = name;
    document.getElementById('category_name').value = category;
    document.getElementById('FDate').value = date;
    document.getElementById('fLocation').value = location;
    document.getElementById('fTime').value = time;
    document.getElementById('fItemDescription').value = description;
    document.getElementById('Contact').value = contact;

    var updateFoundProductModal = new bootstrap.Modal(document.getElementById('updateFoundProductModal'), {
        keyboard: false
    });
    updateFoundProductModal.show();
}

// Ensure the DOM is fully loaded
$(document).ready(function() {
  // Handle form submission with AJAX
  $("#update-FoundProduct").on("submit", function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Gather form data using getElementById
    var fitemId = document.getElementById('fitemId').value;
    var fitemName = document.getElementById('fitemName').value;
    var category_name = document.getElementById('category_name').value;
    var FDate = document.getElementById('FDate').value;
    var fLocation = document.getElementById('fLocation').value;
    var fTime = document.getElementById('fTime').value;
    var fItemDescription = document.getElementById('fItemDescription').value;
    var Contact = document.getElementById('Contact').value;

    // Log form data key-value pairs
    console.log('fitemId: ' + fitemId);
    console.log('fitemName: ' + fitemName);
    console.log('category_name: ' + category_name);
    console.log('FDate: ' + FDate);
    console.log('fLocation: ' + fLocation);
    console.log('fTime: ' + fTime);
    console.log('fItemDescription: ' + fItemDescription);
    console.log('Contact: ' + Contact);
    console.log("Form data logged successfully.");

    // Create a FormData object to send
    var formData = new FormData();
    formData.append('fitemId', fitemId);
    formData.append('fitemName', fitemName);
    formData.append('category_name', category_name);
    formData.append('FDate', FDate);
    formData.append('fLocation', fLocation);
    formData.append('fTime', fTime);
    formData.append('fItemDescription', fItemDescription);
    formData.append('Contact', Contact);

    // Log form data key-value pairs
    for (var pair of formData.entries()) {
      console.log(pair[0] + ': ' + pair[1]);
    }

    console.log("Form data logged successfully.");

    // Send AJAX request
    $.ajax({
      url:"./controller/updateItemController.php",
      type: 'POST',
      data: formData,
      contentType: false, // Important for sending FormData
      processData: false, // Important for sending FormData
      success: function(response) {
        // Handle success
        if (response === "true") {
          alert("Found product updated successfully!");
          // Optionally hide the modal
          $('#updateFoundProductModal').modal('hide');
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
