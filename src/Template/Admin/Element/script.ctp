<script type="text/javascript">
    var startingPoint1Obj = {};
    var startingPoint2Obj = {};
    var startingPoint3Obj = {};
    var startingPoint4Obj = {};
    var endPoint1Obj = {};
    var endPoint2Obj = {};
    var endPoint3Obj = {};
    var endPoint4Obj = {};

<?php
//print_r($dataArr);die;
foreach ($dataArr as $k => $val) {
    
    if (trim($val["invoiceKey"]) == "startingpoint") {
        $dataEndpoint = $val["data"];
        $strArr = explode("===", $dataEndpoint);
        $k = array_search(',,,', $strArr);
        unset($strArr[$k]);
        $strArr = array_values(array_filter($strArr));
        $endPoint4 = $endPoint3 = $endPoint2 = $endPoint1 = "";
//        print_r($strArr);die;
        for ($i = 0; $i < count($strArr); $i++) {
            $spArr = explode(",", $strArr[$i]);
            $spArr[3] = isset($spArr[3]) ? $spArr[3] : "";
            $spArr[2] = isset($spArr[2]) ? $spArr[2] : "";
            $spArr[1] = isset($spArr[1]) ? $spArr[1] : "";
            $endPoint1 .= $spArr[0] . ",";
            $endPoint2 .= $spArr[1] . ",";
            $endPoint3 .= $spArr[2] . ",";
            $endPoint4 .= $spArr[3] . ",";
//            print_r($endPoint3);die;
            ?>
                endPoint1Obj.s<?= str_replace([' ','/','.','(',')'], '', $spArr[0]) ?> = "<?= $strArr[$i] ?>";
                endPoint2Obj.s<?= str_replace([' ','/','.','(',')'], '', $spArr[1]) ?> = "<?= $strArr[$i] ?>";
                endPoint3Obj.s<?= str_replace([' ','/','.','(',')'], '', $spArr[2]) ?> = "<?= $strArr[$i] ?>";
                endPoint4Obj.s<?= str_replace([' ','/','.','(',')'], '', $spArr[3]) ?> = "<?= $strArr[$i] ?>";
            <?php //echo '-->'.$i.'<--';
        }
//    }
//    if (trim($val["invoiceKey"]) == "startingpoint") {
//        $dataEndpoint = $val["data"];
//        $strArr = explode("===", $dataEndpoint);
//        die('sdfasdf');
        $startingPoint4 = $startingPoint3 = $startingPoint2 = $startingPoint1 = "";
        for ($i = 0; $i < count($strArr); $i++) {
            $spArr = explode(",", $strArr[$i]);
            $spArr[3] = isset($spArr[3]) ? $spArr[3] : "";
            $spArr[2] = isset($spArr[2]) ? $spArr[2] : "";
            $spArr[1] = isset($spArr[1]) ? $spArr[1] : "";
            $startingPoint1 .= $spArr[0] . ",";
            $startingPoint2 .= $spArr[1] . ",";
            $startingPoint3 .= $spArr[2] . ",";
            $startingPoint4 .= $spArr[3] . ",";
            ?>
                startingPoint1Obj.s<?= str_replace([' ','/','.','(',')'], '', $spArr[0]) ?> = "<?= $strArr[$i] ?>";
                startingPoint2Obj.s<?= str_replace([' ','/','.','(',')'], '', $spArr[1]) ?> = "<?= $strArr[$i] ?>";
                startingPoint3Obj.s<?= str_replace([' ','/','.','(',')'], '', $spArr[2]) ?> = "<?= $strArr[$i] ?>";
            <?php
            //if(isset($spArr[3])){
            ?>
                startingPoint4Obj.s<?= str_replace([' ','/','.','(',')'], '', $spArr[3]) ?> = "<?= $strArr[$i] ?>";
            <?php
            //}
            ?>

            <?php
        }
    }
}
?>
</script>
<?php
$startingPoint1 = substr($startingPoint1, 0, -1);
$startingPoint2 = substr($startingPoint2, 0, -1);
$startingPoint3 = substr($startingPoint3, 0, -1);
$startingPoint4 = substr($startingPoint4, 0, -1);



