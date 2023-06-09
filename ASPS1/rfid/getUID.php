<?php
	$UIDresult=$_POST["UIDresult"];
	$Write="<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('getresponse.php',$Write);
	file_put_contents('UIDContainer.php',$Write);

	if ($UIDresult === 'D2C77519') {
		// code to blink the LED connected to NodeMCU
		// assuming the LED is connected to GPIO pin 0
		$ip = '192.168.137.133'; // IP address of NodeMCU
		$url = "http://" . $ip . "/gpio/0"; // URL to access the GPIO pin
		$response = file_get_contents($url); // send GET request to the NodeMCU
		// if the NodeMCU returns 'OK', then the LED should blink
		if ($response === 'OK') {
			echo 'LED blinked!';
		} else {
			echo 'Failed to blink LED.';
		}
	} else {
		echo 'UID does not match.';
	}
?>