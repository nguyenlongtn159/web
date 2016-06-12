<html><head><title> Chi tiết nhân viên </title>
<link rel="stylesheet" type="text/css" href="../public/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<div class="">
<h3><?php echo $employee->name ?></h3><br />
Avatar: <br /><img src="../public/images/employee/<?php echo $employee->hinh ?>"  />
    <br /><?php echo 'Derpartment: '.print_r($employee); ?>
<br /><?php echo 'Derpartment: '.$employee->department; ?>
<br /><?php echo 'Chức danh: '.$employee->job_title; ?>
<br /><?php echo 'Email: '.$employee->email; ?>
<br />
</div>

</body>
</html>