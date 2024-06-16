
<div class="container p-5">

<h4>Edit Item Detail</h4>
<?php
    include_once "../config/dbconnect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM reportfound WHERE fitemId='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
      $catID=$row1["category_name"];
?>
<form id="update-Items" onsubmit="updateItem()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="fitemId" value="<?=$row1['fitemId']?>" hidden>
    </div>
    <div class="form-group">
      <label for="name">Item Name:</label>
      <input type="text" class="form-control" id="fitemName" value="<?=$row1['fitemName']?>">
    </div>
    <div class="form-group">
      <label for="desc">Item Description:</label>
      <input type="text" class="form-control" id="fItemDescription" value="<?=$row1['fItemDescription']?>">
    </div>
    <div class="form-group">
      <label for="price">Contact</label>
      <input type="number" class="form-control" id="Contact" value="<?=$row1['Contact']?>">
    </div>
    <div class="form-group">
      <label>Category:</label>
      <select id="category">
        <?php
          $sql="SELECT * from category WHERE category_id='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from category WHERE category_id!='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
      </select>
    </div>
      <div class="form-group">
         <img width='200px' height='150px' src='<?=$row1["fitemimage"]?>'>
         <div>
            <label for="file">Choose Image:</label>
            <!-- <input type="text" id="existingImage" class="form-control" value="<?=$row1['fitemimage']?>" hidden> -->
            <input type="file" id="newImage" value="">
         </div>
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>

    </div>