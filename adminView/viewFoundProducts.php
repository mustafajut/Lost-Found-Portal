
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
      $sql="SELECT * FROM reportfound INNER JOIN category ON reportfound.category_name=category.category_name";
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
      <td><button class="btn btn-primary" style="height:40px" onclick="fitemEditForm('<?=$row['fitemId']?>')">Edit</button></td>
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
   