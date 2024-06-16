<div id="ordersBtn">
    <h2>Claim Details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>C.N</th>
                <th>User</th>
                <th>Contact</th>
                <th>Date</th>
                <th>Item Name</th>
                <th>Status</th>
                <th>More Details</th>
            </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT * from lostclaim";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?=$row["cId"]?></td>
                    <td><?=$row["cname"]?></td>
                    <td><?=$row["ccontact"]?></td>
                    <td><?=$row["lostitemdate"]?></td>
                    <td><?=$row["lostitemname"]?></td>
                    <?php if ($row["claim_status"] == 0) { ?>
                        <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['cId']?>')">Pending</button></td>
                    <?php } else { ?>
                        <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['cId']?>')">Delivered</button></td>
                    <?php } ?>
                    <td><a class="btn btn-primary openPopup" data-href="./adminView/viewClaimDetail.php?cId=<?=$row['cId']?>" href="javascript:void(0);">View</a></td>
                </tr>
            <?php
            }
        }
        ?>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Claim Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="order-view-modal modal-body"></div>
        </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
</div>
<script>
    //for view order modal  
    $(document).ready(function(){
        $('.openPopup').on('click',function(){
            var dataURL = $(this).attr('data-href');

            $('.order-view-modal').load(dataURL,function(){
                $('#viewModal').modal({show:true});
            });
        });
    });
</script>
