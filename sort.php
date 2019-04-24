<?php 
class GetFileandSort {
	
	 public function read_file_into_array($file){
	 
	$data = file_get_contents($file);
	$data = str_replace(array("\n" ,"\r"), '' ,$data);
	$data = explode( ':', $data);
	unset($data[count($data)-1]);
	$arr = array();
	foreach($data AS $row){
		$arr[] = explode(' ' ,$row);
		
	}
		return $arr;
		
	


	 }
	 
	 
	 public function simple_quick_sort($arr)
{
    if(count($arr) <= 1){
        return $arr;
    }
    else{
        $pivot = $arr[0];
        $left = array();
        $right = array();
        for($i = 1; $i < count($arr); $i++)
        {
            if($arr[$i] < $pivot){
                $left[] = $arr[$i];
            }
            else{
                $right[] = $arr[$i];
            }
        }
		
        return array_merge($this->simple_quick_sort($left), array($pivot), $this->simple_quick_sort($right));
		
		
    }
}
	public function print_arr($arr){
		foreach($arr AS $row){
			print_r($row[0].'  :  '.$row[1]);
			echo "<br />" ;
			}
			
		
	}

}
interface Sorting
{
    public function sort_arry(GetFileandSort $file, $txtFile , $type);
}
class FileArraySort implements Sorting
{
    public function sort_arry(GetFileandSort $file , $txtFile ,$type)
    {
		$data = $file->read_file_into_array($txtFile);
        $sorted =  $file->simple_quick_sort($data);
		if($type == 'desc'){
			$sorted = array_reverse($sorted);
		}
		return $file->print_arr($sorted);
    }
}


?>