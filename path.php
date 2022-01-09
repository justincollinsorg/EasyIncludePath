<?php

define("connecting_class" , $_SERVER['DOCUMENT_ROOT']."/EZ-Include-Path/to/connecting_class.php",true);
//Define for Path::match
define("me", Path::this_absolute_path(),true);
define("this", Path::this_absolute_path(),true);
define("path", Path::this_path(),true);
define("parent", Path::this_path(),true);
class Path {

public static function this_path() {
    return __DIR__ . "/";
}

    private static $page;
    private static $include;    
    
    public static function this_absolute_path() {
      return $_SERVER['DOCUMENT_ROOT']  . $_SERVER['PHP_SELF'];
  }

    public static function array_path($include) {
        $include = str_split($include); //0-63
        
        // remove 1st / 
        $slashes = -1;
        $i = -1;
        while($i++ < count($include) -1) {
            
            if($include[$i] == chr(47)) {
                $path[++$slashes] = "";
            } else {
                $path[$slashes] .= $include[$i];
            }
            
        }
    
    return $path;
    }
   
    public static function match($page,$include) {
        $page = Path::array_path($page);
        $include = Path::array_path($include);
    
        if(count($page) < count($include)){
            $count = count($page);
        } else {
            $count = count($include);
        }

        $i = 0;
        while($i++ <= $count) {

            if($page[0] == $include[0]) {
        
                array_shift($page);
                array_shift($include);
            } 
        } 
       
        $page_count = (count($page) - 1); // not counting page.php
        //build ../
        $back_path = "";
        $i = -1;
        while ($i++ < ($page_count - 1)) {
            $back_path .= "../";
        }
        
        //build include path to concatenate onto the back_path
        $include_path = '';
        $i = -1;
        while ($i++ < (count($include) -2)) { //-2 because can't include file.php or / will be appended
            $include_path .= $include[$i] . '/';
        }
        $include_path .= $include[$i];
        
        return $back_path . $include_path;
        
    }
}
?>
