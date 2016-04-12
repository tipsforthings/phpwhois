<?php


if (isSet($_POST['query']))
  {
  $query = $_POST['query'];

  if (!empty($_POST['displayType']))
    $output = $_POST['displayType'];
  else
    $output = 'nice';

  include_once('classes/whois.main.php');
  include_once('classes/whois.utils.php');

  $whois = new Whois();

  // Set to true if you want to allow proxy requests
  $allowproxy = false;

  // get faster but less acurate results
  $whois->deep_whois = empty($_POST['fast']);
  
  // To use special whois servers (see README)
  //$whois->UseServer('uk','whois.nic.uk:1043?{hname} {ip} {query}');
  //$whois->UseServer('au','whois-check.ausregistry.net.au');

  // Comment the following line to disable support for non ICANN tld's
  $whois->non_icann = true;

  $result = $whois->Lookup($query);
  $winfo = '';

  switch ($output)
    {
    case 'object':
      if ($whois->Query['status'] < 0)
        {
        $winfo = implode($whois->Query['errstr'],"\n<br></br>");
        }
      else
        {
        $utils = new utils;
        $winfo = $utils->showObject($result);
        }
      break;

    case 'nice':
      if (!empty($result['rawdata']))
        {
        $utils = new utils;
        $winfo = $utils->showHTML($result);
        }
      else
        {
        if (isset($whois->Query['errstr']))
          $winfo = implode($whois->Query['errstr'],"\n<br></br>");
        else
          $winfo = 'Unexpected error';
        }
      break;

    case 'proxy':
      if ($allowproxy)
        exit(serialize($result));

    default:
      if(!empty($result['rawdata']))
        {
        $winfo .= '<pre>'.implode($result['rawdata'],"\n").'</pre>';
        }
      else
        {
        $winfo = implode($whois->Query['errstr'],"\n<br></br>");
        }
    }

    print $winfo;
  }

//-------------------------------------------------------------------------

?>