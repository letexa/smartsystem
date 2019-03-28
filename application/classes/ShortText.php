<?php defined('FRTCFTYU') or die('No direct script access.');

class ShortText  {
    
    static public function set($text, $length = 25, $end = '...')
    {
        if(mb_strlen($text) > $length) {
            preg_match( '/^.{0,'.$length.'} .*?/ui', $text, $match );
            return $match[0].' '.$end;
        }
	else {
            return $text;
	}
    }
}

