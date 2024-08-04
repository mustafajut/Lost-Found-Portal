
<div >
  <h2>Found Items</h2>
  <a href="../Reportfound.php" class="btn btn-secondary">Add Found Items</a>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Item Image</th>
        <th class="text-center">Item Name</th>
        <th class="text-center">Category</th>
        <th class="text-center">Found Date</th>
        <th class="text-center">Found Location</th>
        <th class="text-center">Found Time</th>
        <th class="text-center">Item Description</th>
        <th class="text-center">Contact</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * FROM reportfound";
      $result=$conn->query($sql);
      $count=1;
      
      // Check if $result is not false before accessing its properties
      if ($result !== false && $result->num_rows > 0){
        while ($row=$result->fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img height='100px' src='<?=$row["fitemimage"]?>'></td>
      <td><?=$row["fitemName"]?></td>
      <td><?=$row["category_name"]?></td>      
      <td><?=$row["FDate"]?></td> 
      <td><?=$row["fLocation"]?></td> 
      <td><?=$row["fTime"]?></td>
      <td><?=$row["fItemDescription"]?></td>
      <td><?=$row["Contact"]?></td>    
      <td><button class="btn btn-primary" style="height:40px" onclick="showUpdateFoundProductModal('<?=$row['fitemId']?>', '<?=addslashes($row['fitemName'])?>', '<?=addslashes($row['category_name'])?>', '<?=addslashes($row['FDate'])?>', '<?=$row['fLocation']?>', '<?=addslashes($row['fTime'])?>', '<?=addslashes($row['fItemDescription'])?>', '<?=addslashes($row['Contact'])?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="fitemDelete('<?=$row['fitemId']?>')">Delete</button></td>
    </tr>
    <?php
            $count++;
          }
      } else {
          // Handle the case where the query fails
          echo "<tr><td colspan='10'>No Items found</td></tr>";
          echo "<tr><td colspan='10'>Error: " . mysqli_error($conn) . "</td></tr>";
      }
    ?>
</table>


  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Found Items
  </button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Found Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addItems()" method="POST">
            <div class="form-group">
              <label for="name">Item Name:</label>
              <input type="text" class="form-control" id="p_name" required>
            </div>
            <div class="form-group">
              <label for="price">Contact</label>
              <input type="tel" class="form-control" id="p_price" maxlength="12" placeholder="xxxx-xxxxxxx" required>
            </div>
            <div class="form-group">
              <label for="qty">Item Description:</label>
              <input type="text" class="form-control" id="p_desc" required>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select id="category" >
                <option disabled selected>Select category</option>
                <?php

                  $sql="SELECT * from category";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['category_id']."'>".$row['category_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file">
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
            <input type="text" class="form-control" id="FDate">
          </div>
          <div class="form-group">
            <label for="fLocation">Location</label>
            <input type="text" class="form-control" id="fLocation">
          </div>
          <div class="form-group">
            <label for="fTime">Found Time</label> <br>
            <div style="display: inline-flex; align-items: center;">
                <input type="radio" id="fmorning" name="fTime" value="Morning" checked required style="transform: scale(0.5); margin-right: 5px;">
                <label for="fmorning" style="transform: scale(0.8); margin-right: 15px;">Morning</label>
                <input type="radio" id="fafternoon" name="fTime" value="Afternoon" style="transform: scale(0.5); margin-right: 5px;">
                <label for="fafternoon" style="transform: scale(0.8); margin-right: 15px;">Afternoon</label>
                <input type="radio" id="fevening" name="fTime" value="Evening" style="transform: scale(0.5); margin-right:5px;">
                <label for="fevening" style="transform: scale(0.8); margin-right: 5px;">Evening</label>
            </div>
          </div>
          <div class="form-group">
            <label for="fItemDescription">Description</label>
            <input type="text" class="form-control" id="fItemDescription">
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
    
     // Set the radio button for time
     if (time === 'Morning') {
        document.getElementById('fmorning').checked = true;
    } else if (time === 'Afternoon') {
        document.getElementById('fafternoon').checked = true;
    } else if (time === 'Evening') {
        document.getElementById('fevening').checked = true;
    }
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
    var fTime = document.querySelector('input[name="fTime"]:checked').value;
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
      url:'./controller/updatefoundItemController.php',
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
