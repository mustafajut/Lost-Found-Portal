<div class="container">
    <!-- Claim form view -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Item Image</th>
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Location</th>
            </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";
        $cId = $_GET['cId'];
        $sql = "SELECT * FROM lostclaim WHERE cId = $cId";
        $result = $conn->query($sql);
        $count = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><img height="80px" src="<?= $row["proofimage"] ?>"></td>
                    <td><?= $row["lostitemname"] ?></td>
                    <td><?= $row["lostitemdesc"] ?></td>
                    <td><?= $row["lostitemlocation"] ?></td>
                </tr>
                <?php
                $count++;
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        ?>
    </table>
</div>
