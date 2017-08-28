<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magick extends CI_Controller {

	public function index(){
		$result = $this->generateImages('999', 'felix_ogucha_cv.pdf');
		if (!is_null($result)) {
			$pages = sizeof($result);
			echo $pages." pages";
		} else {
			echo 'no';
		}
		
	}

	public function generateImages($item_id, $file_name) {
		$this->load->helper('path');
		$data = explode('.', $file_name);
		$dest_dir = $item_id; //the folder o be created has same name as item_id
		$dest_path = 'uploads/items/ebooks/'.$dest_dir;
		if (!file_exists($dest_path))  mkdir($dest_path); //If directory does not exist, create it.
		else {
			$this->rmdir_recursive($dest_path);
			mkdir($dest_path);
		} //else empty it and continue
		
		$src = 'uploads/items/'.$file_name;
		$dest = 'uploads/items/ebooks/'.$dest_dir.'/'.$dest_dir.'.jpg';
		exec("convert -density 120 ".$src." -quality 80 ".$dest);
		//shell_exec(sprintf('%s > /var/www/html/imagic_logs/imagic.php 2>&1 &', "convert -density 120 ".$src." -quality 80 ".$dest));

		$result = array();
		$cdir = scandir($dest_path);
		foreach ($cdir as $key => $value)
		{
			if (!in_array($value,array(".",".."))) { 
				$result[] = $value;
			} 
	   }
		   
	   return $result; //result is the total number of items
	}
	
	public function rmdir_recursive($dir) {
	    foreach(scandir($dir) as $file) {
	        if ('.' === $file || '..' === $file) continue;
	        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
	        else unlink("$dir/$file");
	    }
	    rmdir($dir);
	}
}




