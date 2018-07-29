<!DOCTYPE html>
<html>
<head>
	<title>Hello World</title>
</head>
<body>
<?php

require __DIR__ . '/vendor/autoload.php';

$api_key = "#";

$client = new Google_Client();
$client->setApplicationName('ISTE Sheet');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setDeveloperKey($api_key);


#$jsonAuth = getenv('JSON_AUTH');
#$client->setAuthConfig(json_decode($jsonAuth, true));

$sheets = new Google_Service_Sheets($client);

$data = [];
$currentRow = 2;

$spreadsheetId = '#';
$range = 'Sheet1!A2:B4';

$response = $sheets->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();

echo "So far so good";

if (empty($values)) {
    print "No data found.\n";
} else {
    print "Name, Major:\n";
    foreach ($values as $row) {
        // Print columns A and E, which correspond to indices 0 and 4.
        printf("%s, %s\n", $row[0], $row[1]);
    }
}

?>
</body>
</html>
