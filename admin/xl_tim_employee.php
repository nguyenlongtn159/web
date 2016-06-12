<?php
include("../models/m_employee.php");
$gttim=$_POST["gttim"];
if($gttim == "")
{
	echo "<p align='center'>Chưa nhập tên: <button onclick='myFunction()' value='OK'>OK</button> </p>";
}
else{
$m_employee = new M_employee();
$employee=$m_employee->timkiem($gttim);

//xu ly du lieu

?>
<link rel="stylesheet" type="text/css" href="../public/bootstrap/dist/css/bootstrap.min.css">
<h3> Danh sách nhân viên </h3>
<table class="table table-hover"><tr class="active"><td>Mã nhân viên: </td><td>Tên :</td><td>department: </td><td>Job title: </td><td>email: </td><td>hình: </td><td></td><td></td><td></td></tr>
<?php
foreach($employee as $nv) {


echo "<tr><td>".$nv->id."</td>";
	echo "<td> ".$nv->name."</td>";
	echo "<td> ".$nv->department."</td>";
	echo "<td>".$nv->job_title."</td>";
	echo "<td>".$nv->email."</td>";
	echo "<td><img src='../public/images/employee/".$nv->hinh."' height='150px' /></td>";
	echo"<td><a href='chi_tiet_employee.php?id=".$nv->id."'> [ Xem chi chi tiết ] </a></td>"; 
	echo"<td><a href='edit_employee.php?id=".$nv->id."'> [ Chỉnh sửa ] </a></td>"; 
	echo"<td><a href='javascript:void(0)' onclick='del_employee(".$nv->id.")'> [ Xóa ] </a></td></tr>"; 
}
}
?>
</table>
