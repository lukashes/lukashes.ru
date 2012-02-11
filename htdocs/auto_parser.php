<form method="POST" action="">
	Input url of cars info page: <input type="text" name="url_for_parse" value="http://cars.auto.ru/cars/used/sale/16168222-a858.html" style="width: 500px; height: 50px; color: #111111;" />
	<br />
	<input type="submit" value="Parse phone!" />
</form>

<?php

if (isset($_POST['url_for_parse'])) {
	$sUrl = $_POST['url_for_parse'];
	
	$rHandle = curl_init();  
	curl_setopt($rHandle, CURLOPT_URL,$sUrl); // set url to post to  
	curl_setopt($rHandle, CURLOPT_FAILONERROR, 1);  
	curl_setopt($rHandle, CURLOPT_FOLLOWLOCATION, 1);// allow redirects  
	curl_setopt($rHandle, CURLOPT_RETURNTRANSFER,1); // return into a variable  
	curl_setopt($rHandle, CURLOPT_TIMEOUT, 3); // times out after 4s  
	
	// Cookies
	curl_setopt($rHandle, CURLOPT_COOKIEJAR, '/tmp/parser.jar');
	curl_setopt($rHandle, CURLOPT_COOKIEFILE, '/tmp/parcer.txt');
	
	
	//curl_setopt($rHandle, CURLOPT_POST, 1); // set POST method  
	//curl_setopt($rHandle, CURLOPT_POSTFIELDS, "url=index%3Dbooks&field-keywords=PHP+MYSQL"); // add POST fields  
	$sResult = curl_exec($rHandle); // run the whole process  
	curl_close($rHandle); 
	
	$sResult;
	
	$oDom = new DOMDocument();
	
	@$oDom->loadHTML($sResult);
	
	$oElement = $oDom->getElementById('get-sale-phones');
	
	$sRel = 'http://cars.auto.ru' . $oElement->getAttribute('rel');
	
	$rHandle = curl_init();
	
	curl_setopt($rHandle, CURLOPT_FAILONERROR, 1);  
	curl_setopt($rHandle, CURLOPT_FOLLOWLOCATION, 1);// allow redirects  
	curl_setopt($rHandle, CURLOPT_RETURNTRANSFER,1); // return into a variable  
	curl_setopt($rHandle, CURLOPT_TIMEOUT, 3); // times out after 4s  
	
	// Cookies
	curl_setopt($rHandle, CURLOPT_COOKIEJAR, '/tmp/parser.jar');
	curl_setopt($rHandle, CURLOPT_COOKIEFILE, '/tmp/parcer.txt');
	
	curl_setopt($rHandle, CURLOPT_URL, $sRel);
	
	echo $sResult = curl_exec($rHandle); // run the whole process  
	curl_close($rHandle);
}