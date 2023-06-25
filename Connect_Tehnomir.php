<?
  require_once  ($_SERVER["DOCUMENT_ROOT"]."/bitrix/components/itg/Search/timer.php");
  ignore_user_abort(false);
//  require_once ("./API_connector.php");
 # error_reporting(E_ALL);
  class   Tehnomir_USA extends ServeData
  {      protected $finalArray=array();
        function __construct($itemCode)
        {
          $objectTehnomir= new Tehnomir(true,$itemCode,Array("USAFilter"),Array());
          $this->finalArray=$objectTehnomir->getfinalArray();
        }



  }

  class   Tehnomir_USA_Local  extends ServeData
  {      protected $finalArray=array();
        function __construct($itemCode)
        {
          $objectTehnomir= new Tehnomir(true,$itemCode,Array("USAFilter","LocalFilter"),Array());
          $this->finalArray=$objectTehnomir->getfinalArray();
        }



  }
   class   Tehnomir_FULL   extends ServeData
  {      protected $finalArray=array();
        function __construct($itemCode)
        {
          $objectTehnomir= new Tehnomir(true,$itemCode,Array(),Array());
          $this->finalArray=$objectTehnomir->getfinalArray();
        }



  }
  class   Tehnomir_Days234
  {      private $finalArray=array();
        function __construct($itemCode)
        {
          $objectTehnomir= new Tehnomir(true,$itemCode,Array(),Array(2,3,4));
          $this->finalArray=$objectTehnomir->getfinalArray();
        }

       public function getfinalArray()
       {

        return  $this->finalArray;
        }

  }


  class   Tehnomir_Local_01234  extends ServeData
  {     protected $finalArray=array();
        function __construct($itemCode)
        {
          $objectTehnomir= new Tehnomir(true,$itemCode,Array("LocalFilter"),Array());
          foreach ($objectTehnomir->getfinalArray() as $items)
          {
           $this->finalArray[]= $items;
          }
          if (count ($objectTehnomir->getfinalArray())==0)
          {
           #var_dump($objectTehnomir->resultFromOtherSide);
           #$this->finalArray=$objectTehnomir->getfinalArray();
           $objectTehnomir2= new Tehnomir($objectTehnomir->resultFromOtherSide,$itemCode,Array(),Array(0,1,2,3,4));
          # var_dump($objectTehnomir2->getfinalArray());
           foreach ($objectTehnomir2->getfinalArray() as $items)
           {
             $this->finalArray[]= $items;
           }
          }
        }



  }

  class   Tehnomir_USA_Local_01234 extends ServeData
  {     protected $finalArray=array();
        function __construct($itemCode)
        {
            //return;
          $objectTehnomir= new Tehnomir(true,$itemCode,Array("USAFilter",),Array());
         #var_dump($objectTehnomir->getfinalArray());
          foreach ($objectTehnomir->getfinalArray() as $items)
          {
           $this->finalArray[]= $items;
          }
          $objectTehnomir= new Tehnomir(true,$itemCode,Array("LocalFilter"),Array());
          foreach ($objectTehnomir->getfinalArray() as $items)
          {
           $this->finalArray[]= $items;
          }
          if (count ($objectTehnomir->getfinalArray())==0)
          {
           #var_dump($objectTehnomir->resultFromOtherSide);
           #$this->finalArray=$objectTehnomir->getfinalArray();
           $objectTehnomir2= new Tehnomir($objectTehnomir->resultFromOtherSide,$itemCode,Array(),Array(0,1,2,3,4));
          # var_dump($objectTehnomir2->getfinalArray());
           foreach ($objectTehnomir2->getfinalArraySort() as $items)
           {
             $this->finalArray[]= $items;
           }
          }
        }



  }
   class   Tehnomir_USA_Local_01234_test  extends ServeData
  {      protected $finalArray=array();
        function __construct($itemCode)
        {
          $objectTehnomir= new Tehnomir(true,$itemCode,Array("USAFilter",),Array());
         #var_dump($objectTehnomir->getfinalArray());
          foreach ($objectTehnomir->getfinalArray() as $items)
          {
           $this->finalArray[]= $items;
          }
          $objectTehnomir= new Tehnomir(true,$itemCode,Array("LocalFilter"),Array());
          foreach ($objectTehnomir->getfinalArray() as $items)
          {
           $this->finalArray[]= $items;
          }
          if (count ($objectTehnomir->getfinalArray())==0)
          {
           #var_dump($objectTehnomir->resultFromOtherSide);
           #$this->finalArray=$objectTehnomir->getfinalArray();
           $objectTehnomir2= new Tehnomir($objectTehnomir->resultFromOtherSide,$itemCode,Array(),Array(0,1,2,3,4));
          # var_dump($objectTehnomir2->getfinalArray());
           foreach ($objectTehnomir2->getfinalArraySort() as $items)
           {
             $this->finalArray[]= $items;
           }
          }
        }



  }


 class ServeData
 {
     protected $namesItems= array(
     "Brand"=> "Brand",
    "Number"=> "Number" ,
    "Name"=>    "Name",
    "Price"=> "Price",
    "Currency"=>"Currency"  ,
    "Quantity"=> "Quantity" ,
    "MinOrderQuantity"=>"MinOrderQuantity",
    "SupplierCode"=>"SupplierCode" ,
    "Weight"=>"Weight",
    "DeliveryType"=>"DeliveryType" ,
    "DeliveryTime"=>"DeliveryTime" ,
    "DamagedFlag"=> "DamagedFlag",
    "UsedFlag"=>  "UsedFlag",
    "RestoredFlag"=> "RestoredFlag" ,
     );
     protected $USAFilter=array(
      "USAM"=>23,
      "USFF"=>23,
      "USAF"=>23,
      "ADUB"=>23,
      "AHCI"=>23,
      "WKNJ"=>23,
       "PYHZ"=>23,
      "WWHY"=>23,
      "WYPX"=>23,
      "LRBI"=>23
     );
     protected $UkraineFilter=array(


     );
     protected $antiFilter= array(
     "!KAPK"=>"",
     "!SJWO"=>"",
     "!ZQTR"=>"",
     "!VIOT"=>"",
     "!KLHE" =>"",
     "!SGFS" =>"",
     "!AOSB" => "",
     );
     protected $LocalFilter=array(
      'SGVO'=>"",
      "STOC"=>"",
      "STOK"=>"",
      "KLOD"=>"",
      //"FATV"=>""

     );
     protected $StocksRegionsShortName= Array(
     "USAM"=>"USA",
     "USFF"=>"USA",
     "USAF"=>"USA",
     "ADUB"=>"USA",
     "AHCI"=>"USA",
      "WKNJ"=>"USA",
      "PYHZ"=>"USA",
      "WWHY"=>"USA",
      "WYPX"=>"USA",
      "LRBI"=>"USA",
     "SGVO"=>"UW1",
     "STOC"=>"UW1",
     "STOK"=>"UW1",
     "KLOD"=>"UW1",
     "default"=>"UW1"
     );
     protected $StocksNames= Array(
     "USAM"=>"USA",
     "USFF"=>"USA",
     "USAF"=>"USA",
     "ADUB"=>"USA",
      "AHCI"=>"USA",
      "WKNJ"=>"USA",
      "PYHZ"=>"USA",
      "WWHY"=>"USA",
      "WYPX"=>"USA",
      "LRBI"=>"USA",
     "SGVO"=>"tehnomir",
     "STOC"=>"tehnomir",
     "STOK"=>"tehnomir",
     "KLOD"=>"tehnomir",
     "default"=>"tehnomir"
     );
     protected $RegionsColors= array(
      "USA"=>"#e3e3e3",
      "default"=>"#eed5d5"
     );
     protected $USA="USA";
     function __construct()
     {

     }
     public function  getfinalArraySort()
       {
           $BArray=Array();
           foreach ($this->finalArray as $key=>$item)
           {
               if (!isset($BArray[$item[$this->namesItems['DeliveryTime']]]))
               {
                    $BArray[$item[$this->namesItems['DeliveryTime']]]=$item;
               } else
               {
                  if ($BArray[$item[$this->namesItems['DeliveryTime']]][$this->namesItems['Price']]>$item[$this->namesItems['Price']])
                  {
                     $BArray[$item[$this->namesItems['DeliveryTime']]]=$item;
                  }
               }

           }
           $finalArray=Array();
           foreach ($BArray as $deliveryTime=>$item)
           {
              $finalArray[]= $item;
           }

        return  $finalArray;
       }
     public function getfinalArray()
       {

        return  $this->finalArray;
       }
       public function Get_PRICEREGIONINCURRENCY($SupplierCode,$Price,$COEF,$koefPrice,$Rate)
     {
          if($this->StocksNames[$SupplierCode]==$this->USA)
          {
           $PRICEREGIONP= $Price-($Price*0.03);
           $PRICEREGION=$PRICEREGIONP*$COEF ;
          }
          else
          {
            $PRICEREGIONP= $Price;
            $PRICEREGION= $Price*$koefPrice;

          }
          return  $PRICEREGION*$Rate;


     }
     public function Get_PRICEREGION($SupplierCode,$Price,$COEF,$koefPrice)
     {
          if($this->StocksNames[$SupplierCode]==$this->USA)
          {
           $PRICEREGIONP= $Price-($Price*0.03);
           $PRICEREGION=$PRICEREGIONP*$COEF ;
          }
          else
          {
            $PRICEREGIONP= $Price;
            $PRICEREGION= $Price*$koefPrice;

          }
          return  $PRICEREGION;


     }
 }
  class Tehnomir  extends ServeData
  {
    private $client;
     protected $finalArray=array();
     private $IArray=array();
     private $resultArray=array();
    /* private $namesItems= array(
     "Brand"=> "Brand",
    "Number"=> "Number" ,
    "Name"=>    "Name",
    "Price"=> "Price",
    "Currency"=>"Currency"  ,
    "Quantity"=> "Quantity" ,
    "MinOrderQuantity"=>"MinOrderQuantity",
    "SupplierCode"=>"SupplierCode" ,
    "Weight"=>"Weight",
    "DeliveryType"=>"DeliveryType" ,
    "DeliveryTime"=>"DeliveryTime" ,
    "DamagedFlag"=> "DamagedFlag",
    "UsedFlag"=>  "UsedFlag",
    "RestoredFlag"=> "RestoredFlag" ,
     );
     private $USAFilter=array(
      "USAM"=>14,
      "USFF"=>14,
      "USAF"=>14,
      "ADUB"=>14,

     );
     private $UkraineFilter=array(


     );
     private $LocalFilter=array(
      'SGVO'=>"",
      "STOC"=>"",
      "STOK"=>"",
      "KLOD"=>"",

     );
     private $StocksRegionsShortName= Array(
     "USAM"=>"USA",
     "USFF"=>"USA",
     "USAF"=>"USA",
     "ADUB"=>"USA",
     "SGVO"=>"UW1",
     "STOC"=>"UW1",
     "STOK"=>"UW1",
     "KLOD"=>"UW1",
     "default"=>"UW1"
     );
     private $StocksNames= Array(
     "USAM"=>"USA",
     "USFF"=>"USA",
     "USAF"=>"USA",
     "ADUB"=>"USA",
     "SGVO"=>"tehnomir",
     "STOC"=>"tehnomir",
     "STOK"=>"tehnomir",
     "KLOD"=>"tehnomir",
     "default"=>"tehnomir"
     );
     private $RegionsColors= array(
      "USA"=>"#e3e3e3",
      "default"=>"#eed5d5"
     );
     private $USA="USA"; */
     private $commonFilter=Array();
     public $resultFromOtherSide;
    function __construct($FromOtherSide=false,$itemCode,$filtersNames=Array(),$deliveryTimeNeeded=Array(),$brand="")
    {
        if ($FromOtherSide==true)
        {
         $this->client = @new SoapClient('http://tehnomir.com.ua/ws/soap.wsdl', array('encoding'=>'cp1251','connection_timeout'=>5,'exceptions=>true'));

         // HOW TO USE:::
         // $this->client = new API_connector();
         // $this->client->GetPrice('your api key variable', $itemCode, 'your brand id - default 0');

         $this->commonFilter=$this->makeCommonFilter($filtersNames);
         #var_dump($this->commonFilter);
         $resultFromOtherSide=$this->client->GetPrice($itemCode, $brand, '%Login%', '%Password%');
        }
        elseif (is_array($FromOtherSide))
        {
          $resultFromOtherSide=$FromOtherSide;
        }
        #var_dump($resultFromOtherSide);
        $this->resultFromOtherSide=$resultFromOtherSide;
        $iResult=$this->FilterByStock($this->commonFilter,$resultFromOtherSide);
        $iResult=$this->AntiFilterByStock($iResult);
        $this->ArangeByDeliveryTimeStockName($iResult);
        if (count($this->IArray)==0)return;
        if (count($deliveryTimeNeeded)==0)
        {
           foreach ($this->IArray as $days=>$supplierCode)
           {
               foreach ($supplierCode as $sp=>$item)
               {
                  $this->finalArray[]=$item;
               }

           }

        }else
        {
            foreach ($deliveryTimeNeeded as $deliveryDays)
            {
                if (isset($this->IArray["DT_".$deliveryDays]))
                {
                 foreach ($this->IArray["DT_".$deliveryDays] as $supplierCode=>$item)
                 {
                    $this->finalArray[]=$item;
                 }
                }

            }
        }
       /* $this->ArangeByDeliveryTime($iResult);
        if (count($this->IArray)==0)return;
        if (count($deliveryTimeNeeded)==0)
        {
           foreach ($this->IArray as $days=>$item)
           {
              $this->finalArray[]=$item;
           }

        }else
        {
            foreach ($deliveryTimeNeeded as $deliveryDays)
            {
                if (isset($this->IArray["DT_".$deliveryDays]))
                $this->finalArray[]=$this->IArray["DT_".$deliveryDays];
            }
        }*/
       # $this->ArangeByDeliveryTime($this->client->GetPrice($itemCode, $brand, 'service@parts.avtodok.com.ua', '251110'));
        #($deliveryTimeNeeded=="")?$this->finalArray=$this->IArray:$this->finalArray=$this->IArray["DT_".$deliveryTimeNeeded];

    }

    private function ArangeByDeliveryTime($resultArray)
    {
        $namesItems=$this->namesItems;
      foreach ($resultArray as $item)
      {
         $IArray["DT_".$item[$namesItems['DeliveryTime']]]["Number"]=$item[$namesItems['Number']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]]["Name"]=$item[$namesItems['Name']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]]["Price"] =$item[$namesItems['Price']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]]["Quantity"]=$item[$namesItems['Quantity']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]]["Currency"] =$item[$namesItems['Currency']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]]["Brand"] =$item[$namesItems['Brand']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]]["SupplierCode"] =$item[$namesItems['SupplierCode']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]]["DeliveryTime"] =
         (array_key_exists($item[$namesItems['SupplierCode']],$this->commonFilter) &&$this->commonFilter[$item[$namesItems['SupplierCode']]]!="" )?
          $this->commonFilter[$item[$namesItems['SupplierCode']]]:intval($item[$namesItems['DeliveryTime']])+1;
          $IArray["DT_".$item[$namesItems['DeliveryTime']]]["REGIONR"]=
          array_key_exists($item[$namesItems['SupplierCode']],$this->StocksNames)? $this->StocksNames[$item[$namesItems['SupplierCode']]]:$this->StocksNames["default"];
          $IArray["DT_".$item[$namesItems['DeliveryTime']]]["REGION"]=
          array_key_exists($item[$namesItems['SupplierCode']],$this->StocksRegionsShortName)? $this->StocksRegionsShortName[$item[$namesItems['SupplierCode']]]:$this->StocksRegionsShortName["default"];
           $IArray["DT_".$item[$namesItems['DeliveryTime']]]["CS"]=
           array_key_exists($this->StocksNames[$item[$namesItems['SupplierCode']]],$this->RegionsColors)? $this->RegionsColors[$this->StocksNames[$item[$namesItems['SupplierCode']]]]:$this->RegionsColors["default"];
         #$IArray["DT_".$item[$namesItems['DeliveryTime']]]["DeliveryTime"] =intval($item[$namesItems['DeliveryTime']]);
         #$IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]][""] =$item[$namesItems['']];
        # $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]][""] =$item[$namesItems['']];

      }
       $this->IArray=$IArray;
    }
    private function ArangeByDeliveryTimeStockName($resultArray)
    {
        $namesItems=$this->namesItems;
      foreach ($resultArray as $item)
      {
        /* if (isset($IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["Number"]))
         {

         } */
         $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["Number"]=$item[$namesItems['Number']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["Name"]=$item[$namesItems['Name']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["Price"] =$item[$namesItems['Price']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["Quantity"]=$item[$namesItems['Quantity']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["Currency"] =$item[$namesItems['Currency']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["Brand"] =$this->CorrectBrand($item[$namesItems['Brand']]);
         $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["SupplierCode"] =$item[$namesItems['SupplierCode']];
         $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["DeliveryTime"] =intval($item[$namesItems['DeliveryTime']])+1;
         $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["DeliveryTime"] =
         (array_key_exists($item[$namesItems['SupplierCode']],$this->commonFilter) &&$this->commonFilter[$item[$namesItems['SupplierCode']]]!="" )?
          $this->commonFilter[$item[$namesItems['SupplierCode']]]:intval($item[$namesItems['DeliveryTime']])+1;
          $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["REGIONR"]=
          array_key_exists($item[$namesItems['SupplierCode']],$this->StocksNames)? $this->StocksNames[$item[$namesItems['SupplierCode']]]:$this->StocksNames["default"];
          $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["REGION"]=
          array_key_exists($item[$namesItems['SupplierCode']],$this->StocksRegionsShortName)? $this->StocksRegionsShortName[$item[$namesItems['SupplierCode']]]:$this->StocksRegionsShortName["default"];
           $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]]["CS"]=
           array_key_exists($this->StocksNames[$item[$namesItems['SupplierCode']]],$this->RegionsColors)? $this->RegionsColors[$this->StocksNames[$item[$namesItems['SupplierCode']]]]:$this->RegionsColors["default"];

         #$IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]][""] =$item[$namesItems['']];
        # $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]][""] =$item[$namesItems['']];

      }
       $this->IArray=$IArray;
    }
     private function ArangeByStock($resultArray)
     {
         $namesItems=$this->namesItems;
         foreach ($resultArray as $item)
      {
         $IArray[$item[$namesItems['SupplierCode']]]["NumberT"]=$item[$namesItems['Number']];
         $IArray[$item[$namesItems['SupplierCode']]]["NameT"]=$item[$namesItems['Name']];
         $IArray[$item[$namesItems['SupplierCode']]]["PriceT"] =$item[$namesItems['Price']];
         $IArray[$item[$namesItems['SupplierCode']]]["QuantityT"]=$item[$namesItems['Quantity']];
         $IArray[$item[$namesItems['SupplierCode']]]["CurrencyT"] =$item[$namesItems['Currency']];
         $IArray[$item[$namesItems['SupplierCode']]]["BrandT"] =$this->CorrectBrand($item[$namesItems['Brand']]);
         $IArray[$item[$namesItems['SupplierCode']]]["SupplierCodeT"] =$item[$namesItems['SupplierCode']];
         $IArray[$item[$namesItems['SupplierCode']]]["DeliveryTimeT"] =intval($item[$namesItems['DeliveryTime']])+1;
         #$IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]][""] =$item[$namesItems['']];
        # $IArray["DT_".$item[$namesItems['DeliveryTime']]][$item[$namesItems['SupplierCode']]][""] =$item[$namesItems['']];



      }
       $this->IArray=$IArray;
     }
     private function makeCommonFilter($filterNamesArray)
     {
         $commonFilterArray=array();
         foreach ($filterNamesArray as $filterName)
         {
             foreach ($this->{$filterName} as $name=>$filter)
             {
                 $commonFilterArray[$name]=$filter;
             }

         }

         return $commonFilterArray;
     }
     private function FilterByStock($filterArray,$resultArray)
     {
         if (count($filterArray)==0)
         {

           return $resultArray;
         }#
         $namesItems=$this->namesItems;
         $returnArray=array();
         foreach ($resultArray as $item)
         {

                  if (array_key_exists($item[$namesItems['SupplierCode']],$filterArray))
                  {

                     $returnArray[]=$item;
                   }


         }
       #var_dump($returnArray);
       return $returnArray;
     }

     private function AntiFilterByStock($resultArray)
     {
        #var_dump($resultArray);
        $returnArray=array();
        $namesItems=$this->namesItems;
         foreach ($resultArray as $item)
         {

             if (array_key_exists("!".$item[$namesItems['SupplierCode']],$this->antiFilter))
             {
                continue;
             } else
             {
                  $returnArray[]=$item;
             }

         }
          #var_dump($returnArray);
         return $returnArray;
     }
    public function getfinalArray()
    {

     return  $this->finalArray;
    }
      private function CorrectBrand($Brand)
      {
          $BrandCorrectionArray=Array(
              "Hyundai / KIA"=>"HYUNDAI",
              "GENERALMOTORS"=>"GM",
              "ACDELCO"=> "AC Delco",
              "VAG"=>"Volkswagen"

          );
          if (isset($BrandCorrectionArray[$Brand]))
              return $BrandCorrectionArray[$Brand];
          else return $Brand;
      }


  }


?>
