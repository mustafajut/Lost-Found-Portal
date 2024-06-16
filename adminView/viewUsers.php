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
      <td><button class="btn btn-success" onclick="updateUser('<?=$row['Id']?>')">Edit</button> 
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
