<form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"  method="get">
<input type="file" id="file" name="file" > <br/>
<select name="type" id="type">
 <option value ="asc"> ASC </option>
 <option value ="desc"> DESC </option>
</select>
<button name="btn" id="btn"  type="submit"> sort </button>
<button name="btnres" id="btnres"  onclick="window.location.reload()" > reset </button>
 
</form>
<?php
include('sort.php');

$fileArry = new FileArraySort();
$file_sort = new GetFileandSort();
if(isset($_GET['btn'])){
	$fileArry->sort_arry($file_sort , $_GET['file'] , $_GET['type']);
	
}
if(header("Refresh:0" == true)){
	isset($_GET['btn']) == false;
}
?>