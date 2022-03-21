<tbody>
  <?php 
    include("backend/get_data.php");
    while ($row = $result->fetch_array()){
  ?>
  <tr class = "text-secondary table-row">
    <td class = " td pt-3 username <?php if ($row['Email'] == $_SESSION['login_email']) {print 'text-info';}?>">
      <?php 
        if ($row['Email'] == $_SESSION['login_email']) {
          print '<span class = "text-info bi bi-check-circle-fill mr-1"></span>';
        }
        print $row["Username"];
      ?>
    </td>
    <td class = "pt-3 email td"><?php print $row['Email']?></td>
    <td class = "pt-3 phone td"><?php print $row['Phone']?></td>
    <td class = "pt-3 gender td"><?php print $row['Gender']?></td>
    <td class = "pt-3 location td"><?php print $row['Location']?></td>
    <td class = "pt-3 created_on td"><?php print $row['Created_on']?></td>
    <td class = "td d-flex justify-content-center pr-3 pt-3">
        <span style = "font-style: monospace; width:fit-content" 
          class = "badge-status 
          <?php if ($row['Status'] == "active") {print "text-primary bi bi-check-circle-fill";} else {print "text-danger bi bi-dash-circle-fill";}?>" 
          id = "status-button">
        </span>
    </td>
    <td class = "pt-3 td">
        <span style = "on-off font-style: monospace; width:fit-content" 
          class = "badge-status 
          <?php if ($row['Active'] == "online") {print "text-success bi bi-check-circle-fill";} else {print "text-secondary bi bi-dash-circle-fill";}?>" 
          id = "status-button">
          <?php if ($row['Active'] == "online"){print "online";} else{print "offline";} ?>
        </span>
    </td>
    <td class = "pt-3 td"><?php print $row['Type']?></td>
    <td class = "container-fluid  td" style="background-color: inherit; width: fit-content">
      <div class="dropdown w-auto bg-none " style="width: fit-content;">
        <button class="btn btn-primary text-light py-1 show dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
              Show
        </button>
        <div class="dropdown-menu bg-light p-0" aria-labelledby="triggerId">
          <button value = "<?php print $row['Email']?>" type="button" class="dropdown-item btns text-primary edit" 
            name = "edit" onclick="set_edit_val(this.value)" data-toggle="modal" data-target="#Edit-Modal" data-backdrop = "static" 
            data-keyboard = "false">
            <span class = "bi bi-pencil-square" data-toggle = "tooltip" title="edit this account" placement = "right">
              Edit
            </span>
          </button>
          <button  value = "<?php print $row['Email']?>" type="button" class="dropdown-item btns text-danger delete" 
            name = "delete" data-toggle="modal" data-target="#Delete-Modal" data-backdrop = "static"  onclick="set_delete_val(this.value)"
            data-keyboard = "false"
            <?php if ($row['Email'] == $_SESSION['login_email']) {
              print 'disabled';
            }?>>
            <span class = "bi bi-trash-fill" data-toggle="tooltip" title="delete this account" placement = "right">
              Delete
            </span>
          </button>
          <button value = "<?php print $row['Email']?>" type="button" class="dropdown-item btns text-warning status" 
            name = "status" data-toggle="modal" data-target="#status-modal" data-backdrop = "static" 
            data-keyboard = "false" onclick="set_status_email(this.value)"
            <?php if ($row['Email'] == $_SESSION['login_email']) {
              print 'disabled';
            }?>>
            <span class = "bi bi-exclamation-diamond-fill 
              <?php if ($row['Status'] == "active") {print "active";} else {print "inactive";}?>"
              data-toggle = "tooltip" title="<?php if ($row['Status'] == "active") {print "Dactivate";} else {print "Activate";}?> this account" 
              placement = "right">
              <?php if ($row['Status'] == "active") {print "Deactivate";} else {print "Activate";}?>
            </span>
          </button>
        </div>
      </div>
    </td>
  </tr>
  <?php
    }
  ?>
</tbody>