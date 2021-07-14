# Epin.Center için geliştirilmiş PHP Api Class
Bu class epin.center için geliştirilmiştir.


## API Object Creation

```php
$api = new EpinCenter("TOKENKEY");
```

## API Game Listing

```php
$GameList = $api->GameList();
if($GameList['success']){
	print_r($GameList['data']);
}else{
	echo "Error : ".$GameList['error'];
}
```

## API Game Products Listing Reponses
```json
{
  "success": true,
  "data": [
    {
      "id": 5,
      "name": "Valorant VP"
    },
    {
      "id": 81,
      "name": "Black Desert Online"
    },
    {
      "id": 6,
      "name": "League Of Legends RP"
    },
    {
      "id": 3,
      "name": "Steam Cüzdan Kodu"
    },
    {
      "id": 4,
      "name": "PUBG Mobile UC"
    },
    {
      "id": 7,
      "name": "Zula Altın"
    }
  ],
  "error": ""
}
```

## API Game Products Listing

```php
$Product = $api->GameProductsList(5); // 5 => Valorant
if($Product['success']){
	print_r($Product['data']);
}else{
	echo "Error : ".$Product['error'];
}
```

## API Game Products Listing Reponses
```json
{
  "success": true,
  "data": [
    {
      "id": 16,
      "gid": 5,
      "name": "300 VP Valorant Points",
      "info": "Sadece Türkiye sunucusunda geçerlidir",
      "count": 832,
      "discount": 20.38,
      "oldprice": 16,
      "price": 12.74,
      "bonus": 0,
      "status": 1,
      "promoteend": 0,
      "promoteendprice": 13.6,
      "vat": 0
    },
    {
      "id": 17,
      "gid": 5,
      "name": "600 VP Valorant Points",
      "info": "Sadece Türkiye sunucusunda geçerlidir",
      "count": 773,
      "discount": 20.38,
      "oldprice": 32,
      "price": 25.48,
      "bonus": 0,
      "status": 1,
      "promoteend": 0,
      "promoteendprice": 27.2,
      "vat": 0
    },
    {
      "id": 18,
      "gid": 5,
      "name": "1250 VP Valorant Points",
      "info": "Sadece Türkiye sunucusunda geçerlidir",
      "count": 389,
      "discount": 20,
      "oldprice": 64,
      "price": 51.2,
      "bonus": 0,
      "status": 1,
      "promoteend": 0,
      "promoteendprice": 54.4,
      "vat": 0
    },
    {
      "id": 19,
      "gid": 5,
      "name": "2500 VP Valorant Points",
      "info": "Sadece Türkiye sunucusunda geçerlidir",
      "count": 90,
      "discount": 20,
      "oldprice": 125,
      "price": 100,
      "bonus": 0,
      "status": 1,
      "promoteend": 0,
      "promoteendprice": 0,
      "vat": 0
    },
    {
      "id": 20,
      "gid": 5,
      "name": "4400 VP Valorant Points",
      "info": "Sadece Türkiye sunucusunda geçerlidir",
      "count": 205,
      "discount": 20.03,
      "oldprice": 216,
      "price": 172.74,
      "bonus": 0,
      "status": 1,
      "promoteend": 0,
      "promoteendprice": 0,
      "vat": 0
    },
    {
      "id": 21,
      "gid": 5,
      "name": "8400 VP Valorant Points",
      "info": "Sadece Türkiye sunucusunda geçerlidir",
      "count": 85,
      "discount": 20.13,
      "oldprice": 400,
      "price": 319.5,
      "bonus": 0,
      "status": 1,
      "promoteend": 0,
      "promoteendprice": 0,
      "vat": 0
    }
  ],
  "error": ""
}
```


## API Buying Product

```php
$BuyProduct = $api->BuyProduct(16,1); // 16 => 300 VP
if($BuyProduct['success']){
	$Keys = $BuyProduct['data'];
	$KeyCounter = 0;
	foreach($Keys as $Key){
		$KeyCounter++;
		echo $KeyCounter.". e-pin key : ".$Key."<br>";
	}
}else{
	echo "Error : ".$BuyProduct['error'];
}
```

## API Buying Product Responses
```json
{
  "success": true,
  "data": [
    "xxx",
    "yyy",
    "zzz"
  ],
  "error": ""
}
```

## API Error Response
```json
{
  "success": false,
  "data": "",
  "error": "Bakiyeniz yetersiz(7.66 TL Eksik)!"
}
```
