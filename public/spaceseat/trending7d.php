<?php 
  $event = $_GET['event'];
  $event = str_replace("Darren Knights Southern Momma An Em Comedy Show","Darren",$event);
  $event = explode("-", $event);
  $event = $event[0];
  $event = explode(":", $event);
  $event = $event[0];$event = explode(",", $event);
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

//   $event = str_replace(" ","",$event);
//   $event = str_replace("%20","",$event);






?>



<!DOCTYPE html>
<html>
<body>
<!-- <script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/3261_RC05/embed_loader.js"></script> <script type="text/javascript"> trends.embed.renderExploreWidget("GEO_MAP", {"comparisonItem":[{"keyword":<?php echo $event; ?>,"geo":"US","time":"today 12-m"}],"category":0,"property":""}, {"exploreQuery":"geo=US&q=<?php echo $event; ?>&date=today 12-m","guestPath":"https://trends.google.co.in:443/trends/embed/"}); </script> -->
<!-- <script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/3261_RC05/embed_loader.js"></script> <script type="text/javascript"> trends.embed.renderExploreWidget("GEO_MAP", {"comparisonItem":[{"keyword":"<?php echo $event; ?>","geo":"US","time":"today 12-m"}],"category":0,"property":""}, {"exploreQuery":"geo=US&q=<?php echo $event; ?>&date=today 12-m","guestPath":"https://trends.google.co.in:443/trends/embed/"}); </script> -->

<script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/3261_RC06/embed_loader.js"></script> <script type="text/javascript"> trends.embed.renderExploreWidget("TIMESERIES", {"comparisonItem":[{"keyword":"<?php echo $event; ?>","geo":"US","time":"now 7-d"}],"category":0,"property":""}, {"exploreQuery":"date=now%207-d&q=<?php echo $event; ?>","guestPath":"https://trends.google.com:443/trends/embed/"}); </script>


</body>
</html>