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
<div class="small-12 medium-12 large-6 columns no-padding query-results" id="query-results-sidebar">
<?php
  if($query && $query['status'] == 'success') {
    echo '<span class="success label">Query a Success</span>';
  } else {
    echo '<span class="success label">Query Failed</span>';
  }  
?>
<table>
  <thead>
  <tr>
    <th></th>
    <th></th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>IP Address</td>
    <td><?php echo $query['query']; ?></td>
  </tr>
  <tr>
    <td>Locale</td>
    <td><?php echo $query['city']; ?></td>
  </tr>
  <tr>
    <td>Latitude</td>
    <td><?php echo $query['lat']; ?></td>
  </tr>
  <tr>
    <td>Longitude</td>
    <td><?php echo $query['lon']; ?></td>
  </tr>
  <tr>
    <td>Postcode/Zip</td>
    <td><?php echo $query['zip']; ?></td>
  </tr>
  <tr>
    <td>Region</td>
    <td><?php echo $query['regionName'] .'(' . $query['region'] . ')'; ?></td>
  </tr>
  <tr>
    <td>Country</td>
    <td><?php echo $query['countryName'] .'(' . $query['country'] . ')'; ?></td>
  </tr>
  <tr>
    <td>Timwzone</td>
    <td><?php echo $query['timezone']; ?></td>
  </tr>
  <tr>
    <td>Service Provider</td>
    <td><?php echo $query['isp']; ?></td>
  </tr>
  <tr>
    <td>Reverse</td>
    <td><?php echo $query['reverse']; ?></td>
  </tr>
  <tr>
    <td>AS</td>
    <td><?php echo $query['as']; ?></td>
  </tr>
  </tbody>
</table>

</div>
<div class="small-12 medium-12 large-6 columns">
<div id="map_container"><div id="map">
<iframe width="100%" height="474" frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCQB3sgUr8HPXZmOofJ4FeAZDju3PJyBo4&q=<?php echo $query['lat'] . ',' . $query['lon']; ?>" allowfullscreen>
</iframe>
</div></div>
</div>

</div>
<?php unset($query); ?>