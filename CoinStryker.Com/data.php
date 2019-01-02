
<?php>

//Information retrived from "How to Make a Bitcoin Price Widget Javascript, PHP, CSS & HTML" curtisy of "m1xolyd1an" @ youtube.com
    
//get PHP working and also figure out Mamp how to work with brackets
$url = "https://www.bitstamp.net/api/ticker/";
$fgc = file_get_contents($url);
$json = json_decode(fgc, true);

$price = $json["last"];
$price = number_format($price, 2);
$high = $json["high"];
$low = $json["low"];
$date = date("m-d-Y - h:i:sa");
$open =$json["open"];

if(open < $price){
//price went up
    $indicator = "+";
    $change = $price - $open;
    $percent = $change / $open;
    $percent = $percent * 100;
    percentChange = $indicator.number_format($percent, 2);
    $color = "green";
}

if(open > $price){
//price went down
    $indicator = "-";
    $change = $open - $price;
    $percent = $change / $open;
    $percent = $percent * 100;
    percentChange = $indicator.number_format($percent, 2);
    $color = "red";
}

$table = <<<EOT 
<table width="100%">
     <tr>
        <td rowspan="3" width="60%" id="lastPrice">$$price</td>
        <td align="right" style="color: $color;">$percentChange%</td>  
     </tr>
      <tr>
        <td align="right">$$high</td>
      </tr>
      <tr>
        <td align="right">$$low</td>
      </tr>
      <tr>
          <td colspan="2" align="right" id="timeDate">$date</td>
      </tr>
</table>
EOT;

echo $table;
?>