$endPoint1 = substr($endPoint1, 0, -1);
$endPoint2 = substr($endPoint2, 0, -1);
$endPoint3 = substr($endPoint3, 0, -1);
$endPoint4 = substr($endPoint4, 0, -1);
?>
<script>
    var startingPoint1 = "<?= $startingPoint1; ?>";
    var startingPoint2 = "<?= $startingPoint2; ?>";
    var startingPoint3 = "<?= $startingPoint3; ?>";
    var startingPoint4 = "<?= $startingPoint4; ?>";

    var endPoint1 = "<?= $endPoint1; ?>";
    var endPoint2 = "<?= $endPoint2; ?>";
    var endPoint3 = "<?= $endPoint3; ?>";
    var endPoint4 = "<?= $endPoint4; ?>";

    $(function () {

        var startingPoint1Arr = startingPoint1.split(',');
        var startingPoint2Arr = startingPoint2.split(',');
        var startingPoint3Arr = startingPoint3.split(',');
        var startingPoint4Arr = startingPoint4.split(',');

        var endPoint1Arr = endPoint1.split(',');
        var endPoint2Arr = endPoint2.split(',');
        var endPoint3Arr = endPoint3.split(',');
        var endPoint4Arr = endPoint4.split(',');



        $("#starting_point1").autocomplete({
            source: startingPoint1Arr
        });
        $("#starting_point2").autocomplete({
            source: startingPoint2Arr
        });

        $("#starting_point3").autocomplete({
            source: startingPoint3Arr
        });
        $("#starting_point4").autocomplete({
            source: startingPoint4Arr
        });

        $("#ending_point1").autocomplete({
            source: endPoint1Arr
        });
        $("#ending_point2").autocomplete({
            source: endPoint2Arr
        });
        $("#ending_point3").autocomplete({
            source: endPoint3Arr
        });
        $("#ending_point4").autocomplete({
            source: endPoint4Arr
        });
        $("#starting_point1").blur(function () {
            if (startingPoint1Obj.hasOwnProperty("s" + $("#starting_point1").val().replace(" ", ""))) {
                strArr = startingPoint1Obj["s" + $("#starting_point1").val().replace(" ", "")].split(",");
                $("#starting_point2").val((typeof strArr[1] === 'undefined') ? "" : strArr[1]);
                $("#starting_point3").val((typeof strArr[2] === 'undefined') ? "" : strArr[2]);
                $("#starting_point4").val((typeof strArr[3] === 'undefined') ? "" : strArr[3]);
            }
        });
        /*
         $("#starting_point2").blur(function () {
         if (startingPoint2Obj.hasOwnProperty("s" + $("#starting_point2").val().replace(" ", ""))) {
         strArr = startingPoint2Obj["s" + $("#starting_point2").val().replace(" ", "")].split(",");
         //console.log(strArr);return;
         $("#starting_point1").val((typeof strArr[0] === 'undefined') ? "" : strArr[0]);
         $("#starting_point3").val((typeof strArr[2] === 'undefined') ? "" : strArr[2]);
         $("#starting_point4").val((typeof strArr[3] === 'undefined') ? "" : strArr[3]);
         }
         });
         $("#starting_point3").blur(function () {
         if (startingPoint3Obj.hasOwnProperty("s" + $("#starting_point3").val().replace(" ", ""))) {
         strArr = startingPoint3Obj["s" + $("#starting_point3").val().replace(" ", "")].split(",");
         //console.log(strArr);return;
         $("#starting_point1").val((typeof strArr[0] === 'undefined') ? "" : strArr[0]);
         $("#starting_point2").val((typeof strArr[1] === 'undefined') ? "" : strArr[1]);
         $("#starting_point4").val((typeof strArr[3] === 'undefined') ? "" : strArr[3]);
         }
         });
         $("#starting_point4").blur(function () {
         if (startingPoint4Obj.hasOwnProperty("s" + $("#starting_point4").val().replace(" ", ""))) {
         strArr = startingPoint4Obj["s" + $("#starting_point4").val().replace(" ", "")].split(",");
         //console.log(strArr);return;
         $("#starting_point1").val((typeof strArr[0] === 'undefined') ? "" : strArr[0]);
         $("#starting_point2").val((typeof strArr[1] === 'undefined') ? "" : strArr[1]);
         $("#starting_point3").val((typeof strArr[2] === 'undefined') ? "" : strArr[2]);
         }
         });
         */
        $("#ending_point1").blur(function () {
            if (endPoint1Obj.hasOwnProperty("s" + $("#ending_point1").val().replace(" ", ""))) {
                strArr = endPoint1Obj["s" + $("#ending_point1").val().replace(" ", "")].split(",");
                //console.log(strArr[1]);return;
                $("#ending_point2").val((typeof strArr[1] === 'undefined') ? "" : strArr[1]);
                $("#ending_point3").val((typeof strArr[2] === 'undefined') ? "" : strArr[2]);
                $("#ending_point4").val((typeof strArr[3] === 'undefined') ? "" : strArr[3]);
            }
        });

        /*      $("#ending_point2").blur(function () {
         if (endPoint2Obj.hasOwnProperty("s" + $("#ending_point2").val().replace(" ", ""))) {
         strArr = endPoint2Obj["s" + $("#ending_point2").val().replace(" ", "")].split(",");
         //console.log(strArr[1]);return;
         $("#ending_point1").val((typeof strArr[0] === 'undefined') ? "" : strArr[0]);
         $("#ending_point3").val((typeof strArr[2] === 'undefined') ? "" : strArr[2]);
         $("#ending_point4").val((typeof strArr[3] === 'undefined') ? "" : strArr[3]);
         }
         });
         
         $("#ending_point3").blur(function () {
         if (endPoint3Obj.hasOwnProperty("s" + $("#ending_point3").val().replace(" ", ""))) {
         strArr = endPoint3Obj["s" + $("#ending_point3").val().replace(" ", "")].split(",");
         //console.log(strArr[1]);return;
         $("#ending_point1").val((typeof strArr[0] === 'undefined') ? "" : strArr[0]);
         $("#ending_point2").val((typeof strArr[1] === 'undefined') ? "" : strArr[1]);
         $("#ending_point4").val((typeof strArr[3] === 'undefined') ? "" : strArr[3]);
         }
         });
         $("#ending_point4").blur(function () {
         if (endPoint3Obj.hasOwnProperty("s" + $("#ending_point4").val().replace(" ", ""))) {
         strArr = endPoint4Obj["s" + $("#ending_point4").val().replace(" ", "")].split(",");
         //console.log(strArr[1]);return;
         $("#ending_point1").val((typeof strArr[0] === 'undefined') ? "" : strArr[1]);
         $("#ending_point2").val((typeof strArr[1] === 'undefined') ? "" : strArr[1]);
         $("#ending_point3").val((typeof strArr[2] === 'undefined') ? "" : strArr[2]);
         }
         });
         */
    });
</script>