
<a href="add_employee.php" class="btn btn-success">Thêm nhân viên</a><br><br>

<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Xem theo department:</h3>
    </div>
    <div class="panel-body">
        <form action="employee.php" method="post" class="form-inline" id="indexForm" accept-charset="utf-8">
            <div class="form-group">
                <label class="sr-only" for="Name">s</label>
                <input name="name" class="form-control" placeholder="Employee Name" type="text" id="name"/>
            </div>
            <div class="form-group">
                <label class="sr-only" for="DepartmentId"></label>
                <select name="department" class="form-control" id="department_id">
                    <option value="">All</option>
                    <?php
                    foreach ($departments as $phong) {
                        echo "<option value='$phong->name'>";
                        echo $phong->name;
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-success" type="submit">Search</button>
            <button class="btn btn-default btn-clear" type="button">Clear</button>
        </form>
    </div>
</div>

Danh sách nhân viên:
<h3 align="center" style="color:red"><?php if (isset($msg)) {
        echo $msg;
    } ?> </h3>
<table class="table table-hover">
    <tr class="active">
        <td>Mã nhân viên:</td>
        <td>Tên :</td>
        <td>department:</td>
        <td>Job title:</td>
        <td>email:</td>
        <td>hình:</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>


    <?php
    if (isset($_GET['p'])) {
        $page = $_GET['p'];
    } else {
        $page = $_GET['page'];
    }

    if ($page < 1) {
        $page = 1;
    } else if ($page > $pages) {
        $page = $pages;
    } else {
        foreach ($employee as $nhan_vien) {
            echo "<tr><td>" . $nhan_vien->id . "</td>";
            echo "<td> " . $nhan_vien->name . "</td>";
            echo "<td> " . $nhan_vien->department . "</td>";
            echo "<td>" . $nhan_vien->job_title . "</td>";
            echo "<td>" . $nhan_vien->email . "</td>";
            echo "<td><img class='empl_img' src='../public/images/employee/" . $nhan_vien->hinh . "' height='150px' /></td>";
            echo "<td><a href='chi_tiet_employee.php?id=" . $nhan_vien->id . "'> [ Xem chi tiết ] </a></td>";
            echo "<td><a href='edit_employee.php?id=" . $nhan_vien->id . "'> [ Chỉnh sửa ] </a></td>";
            echo "<td><a href='javascript:void(0)' onclick='del_employee(" . $nhan_vien->id . ")'> [ Xóa ] </a></td></tr>";
        }
    }

    if (substr_count($_SERVER['PHP_SELF'], '/ql_nhan_vien/admin/employee_ajax.php') == 0) {
        echo "</table><div class='col-md-4'>" . $lst . "</div>";
    } else {
        if (isset($_GET['p'])) {
            $page = $_GET['p'];
        } else {
            $page = $_GET['page'];
        }

        if ($page <= 1) {
            $page = 1;
        } else if ($page > $pages) {
            $page = $pages;
        }
        echo "</table><a href='index.php?p=" . ($page - 1) . "'>&lt;&lt; Trang trước(" . ($page - 1) . ")</a> [" . $page . "] <a href='index.php?p=" . ($page + 1) . "'>Trang tiếp(" . ($page + 1) . ")>></a>";
    }

    ?>

    <script type="text/javascript">
        function del_employee(id) {
            if (confirm("Bạn muốn xóa bỏ nhân viên này ?")) {
                window.location = "del_employee.php?id=" + id;
            }
        }
    </script>
    <script type="text/javascript" src="../public/js/thu_vien_ajax.js">
    </script>