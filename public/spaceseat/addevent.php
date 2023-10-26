<?php 
include ('eventheader.php');

?>
<div class="container">
    <form action="addnewevent.php" method="get">
        <div class="mb-3 my-5">
            <label for="addneweventFormControlInputEvent" class="form-label">Event Name</label>
            <input type="text" class="form-control" name="eventname" id="addneweventFormControlInputEvent" placeholder="Event Name">
        </div>


        <div class="mb-3">
            <label for="addneweventFormControlInputVenue" class="form-label">Venue</label>
            <input type="text" class="form-control" name="venue" id="addneweventFormControlInputVenue" placeholder="Venue">
        </div>


        <div class="mb-3">
            <label for="addneweventFormControlInputCity" class="form-label">City</label>
            <input type="text" class="form-control" name="city" id="addneweventFormControlInputCity" placeholder="City">
        </div>


        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Confirm</button>
        </div>
    </form>
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Event Name</th>
      <th scope="col">Venue</th>
      <th scope="col">City</th>
      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $c=1;
    while($assoc = mysqli_fetch_assoc($mysql_run))
    {
        ?>
        <tr>
            <td><?php echo $c; $c++;?></td>
            <td><?php echo $assoc ['event_name']; ?></td>
            <td><?php echo $assoc ['venue']; ?></td>
            <td><?php echo $assoc ['city']; ?></td>
            <td><?php echo $assoc ['created_at']; ?></td>
            <td><?php echo $assoc ['updated_at']; ?></td>
            
        </tr>
    <?php } ?>
  </tbody>
</table>


</div>
<?php include ('eventfooter.php') ?>