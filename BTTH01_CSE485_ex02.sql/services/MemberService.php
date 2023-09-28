<?php
class MemberService
{
    public function getMember($user)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "SELECT * FROM nguoidung WHERE ten_dnhap = '$user' OR mail = '$user'";
        $stmt = $conn->query($sql);
        $members = [];
        while ($row = $stmt->fetch()) {
            $member = new Member($row['ten_dnhap'], $row['mail'], $row['mat_khau'], $row['makichhoat'], $row['kichhoat']);
            array_push($members, $member);
        }
        $conn = null;
        return $members;
    }
    public function getMemberMail($user, $mail)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "SELECT * FROM nguoidung WHERE ten_dnhap = '$user' OR mail = '$mail'";
        $stmt = $conn->query($sql);
        $members = [];
        while ($row = $stmt->fetch()) {
            $member = new Member($row['ten_dnhap'], $row['mail'], $row['mat_khau'], $row['makichhoat'], $row['kichhoat']);
            array_push($members, $member);
        }
        $conn = null;
        return $members;
    }
    public function insert(array $arguments)
    {
        $dbconn = new DBConnection();
        $conn = $dbconn->getConnection();

        $sql = "INSERT INTO `nguoidung`(`ten_dnhap`, `mail`, `mat_khau`, `makichhoat`) VALUES (:user,:mail,:pass,:activation_code)";
        $statment = $conn->prepare($sql);
        $statment->execute($arguments);
        $conn = null;
    }
    public function update(array $arguments)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "UPDATE `nguoidung` SET `kichhoat`= 1 WHERE mail=:email AND makichhoat = :active";
        $statement = $conn->prepare($sql);
        $statement->execute($arguments);
        $conn = null;
    }
}
?>