<?php 
include ('eventheader.php');

?>
<div class="container">
        <div class="mb-3 my-5">
            <label for="inputState" class="form-label">Event</label>
            <select id="addsectionid" onchange="addsection()" class="form-select">
                <option selected>Choose...</option>
                <?php
                while($assoc = mysqli_fetch_assoc($mysql_run))
                {
                    ?>
                    <option value="<?php echo $assoc ['id']; ?>"><?php echo $assoc ['event_name']; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
</div>
<div class="container">

    <div id="ajax"></div>

</div>
<script >
    function addsection()
    {
        id = document.getElementById('addsectionid').value
        $.get("addsectionajax.php",
        {
            id: id
        },
        function(data){
            document.getElementById('ajax').innerHTML = data
        });
    }
</script>
<?php include ('eventfooter.php') ?>