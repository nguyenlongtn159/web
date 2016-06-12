<?php
require_once("xac_thuc.php");
/*
$cookie_name = "views";
if(isset($_GET["views"])){
    $cookie_value = $_GET["views"];
    setcookie($cookie_name, $cookie_value, time() + 3600, "/");
}
else{
     $cookie_value = "Department";
     setcookie($cookie_name, $cookie_value, time() + 3600, "/");
} */
include("../views/navigation/begin_navigation.php");


  if(isset($_SESSION["msg"]))
  {
    echo $_SESSION["msg"];
    unset($_SESSION["msg"]); 
  }
?>
    <meta charset="UTF-8">
    <div class="container-fluid">Chọn phần muốn xem:<br/>
        <select id="mySelect" class="btn btn-default" onchange="myFunction()">
            <?php
            if ($_COOKIE["view"] == "Employee") {
                echo '<option value="Department">Department</option><option value="Employee" selected>Employee</option>
                 <option value="User">User</option> ';
            } 
            else if($_COOKIE["view"] == "User"){
                echo '<option value="Department">Department</option> 
                <option value="Employee">Employee</option>
                <option value="User" selected>User</option>';
            }
            else {
                echo '<option value="Department" selected>Department</option>
                <option value="Employee">Employee</option>
                <option value="User">User</option> ';
            }
            ?>
            </select>
       <!-- <table align="center" width="600px" border="0" cellpading="15px" bgcolor="#FEF3CB">
            <tr>
                <td align="center">
                    <label>Nhập tên nhân viên cần tìm: </label><input type="text" name="keyword" value=""
                                                                      onkeyup="Tim_employee(this.value)"/>
                </td>
            </tr>
        </table> -->

<script type="text/javascript" src="../public/js/thu_vien_ajax.js"></script>
        <div id="hienthi"></div>
        <input type="number" name="page" id="page" value="<?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page <= 1) {
                $page = 1;
            }
        } else $page = 1;
        echo $page; ?>"/>
        <button type="button" onclick="myFunction()">Đến trang</button>
        
        <script>
            function myFunction() {
                var x = document.getElementById("mySelect").selectedIndex;
                var y = document.getElementsByTagName("option")[x].value;
                if (y == "Department") {
                    showDepartment();
                }
                else if(y == "User"){
                    showUser();
                }
                else {
                    showEmployee();
                }
            }
            myFunction();
        </script>
        <script type="text/javascript">
            function del_employee(id) {
                if (confirm("Bạn muốn xóa bỏ nhân viên này ?")) {
                    window.location = "del_employee.php?id=" + id;
                }
            }
            function del_department(id) {
                if (confirm("Bạn muốn xóa bỏ department này ?")) {
                    window.location = "del_department.php?id=" + id;
                }
            }
        </script>
    </div>

<?php include("../views/navigation/end_navigation.php"); ?>