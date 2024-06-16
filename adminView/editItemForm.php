
<div class="container p-5">

<h4>Edit Item Detail</h4>
<?php
    include_once "../config/dbconnect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM reportlost WHERE litemId='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
      $catID=$row1["category_name"];
?>
<form id="update-Items" onsubmit="updateItems()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="litemId" value="<?=$row1['litemId']?>" hidden>
    </div>
    <div class="form-group">
      <label for="name">Item Name:</label>
      <input type="text" class="form-control" id="litemName" value="<?=$row1['litemName']?>">
    </div>
    <div class="form-group">
      <label for="desc">Item Description:</label>
      <input type="text" class="form-control" id="lItemDescription" value="<?=$row1['lItemDescription']?>">
    </div>
    <div class="form-group">
      <label for="price">Contact</label>
      <input type="tel" class="form-control" id="Contact" value="<?=$row1['Contact']?>">
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
         <img width='200px' height='150px' src='<?=$row1["itemimage"]?>'>
         <div>
            <label for="file">Choose Image:</label>
            <input type="text" id="existingImage" class="form-control" value="<?=$row1['itemimage']?>" hidden>
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