<?php
class API_connector {

    public function GetPrice($apiToken, $itemCode, $brandId=0) {
      $postdata = http_build_query(
        array(
          'apiToken' => $apiToken,
          // 'brandId' => $brandId,
          'code' => $itemCode,
        )
      );

      $opts = array('http' =>
          array(
              'method'  => 'POST',
              'header'  => 'Content-Type: application/x-www-form-urlencoded; charset=cp1251',
              'content' => $postdata
          )
      );

      $context  = stream_context_create($opts);
      $result = file_get_contents('https://api.tehnomir.com.ua/price/search', false, $context);
      $result = json_decode($result);
      $resultArray = $this->changeNames($result);
      var_dump($resultArray);
      // return $resultArray;
    }

    private function changeNames($dataObject) {
      $newArray = array();
      $i = 0;
      foreach ($dataObject->data as $item) {

        foreach($item->rests as $subItem) {
           $newArray[$i]["Brand"] = $item->brand;
           $newArray[$i]["Number"] = $item->code;
           $newArray[$i]["Name"] = mb_convert_encoding($item->descriptionRus, "cp1251", "UTF-8");
           $newArray[$i]["Price"] = $subItem->price;
           $newArray[$i]["Currency"] = $subItem->currency;
           $newArray[$i]["Quantity"] = $subItem->quantity;
           $newArray[$i]["SupplierCode"] = $subItem->priceLogo;
           $newArray[$i]["Weight"] = $item->weight;
           $newArray[$i]["DeliveryType"] = $subItem->deliveryType;
           $newArray[$i]["DeliveryTime"] = $subItem->deliveryTime;
           $i++;
        }

      }
      return $newArray;
    }

  }
    // HOW TO USE:::
    $connect = new API_connector();
    $connect->GetPrice('your api key variable', 'your item code', 'your brand id - default 0');

   // $newArray[$i]["MinOrderQuantity"] =
   // $newArray["DamagedFlag"] =
   // $newArray["UsedFlag"] =
   // $newArray["RestoredFlag"] =
   // $subItem["SupplierCode"] = $subItem["priceLogo"];
   // unset($subItem["priceLogo"]);

?>
