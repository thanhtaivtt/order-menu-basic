<?php
//nhúng file config
require_once 'config.php';
//tạo biến chứa dữ liệu
$data = [];
//truy vấn và đồng thởi kiểm tra truy vấn
if($query = mysqli_query($conn,'SELECT id,name FROM tb_menu ORDER BY numbers ASC'))
{
	//đổ dữ liệu ra biến data
	while ($row = mysqli_fetch_array($query)) {
		$data[] = $row;
	}
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>jQuery UI Sortable - Default functionality</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
		#sortable li { margin: 0 3px 3px 3px; padding: 5px; padding-left: 15px; height: 30px; }
		#sortable li span { position: absolute; margin-left: -15px;margin-top: 2px }
	</style>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		$( function() {
			$( "#sortable" ).sortable();
			$( "#sortable" ).disableSelection();
		} );
	</script>
</head>
<body>
	<div class="container">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Sắp xếp menu</h3>
			</div>
			<div class="panel-body">
				<ul id="sortable">
					<?php
					//lặp và đổ dữ liệu
					foreach ($data as $value) {
						?>
						<li class="ui-state-default" data-id="<?php echo $value['id']; ?>" ><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $value['name']; ?></li>
						<?php
					}
					?>
				</ul>
				<button type="buton" class="btn btn-success" onclick="get()">Get</button>
			</div>
		</div>
	</div> 

	<script>
		function get()
		{
			//tạo biến data
			var data = [];
			//lặp các thẻ li và lấy ra data-id
			$('li').each(function(){
				data.push($(this).attr('data-id'));
			})
			//gửi ajax
			$.ajax({
				url: 'update.php', 
				dataType: 'text',
				cache: false,
				data: {data: data.join('-')}, //data có dạng: a-b-c-d                       
				method: 'post',
				success: function(res){ //nếu thành công thì reload lại trang
					location.reload();
				}
			});
		}
	</script>

</body>
</html>