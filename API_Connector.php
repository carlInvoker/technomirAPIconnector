<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;

class API_connector {
    private $client;
    function __construct()
    {
      $this->client = new Client();
    }

    public function GetPrice($apiToken, $itemCode, $brandId=0) {
      $response = $this->client->post('https://api.tehnomir.com.ua/price/search', [
          'body' => [
            'apiToken' => $apiToken,
            // 'brandId' => $brandId,         // $brandId,
            'code' => $itemCode
          ]
      ]);
      $resultArray = $response->json();

      $resultArray = $this->changeNames($resultArray);

      // var_dump($resultArray);

      return $resultArray;
    }

    private function changeNames($arr) {
      $newArray = array();
      $i = 0;
      foreach ($arr['data'] as $item) {

        foreach($item['rests'] as $subItem) {
           $newArray[$i]["Brand"] = $item['brand'];
           $newArray[$i]["Number"] = $item['code'];
           $newArray[$i]["Name"] = $item['descriptionRus'];
           $newArray[$i]["Price"] = $subItem ["price"];
           $newArray[$i]["Currency"] = $subItem['currency'];
           $newArray[$i]["Quantity"] = $subItem['quantity'];
           $newArray[$i]["SupplierCode"] = $subItem["priceLogo"];
           $newArray[$i]["Weight"] = $item["weight"];
           $newArray[$i]["DeliveryType"] = $subItem["deliveryType"];
           $newArray[$i]["DeliveryTime"] = $subItem["deliveryTime"];
           $i++;
        }
      }
      return $newArray;
    }

  }
    // HOW TO USE:::
    $connect = new API_connector();
    $connect->GetPrice('your api key variable', 'your item code', 'your brand id - default 0');

    //   $newArray[$i]["MinOrderQuantity"] =
   // $newArray["DamagedFlag"] =
   // $newArray["UsedFlag"] =
   // $newArray["RestoredFlag"] =
   // $subItem["SupplierCode"] = $subItem["priceLogo"];
   // unset($subItem["priceLogo"]);

?>
