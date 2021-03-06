<?
// CRM server conection data
define('CRM_HOST', 'mobiwhiz.bitrix24.com'); // your CRM domain name
define('CRM_PORT', '443'); // CRM server port
define('CRM_PATH', '/crm/configs/import/lead.php'); // CRM server REST service path

// CRM server authorization data
define('CRM_LOGIN', 'shah@mobiwhiz.com'); // login of a CRM user able to manage leads
define('CRM_PASSWORD', 'Dell1234'); // password of a CRM user
// OR you can send special authorization hash which is sent by server after first successful connection with login and password
//define('CRM_AUTH', 'e54ec19f0c5f092ea11145b80f465e1a'); // authorization hash

/********************************************************************************************/

// POST processing
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

	// get lead data from the form
	$postData = array(
		'TITLE' => $_POST['qrytype'],
		'PHONE_WORK' => $_POST['phone'],
		'EMAIL_WORK' => $_POST['email'],
		'NAME' => $_POST['name'],
		'COMMENTS' => $_POST['comments'],
	);
	//echo print_r($postData,true);
	// append authorization data
	if (defined('CRM_AUTH'))
	{
		$postData['AUTH'] = CRM_AUTH;
	}
	else
	{
		$postData['LOGIN'] = CRM_LOGIN;
		$postData['PASSWORD'] = CRM_PASSWORD;
	}

	// open socket to CRM
	$fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
	if ($fp)
	{
		// prepare POST data
		$strPostData = '';
		foreach ($postData as $key => $value)
			$strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);

		// prepare POST headers
		$str = "POST ".CRM_PATH." HTTP/1.0\r\n";
		$str .= "Host: ".CRM_HOST."\r\n";
		$str .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$str .= "Content-Length: ".strlen($strPostData)."\r\n";
		$str .= "Connection: close\r\n\r\n";

		$str .= $strPostData;
		//echo "1";
		// send POST to CRM
		fwrite($fp, $str);

		// get CRM headers
		$result = '';
		while (!feof($fp))
		{
			$result .= fgets($fp, 128);
		}
		fclose($fp);
		// echo "2";
		// echo $result;
		// cut response headers
		$output = -1;
		$response = explode("\r\n\r\n", $result);
		$code = str_replace("'",'"',$response[1]);

		$code = json_decode($code,true);
		if (!empty($code['ID'])){
			$output = $code['ID'];
		}
	}
	else
	{
		
		$output = -1;
	}
}
else
{
	
	$output = -1;
}

?>
    <?=$output;?>
