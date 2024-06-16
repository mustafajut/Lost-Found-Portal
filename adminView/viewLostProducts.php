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
        <td class="text-center"><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['litemId']?>')">Edit</button></td>
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
