<?php

// TODO: Implement this into /invest.php (requires Pedro's sexy HTML magic)

require_once("functions.php");
require_once("libraries/captcha/autoload.php");
	
use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;

$public_key = '6LdV3woUAAAAAHPX-EBDWqTS4GXX_XEOG_RhWP2H';
$private_key = '6LdV3woUAAAAAIED4EgUQUOl6vk2H-8SfCCV03YW';

$recaptcha = new \ReCaptcha\ReCaptcha($private_key);
$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

if(isset($_POST["submit"])) {
	$wd_add = $_POST["withdraw_address"];
	$plan = $_POST["plan_dropdown"];
	
	// User didn't select a plan
	if ($plan == -1) {
		header("Location: index.php?error=plan_not_selected#gtco-started");
		die();
	} else if (!$resp->isSuccess()) {
		header("Location: index.php?error=recaptcha_failed#gtco-started");
		die();
	}
	
	// Test if both addressed match the Bitcoin naming spec using regular expressions
	if (preg_match("^[13][a-km-zA-HJ-NP-Z1-9]{25,34}$^", $wd_add)) {
		
		// Generate a UUID
		$uuid = (rand(1,2) == 1 ? 'A' : 'Z').generateRandomString(floor(rand(12, 16)));
		
		// Create a CoinBase wallet for the user
		$account = new Account(['name' => $uuid]);
		$address = new Address(['name' => $uuid]);
		$client->createAccount($account);
		$client->createAccountAddress($account, $address);
		
		// Fetch the BTC wallet address to send in GET back to invest page
		$deposit_address = $address->getAddress();

		// Update the database
		$stmt = $db->prepare("INSERT INTO users(uuid, withdrawal_address, deposit_address, plan) VALUES(?, ?, ?, ?)");
		$stmt->execute(array($uuid, $wd_add, $deposit_address, $plan));
		
		// Send user back to invest.php with their new deposit address
		header("Location: index.php?depadd=" . $deposit_address . "&uuid=" . $uuid . "&message=success" . "#gtco-started");
	} else {
		// Send user back to invest.php with their new deposit address
		header("Location: index.php?depadd=" . $deposit_address . "&uuid=" . $uuid . "&error=invalid_wallet_address" . "#gtco-started");
	}
} else {
	header("Location: index.php?error=no_info_received#gtco-started");
	die();
}
?>