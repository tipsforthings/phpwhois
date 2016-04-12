<?php 

if(!empty($_POST['query']) && !empty($_POST['displayType'])){

    // Grab variable from form and define valid types

    $host = $_POST['query'];
    $type = strtoupper($_POST['displayType']);
    $validtypes=array("A","MX","NS","TXT", "ALL");

    // Check that dns type is defined or allowed

    if(!defined("DNS_" . $type) or !in_array($type,$validtypes)){
       echo "Invalid DNS Type!";
    }else{

       $type = constant("DNS_" . $type);
       $rec = dns_get_record($host, $type);

       // Set result types - can be modified by using available elements from $rec array

       switch($type){
              case DNS_ALL:
                  $result = dns_get_record($host, DNS_ALL);
                  echo '<pre>';
                  echo "Result = ";
                  print_r($result);
                  echo '</pre>';
                  return;
             case DNS_A:
                    $recvals=array("Hostname" => "host","Type" => "type", "IP" => "ip");
                    break;
             case DNS_MX:
                    $recvals=array("Hostname" => "host","Type" => "type", "Target" => "target", "Priority" => "pri");
                    break;
             case DNS_NS:
                    $recvals=array("Hostname" => "host","Type" => "type", "Target" => "target");
                    break;
             case DNS_TXT:
                    $recvals=array("Hostname" => "host","Type" => "type", "Record" => "txt");
                    break;
        }

      // Output results
        echo '<pre>';
      foreach ($rec as $arr => $num){
             foreach ($recvals as $title => $value){
                    echo $title . " : " . $num[$value] . "\n";
             }
      }

      echo '</pre>';
    }
} else {

     echo "Either hostname or record type is missing";
}
