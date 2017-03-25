<?php 
//nhúng file config
require_once 'config.php';
//Kiểm tra xem có biến post data được truyền vào không 
if(isset($_POST['data']))
{
	//tách chuỗi data ra thành mảng
	$data = explode('-', $_POST['data']);
	//tạo biến numbers
	$numbers = 1;
	//lặp mảng data
	for($i = 0; $i < count($data); $i++){
		//tiến hành upload dữ liệu
		mysqli_query($conn, "UPDATE tb_menu SET numbers = $numbers Where id = $data[$i] ");
		//tăng biến number lên 1 giá trị
		$numbers++;
	}
} else{ //nếu không phải phương thức post dùng chương trình và in ra thông báo.
	die('lock');
}
?>