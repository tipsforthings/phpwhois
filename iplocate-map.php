<?php


if (isSet($_POST['query']))
  {
  // $ip = $_POST['query'];

  // $ip = gethostbyname('www.example.com');

  $query = $_POST['query'];

  if (filter_var($query, FILTER_VALIDATE_IP) === false) {
      $ip = gethostbyname($query);
  } else {
      $ip = $query;
  }
  $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));



}
?>

<div class="row">
<div class="small-12 medium-12 large-12 columns">
<div id="map_container"><div id="map">
<?php
  if($query && $query['status'] == 'success') {
    echo '<span class="success label">Query a Success</span>';
  } else {
    echo '<span class="success label">Query Failed</span>';
  }  
?>
<iframe width="100%" height="474" frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCQB3sgUr8HPXZmOofJ4FeAZDju3PJyBo4&q=<?php echo $query['lat'] . ',' . $query['lon']; ?>" allowfullscreen>
</iframe>

</div></div>
</div>

</div>
<?php unset($query); ?>