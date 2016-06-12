<?php
require_once("database.php");

class M_employee extends database
{
    //nguoi dung
    public function Read_employee($vt = -1, $limit = -1) // them de phan trang
    {
        $sql = "select * from employee";
        if ($vt >= 0 && $limit > 0) {
            $sql .= " limit $vt,$limit"; // noi tiep
        }
        //ke thua

        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function Read_employee_with_department($vt = -1, $limit = -1, $department_name) // them de phan trang
    {
        $sql = "select * from employee where department='$department_name'";
        if ($vt >= 0 && $limit > 0) {
            $sql .= " limit $vt,$limit"; // noi tiep
        }
        //ke thua

        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function Read_employee_with_id($id)
    {
        $sql = "select * from employee where id=?";
        $this->setQuery($sql);
        $param = array($id);
        return $this->loadRow($param);
    }

    public function Get_name_by_id($id){
        $sql = "select * from employee where id='$id'";
        $this->setQuery($sql);
        $employ= $this->loadRow();
        if(empty($employ->name)){
            $result="";
        }else{
            $result= $employ->name;
        }
        return $result;
    }

    public function Read_employee_with_department_name_no_limit($department_name)
    {
        $sql = "select * from employee where department='$department_name'";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    // admin

    public function Add_employee($name, $department, $job_title, $email, $hinh)
    {
        $sql = "INSERT INTO employee (name,department,job_title,email,hinh) VALUES (?,?,?,?,?)";
        $this->setQuery($sql);
        $param = array($name, $department, $job_title, $email, $hinh);
        return $this->execute($param); // lay o dau, viet dong tren
    }

    public function Edit_employee($id, $name, $department, $job_title, $email, $hinh)
    {
        $sql = "UPDATE employee SET name=?,department=?,job_title=?,email=?,hinh=? WHERE id=?";
        $this->setQuery($sql);
        $param = array($name, $department, $job_title, $email, $hinh, $id);
        return $this->execute($param);
    }

    public function Del_employee($id)
    {
        $sql = "Delete From employee Where id=?";
        $this->setQuery($sql);
        $param = array($id);
        return $this->execute($param); // mang tham so (options)
    }

    function timkiem($keyword)
    {
        if ($keyword != "") {
            $sql = "select * from employee where name like '%$keyword%' ";
        }
        /* else
        {
            $sql = "select * from employee where name=''";

        }  */
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}

?>

