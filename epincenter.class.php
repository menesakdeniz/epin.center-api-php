<?php
/*
Yapımcı : Mustafa Enes Akdeniz
Github : https://github.com/menesakdeniz/epin.center-api-php
*/
class EpinCenter{
	public $ApiURL = NULL;
	public $ApiToken = "";
	private $LoginParams = "";
	private $Logined = false;
	
	function __construct($ApiToken="",$URL = "https://epin.center/api"){
		$this->ApiURL = $URL;
		$this->Logined = false;
		$this->ApiToken = "";
		if(isset($ApiToken[1])){
			$this->Logined = true;
			$this->ApiToken = $ApiToken;
		}
	}
	function Request($Service,$External = array()){
		$GeneratedURL = $this->ApiURL."?service=".$Service;
		$GeneratedURL .= "&apitoken=".$this->ApiToken;
		if(count($External) > 0){
			foreach($External as $Key=>$Value){
				$GeneratedURL .= "&".$Key."=".$Value;
			}
		}
		return json_decode(file_get_contents($GeneratedURL),true);
	}
	function BuyProduct($ProductID,$Count=1){
		$ExternalParams = array();
		$ExternalParams['productid'] = $ProductID;
		$ExternalParams['count'] = $Count;
		return $this->Request("Seller_BuyProduct",$ExternalParams);
	}
	function GameProductsList($GameID){
		$ExternalParams = array();
		$ExternalParams['gameid'] = $GameID;
		return $this->Request("Seller_GameProductsList",$ExternalParams);
	}
	function GameList(){
		return $this->Request("Seller_GameList");
	}
}
/*
$api = new EpinCenter("APITOKEN");


$GameList = $api->GameList();

if($GameList['success']){
	print_r($GameList['data']);
	echo "<br /><br /><br />";
	
	foreach($GameList['data'] as $Game){
		$Product = $api->GameProductsList($Game['id']);
		if($Product['success']){
			print_r($Product['data']);
			echo "<br />";
		}else{
			echo "Hata oluştu : ".$Product['error'];
		}
	}
}else{
	echo "Hata oluştu : ".$GameList['error'];
}
*/

/*

// Ürün Satın Alma

$BuyProduct = $api->BuyProduct(0,1);
if($BuyProduct['success']){
	$Keys = $BuyProduct['data'];
	$KeyCounter = 0;
	foreach($Keys as $Key){
		$KeyCounter++;
		echo $KeyCounter.". e-pin kodu : ".$Key."<br>";
	}
	echo "<br />";
}else{
	echo "Hata oluştu : ".$BuyProduct['error'];
}
*/


?>