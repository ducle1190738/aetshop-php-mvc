<?php
class connect
{
    // Khai báo $db trong class với giá trị khởi tạo là null. Biến này sẽ được sử dụng để lưu trữ đối tượng PDO cho kết nối cơ sở dữ liệu
    var $db = null;
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=aetshop';
        $user = 'root';
        $pass = '';
        // Thực hiện kết nối PDO đến cơ sở dữ liệu
        try {
            $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (\Throwable $th) {
            // Bắt lỗi nếu có vấn đề khi kết nối và hiển thị thông báo lỗi
            echo $th;
        }
    }

    // Phương thức thực hiện truy vấn và trả về tập hợp kết quả
    public function getList($select)
    {
        // Sử dụng đối tượng PDO để thực hiện truy vấn SQL
        $result = $this->db->query($select);
        // Trả về đối tượng PDOStatement, có thể sử dụng fetchAll hoặc fetch để lấy dữ liệu
        return $result;
    }


    // // Phương thức thực hiện truy vấn và trả về một bản ghi đầu tiên
    public function getInstance($select)
    {
        // Sử dụng đối tượng PDO để thực hiện truy vấn SQL
        $result = $this->db->query($select);
        // Sử dụng fetch để lấy bản ghi đầu tiên từ tập hợp kết quả
        $result = $result->fetch();
        // Trả về mảng chứa bản ghi đầu tiên hoặc return false nếu không có bản ghi nào
        return $result;
    }

    // Phương thức thực hiện câu lệnh SQL không trả về dữ liệu
    public function Exec($query)
    {
        // Sử dụng phương thức exec của đối tượng PDO để thực hiện câu lệnh SQL
        $result = $this->db->exec($query);
        // Trả về số lượng dòng bị ảnh hưởng (số lượng bản ghi được thêm, cập nhật hoặc xóa)
        return $result;
    }
};