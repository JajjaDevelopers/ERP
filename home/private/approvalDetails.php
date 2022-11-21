<div id="activityApprovalDIv" style="margin-top: 10px; width:auto ">
        <div id="activityPrepareDiv">
            <!-- <input type="submit" id="activityConfirmButton" value="Cancel" class="controlButtons"> -->
            <input type="submit" id="activityCancelButton" value="Submit" class="controlButtons btn btn-primary" name="btnsubmit">
        </div>
    </div>
    <div style="display: grid;">
        <div style="margin-top: 50px; grid-column:1 ">
            <label for="preparedBy">Prepared By:</label><br>
            <?php
                echo'<input type="text" id="preparedBy" readonly name="preparedBy" class="shortInput" value="'.$_SESSION["userName"].
                    '"style="width: 100px; text-align: center;"><br>'
            ?>
        </div>
        <div style="margin-top: 50px; grid-column:2">
            <label for="verifiedBy">Verified By:</label><br>
            <input type="text" id="verifiedBy" name="verifiedBy" class="shortInput" style="width: 100px; text-align: center;"><br>
        </div>
        <div style="margin-top: 50px; grid-column:3">
            <label for="approvedBy">Approved By:</label><br>
            <input type="text" id="approvedBy" name="approvedBy" class="shortInput" style="width: 100px; text-align: center;"><br>
        </div>
    </div>
</div>