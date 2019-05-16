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
        $text = self::arr($data);
        $text .= Storage::get($file);
        Storage::put($file, $text);
	}

        public static function arr($data){
                $text = '';
        if(is_array($data)){
                foreach ($data as $key => $value) {
                $text .= "$key => " . self::arr($value) . " \r\n";
                }
        }
        else{
        $text .= "$data \r\n";
        }
        return $text;
        }
}
