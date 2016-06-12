
<script type="text/javascript">
    function KiemtraSua() {
        var name = document.getElementById("name");
        if (name.value == "") {
            alert("Nhập tên nhân viên");
            name.focus();
            return false;
        }
        return true;
    }
</script>
<h3> Cập nhật thông tin nhân viên</h3>

<form method="post" name="frm" enctype="multipart/form-data">
    <table class="table-hover" width="700px" border="0">
        <tr>
            <td class="col-sm-2 control-label" width="40%">Tên:</td>
            <td width="60%"><input class="form-control" type="text" name="name" id="name" size="30"
                                   value="<?php echo $employee->name; ?>"/></td>
        </tr>
        <tr>
            <td class="col-sm-2 control-label" width="40%">Department:</td>
            <td width="60%"><select name="department" class="form-control">
                    <?php
                    foreach ($departments as $phong) {
                        ?>
                        <option><?php echo $phong->name; ?></option>
                        <?php
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td class="col-sm-2 control-label" width="40%">Job title:</td>
            <td width="60%"><input class="form-control" name="job_title" id="job_title"
                                   value="<?php echo $employee->job_title; ?>"/></td>
        </tr>
        <tr>
            <td class="col-sm-2 control-label" width="40%">Email:</td>
            <td width="60%"><input class="form-control" type="text" name="email" id="email" size="30"
                                   value="<?php echo $employee->email; ?>"/></td>
        </tr>

        <tr>
            <td class="col-sm-2 control-label" width="40%">Avatar:</td>
            <td width="60%"><img src="../public/images/employee/<?php echo $employee->hinh; ?>" height="100px"/>
                <input type="file" name="hinh"/></td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <input type="submit" value="Cap nhat" name="Capnhat" onclick="return KiemtraSua()"/><br/>
                <input type="button" value="Bo qua" name="Boqua" onclick="window.location='department.php'"/>
            </td>
        </tr>
    </table>
</form>
	
		

