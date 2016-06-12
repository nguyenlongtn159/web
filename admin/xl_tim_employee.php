<?php
$gttim = null;
$depart = null;
class Tim_kiem{
  
    public function Tim_kiem(){
      // unset_cookie('tim');
     //  unset_cookie('gttim');

if(isset($_POST["gttim"]) && isset($_POST["department"])){
       // $cookie_name3 = "gttim";
         $cookie_value3 = $_POST["gttim"];
         setcookie("gttim",$cookie_value3, time() + 3600, "/");
                           // $cookie_name2 = "department";
                            $cookie_value2 = $_POST["department"];
                            setcookie("department", $cookie_value2, time() + 3600, "/"); 
                                        
  
                    } else if(!isset($_COOKIE["gttim"]) && (!isset($_POST["gttim"]))){

         setcookie("gttim","", time() + 3600, "/");
         if(!isset($_COOKIE["department"]) && (!isset($_POST["department"]))){    
     //$cookie_name2 = "department";
        $cookie_value2 = "";
         setcookie("department", "", time() + 3600, "/");
         }
    }
     
   
    }
    public function Tim($gttim,$depart){
        
        include_once("../models/m_employee.php");
        $m_employee = new M_employee();
       if($gttim == ""){
            if($depart != "all"){
                            $employee = $m_employee->Read_employee_with_department_name_no_limit($depart);
                            }
                            else{
                                $employee = $m_employee->Read_full_employee();
                                }
                            }
                            else if($depart != "all"){
                                                $employee = $m_employee->so_luong_kq_timkiem($gttim,$depart);
                                                }
                                                else{
                                                    $employee = $m_employee->Read_all_employee_with_name($gttim);
                                                    }
    
    //   echo count($employee);
       include_once("../controllers/Pager.php");
        $p = new pager();
        $limit = 3;
        $count = count($employee);
        $vt = $p->findStart($limit);
        $pages = $p->findPages($count, $limit);
        $curpage = $_GET["page"];
        $lst = $p->pageList($curpage, $pages);
        if($gttim==""){
         $gttim=="all";  
        }
        $employee2=$m_employee->timkiem($gttim,$depart,$vt,$limit);
       // echo "<>".$gttim."<>".$depart."<>".$limit."<>".$limit;
      echo  '<table class="table table-hover"><tr class="active"><td>Mã nhân viên: </td><td>Tên :</td><td>department: </td><td>Job title: </td><td>email: </td><td>hình: </td><td></td><td></td><td></td></tr>';
        foreach($employee2 as $nv) {
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
$page = $_GET['page'];
        if ($page <= 1) {
            $page = 1;
        } else if ($page > $pages) {
            $page = $pages;
        }
        echo "</table>";
         echo $lst."<br />";
        
    }
    
    } ?>
    
    <?php
   // print_r($_COOKIE);
    if(isset($_COOKIE["gttim"]) && isset($_COOKIE["department"])){
      $gttim = $_COOKIE["gttim"];
    $depart = $_COOKIE["department"];  
    }
     
    $t = new Tim_kiem();
    $t->Tim($gttim,$depart );
   
       
?>
<link rel="stylesheet" type="text/css" href="../public/bootstrap/bootstrap.min.css">
<!--<php if (isset($_SERVER['HTTP_REFERER']) && substr_count($_SERVER['HTTP_REFERER'], '/ql_nhan_vien/admin/employee_ajax.php') == 0 && substr_count($_SERVER['HTTP_REFERER'], '/ql_nhan_vien/admin/employee.php') == 0){ 
    echo '    <div class="form-inline">
                <label class="sr-only" for="Name"></label>
                <input name="name" class="form-control" placeholder="Employee Name" type="text" id="name_employee" value="';
                echo $gttim;                
                echo ' "/>
            
            
                <label class="sr-only" for="DepartmentId"></label>
                <select name="department" class="form-control" id="department_id">
                    <option value="">All</option>';
                    foreach ($departments as $phong) {
                        echo "<option value='$phong->name'>";
                        echo $phong->name;
                        echo "</option>";
                    }
                    echo '</select><script type="text/javascript" src="../public/js/thu_vien_ajax.js"></script>
            <button class="btn btn-success" onclick="Tim_employee2()">Search</button>
            <button class="btn btn-default btn-clear" type="button">Clear</button>';
  } >
           
             
-->

<!--<a href="?page=<php echo ($page - 1); ?>" onclick="Tim_employee2()">&lt;&lt; Trang trước(<php echo ($page - 1); ?>)</a> [ <php echo $page; ?>] <a href="?page=<php echo ($page + 1); ?> " onclick="Tim_employee2()">Trang tiếp(<php echo ($page + 1); ?>)></a>-->

