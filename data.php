<?php
include_once('connect.php'); //连接数据库 
 
$action = $_GET['action']; 
if($action==""){ //读取数据，返回json 
    $query = mysql_query("select * from member where status=0"); 
        while($row=mysql_fetch_array($query)){ 
        $arr[] = array( 
            'id' => $row['id'], 
            'mobile' => substr($row['mobile'],0,3)."****".substr($row['mobile'],-4,4) 
        ); 
    } 
    echo json_encode($arr); 
}else{ //标识中奖号码 
    $id = $_POST['id']; 
    $sql = "update member set status=1 where id=$id"; 
    $query = mysql_query($sql); 
    if($query){ 
        echo '1'; 
    } 
} 
