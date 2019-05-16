<?php
namespace App;

use Storage;
use File;

class Drm
{
	public static function _($data)
	{
        $file = 'file.txt';
        $text = "\r\n" . \Route::getCurrentRoute()->getActionName() . "\r\n";
        if(is_array($data)){
		    foreach ($data as $key => $value) {
		        $text .= "$key => $value \r\n";
		    }
        }
        else{
	        $text .= "$data \r\n";
        }
        $text .= File::exists($file)?Storage::get($file):'';
        Storage::put($file, $text);
	}
}
