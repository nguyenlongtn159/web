<?php include("../views/navigation/begin_navigation.php");?>

<script type="text/javascript">
    function KiemtraSua() {
        var name = document.getElementById("name");
        if (name.value == "") {
            alert("Nhập tên department");
            name.focus();
            return false;
        }
        return true;
    }
</script>
<h3> Sửa thông tin phòng ban: </h3>
<form method="post" name="frm" enctype="multipart/form-data">
    <table class="table-hover" width="700px" border="0">
        <tr>
            <td class="col-sm-2 control-label" width="40%">Tên phòng ban</td>
            <td width="60%"><input class="form-control" type="text" name="name" id="name" size="30"
                                   value="<?php echo $department->name ?>"/></td>
        </tr>
        <tr>
            <td class="col-sm-2 control-label" width="40%">Office phone</td>
            <td width="60%"><input class="form-control" name="office_phone" id="office_phone"
                                   value="<?php echo $department->office_phone ?>"/></td>
        </tr>
        <tr>
            <td class="col-sm-2 control-label" width="40%">Manager</td>


            <td width="60%"> Chọn Người quản lý ( mặc định là người đầu tiên):
                <select id="browsers" name="manager" onchange="Read_employee_with_id()">
                    <?php
                    foreach ($employee as $nv) {
                        ?>


                        <option value="<?php echo $nv->id; ?>"><?php echo $nv->name; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <!--<input class="form-control" type="text" name="manager" id="manager" size="30" value="<?php echo $department->manager ?>" /> -->
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <input type="submit" value="Cap nhat" name="Capnhat" onclick="return KiemtraSua()"/><br/>
                <input type="button" value="Bo qua" name="Boqua" onclick="window.location='department.php'"/>
            </td>
        </tr>
    </table>
</form>


<div id="hienthi"></div>
<script type="text/javascript" src="../public/js/thu_vien_ajax.js"></script>

<?php include("../views/navigation/end_navigation.php");?>