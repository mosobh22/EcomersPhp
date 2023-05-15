<?php
require_once "./database/db_connection.php";
$sql = "SELECT productName, productPrice, productImage FROM products";
$query = mysqli_query($conn,$sql);
$result = $query->fetch_all();
// echo json_encode($result);
// exit();
class userName{
    function __construct($name,$price,$imgurl){
        $this->name = $name;
        $this->price = $price;
        $this->imgurl = $imgurl;
    }
}
$arr = [];
if(isset($_GET['s']) && !empty($_GET['s']) ){
    $search = $_GET['s'];
    for($i = 0; $i < count($result); ++$i){
        if(str_contains($result[$i][0],$search))
            $arr[] = new userName($result[$i][0],$result[$i][1],$result[$i][2]);
    }
    if(!empty($arr)){
        echo json_encode($arr);
    }else{
        echo json_encode("Not Founded");
    }
    
}elseif(isset($_GET['s']) && empty($_GET['s'])){
    for($i = 0; $i < count($result); ++$i){
        $arr[] = new userName($result[$i][0],$result[$i][1],$result[$i][2]);
    }
    echo json_encode($arr);
}

?>
