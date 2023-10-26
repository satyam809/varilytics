<?php 
  $event = $_GET['event'];
  $event = str_replace("Darren Knights Southern Momma An Em Comedy Show","Darren",$event);
  $event = explode("-", $event);
  $event = $event[0];
  $event = explode(",", $event);
  $event = $event[0];
  $event = explode(":", $event);
  $event = $event[0];
  $event = explode("West Regionals", $event);
  $event = $event[0];
  $event = explode("Weekend", $event);
  $event = $event[0];
  $event = explode("Afterparty", $event);
  $event = $event[0];
  $event = explode("Philharmonic", $event);
  $event = $event[0];
  $event = explode("Hills", $event);
  $event = $event[0];


  // Austin City Limits Music Festival Weekend One
  // $event = str_replace(" ","",$event);
  // $event = str_replace("%20","",$event);






?>



<!DOCTYPE html>
<html>
<body>
<script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/3197_RC04/embed_loader.js"></script> <script type="text/javascript"> trends.embed.renderExploreWidget("TIMESERIES", {"comparisonItem":[{"keyword":"<?php echo $event; ?>","geo":"US","time":"today 12-m"}],"category":0,"property":""}, {"exploreQuery":"geo=US&q=<?php echo $event; ?>&date=today 12-m","guestPath":"https://trends.google.com:443/trends/embed/"}); </script>

</body>
</html>