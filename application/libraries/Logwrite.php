<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Smartie Class
 *
 * @package        CodeIgniter
 * @subpackage     Libraries
 * @category       Smarty
 * @author         Kepler Gelotte
 * @link           http://www.coolphptools.com/codeigniter-smarty
 */
class Logwrite {

    function logWrite($funcName="radom",$data="helloWorld",$fileName="test",$mode = "a+") {
        $dirName = date('Y-m-d');
        // fopen(APPPATH.'/logs/QueryFile/'.$dirName."/asasa.txt","a+");
        // print_r(APPPATH.'logs\QueryFile\/'.$dirName.'\/'.$fileName.".txt");exit;
        if (!is_dir(APPPATH.'/logs/'.$dirName)) {
            mkdir(APPPATH.'/logs/'.$dirName);
            chmod(APPPATH.'/logs/'.$dirName, 0777);
        }
        $file = fopen(APPPATH.'logs\/'.$dirName.'\/'.$fileName.".txt",$mode);
        // chmod($filename.".txt", 0777);
        // print_r($file);
        fwrite($file, "\n".date('Y-m-d h:i:s')."\n"."functionName:".$funcName."\n".$data);
        // return 'Hello World';
    }
}
?>
