<?php
$data = '';
$url  = '';
switch ( $_POST['type'] ) {
	case 'login':
		$data = '<?xml version="1.0" encoding="ISO-8859-1"?>
<operation>
  <customer>
    <email>' . $_POST['e-mail'] . '</email>
  </customer>
  <segmentations>
    <segmentation>
      <ids>
        <externalId>6ad3db68-4498-4393-b246-e0821b221d86</externalId>
      </ids>
    </segmentation>
  </segmentations>
</operation>';
		$url  = 'https://api.mindbox.ru/v3/operations/sync?endpointId=KerastaseWebhook&operation=KerastaseCheckSegment';
		break;
	case 'register':
		$data = '
		<operation>
  <customer>
    <email>'. $_POST['e-mail'] .'</email>
<subscriptions>
      <subscription>
        <brand>Kerastase</brand>
        <pointOfContact>Email</pointOfContact>
      </subscription>
    </subscriptions>
  </customer>
  <pointOfContact>Calendar</pointOfContact>
</operation>
		';
		$url = 'https://api.mindbox.ru/v3/operations/async?endpointId=KerastaseWebhook&operation=SignUpForCalendar';
		break;
}


$curl = curl_init( $url );
curl_setopt( $curl, CURLOPT_HTTPHEADER, array(
		"Content-Type: application/xml",
		"Accept: text/xml",
		'Authorization: Mindbox secretKey="i1BdiJ11koSGnPxw8zYN"'
) );
curl_setopt( $curl, CURLOPT_POST, true );
curl_setopt( $curl, CURLOPT_POSTFIELDS, $data );
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
$result = curl_exec( $curl );
if ( curl_errno( $curl ) ) {
	throw new Exception( curl_error( $curl ) );
}

$xml  = simplexml_load_string( $result );
$json = json_encode( $xml );

echo( $json );
