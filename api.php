<?php
include "config/config.php";
$data = array();
$sql = mysqli_fetch_assoc(mysqli_query($koneksi,"select * from personal_information where person_code = '123'"));
$arr1 = array();
$arr3 = array();
$rows1 = mysqli_query($koneksi,"select *, DATE_FORMAT(start_date,'%Y-%m') as sd, DATE_FORMAT(end_date,'%Y-%m') as ed from company where id_personal = '".$sql['id']."'");
while($data1 = mysqli_fetch_assoc($rows1)){
    $arr2 = array();
    $rows2 = mysqli_query($koneksi,"select * from jobs where company_id = '".$data1['id']."'");
    while($data2 = mysqli_fetch_assoc($rows2)){
        $arr2[] = $data2;
    }
    $arr1[] = array(
        "id"=> $data1['id'],
        "company_name"=> $data1['company_name'],
        "start_date"=> $data1['sd'],
        "end_date"=> $data1['ed'],
        "id_personal"=> $data1['id_personal'],
        "job_desc" => $arr2 
    );
}

$rows3 = mysqli_query($koneksi,"select * from skill where personal_id = '".$sql['id']."'");
while($data3 = mysqli_fetch_assoc($rows3)){
    $arr3[] = $data3; 
}

$data = array(
    "id"=>$sql['id'],
    "name"=>$sql['name'],
    "email"=>$sql['email'],
    "phone_number"=>$sql['phone_number'],
    "last_position"=>$sql['last_position'],
    "linkedin"=>$sql['linkedin'],
    "website"=>$sql['website'],
    "github"=>$sql['github'],
    "person_code"=>$sql['person_code'],
    "company"=> $arr1,
    "skill" => $arr3
);
echo  json_encode($data);
?>