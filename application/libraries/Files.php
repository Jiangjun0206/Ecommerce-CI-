<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Files
{

    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        //$this->load->database();
    }
    //move files and directories from one location to another
    public function move_directory($source, $dest)
    {
        if (is_dir($source)) {
            if (!is_dir($dest)) {
                mkdir($dest, 0777, true);
            }

            $dir_items = array_diff(scandir($source), array('..', '.'));

            if (count($dir_items) > 0) {
                foreach ($dir_items as $v) {
                    $this->move_directory(rtrim(rtrim($source, '/'), '\\') . DIRECTORY_SEPARATOR . $v, rtrim(rtrim($dest, '/'), '\\') . DIRECTORY_SEPARATOR . $v);
                }
            }
        } elseif (is_file($source)) {
            copy($source, $dest);
        }
    }

    //move files and directories from one location to another
    public function move_file($source, $dest)
    {
        copy($source, $dest);
        unlink($source);
    }

    /// Delete a directory and it's contents
    function delete_directory($dir) {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            if (!$this->delete_directory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }

        }

        return rmdir($dir);
    }


    //get information about a file like name, extension, full file name with extension, path
    function get_file_info($file_path,$info='name'){
        $path_parts = pathinfo($file_path);
        switch($info){
            case 'name':
                $file_info =$path_parts['filename'];

            break;

            case 'ext':
                $file_info =$path_parts['extension'];

            break;

            case 'file':
                $file_info =$path_parts['basename'];

            break;

            case 'dir_path':
                $file_info =$path_parts['dirname'];

            break;
        }

        return $file_info;

    }

    ///return file name without extension
    function remove_extension($file){
        return preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);
    }

    //check if file exists in a particular folder
    function check_if_file_exists($file){
        foreach (glob($file) as $filename) {
               return true;
        }
        return false;
    }

    function delete_file($file){
        unlink($file);
    }

    function validate_xml_product($product)
    {
        $children=$product->children();
        foreach($children as $child){
            if ($child->getName()=='artnr') {
                return true;
            }
        }
        return false;
    }

    function if_node_exits($xml,$node)
    {

        $elms = simplexml_load_file($xml);
        foreach ($elms->$node as $elm) {
            $r[] = $elm;
        }

        return (isset($r)) ? TRUE : FALSE;

    }

    function get_xml_values($xml,$top){

        $elms= simplexml_load_file($xml);
        foreach($elms->$top as $elm){

            $topelms[] = $elm;
        }

        return get_object_vars($topelms[0]);
    }
    //check if xml has element in a given array
    function is_main_xml_correct($xml,$main_elms,$top){
        $elm = $this->get_xml_values($xml,$top);

        $result = array_diff($main_elms, array_keys($elm));

        return (count($result) <= 0) ? TRUE : FALSE;

    }

    //check if a directory is empty. Returns TRUE if empty
    function is_dir_empty($dir) {
        if (!is_readable($dir)) return NULL;
        $handle = opendir($dir);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                closedir($handle);
                return FALSE;
            }
        }
        closedir($handle);
        return TRUE;
    }

    //check if directory exists
    function folder_exist($folder)
    {
        // Get canonicalized absolute pathname
        $path = realpath($folder);

        // If it exist, check if it's a directory
        return ($path !== false AND is_dir($path)) ? true : false;
    }
    //execute sql file
    function run_sql_file($location){
        // Set line to collect lines that wrap
        $templine = '';

        // Read in entire file
        $lines = file($location);

        // Loop through each line
        foreach ($lines as $line)
        {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

            // Add this line to the current templine we are creating
            $templine .= $line;

            // If it has a semicolon at the end, it's the end of the query so can process this templine
            if (substr(trim($line), -1, 1) == ';')
            {
                // Perform the query
                $this->CI->db->query($templine);

                // Reset temp variable to empty
                $templine = '';
            }
        }
    }

    function upload_files($input_name,$folder)
    {
        $config['upload_path'] = $folder;
        $config['allowed_types'] = 'jpeg|png|gif|zip|jpg';
        $config['max_size'] = '0';
        $config['max_width']  = '0';
        $config['max_height']  = '0';

        $this->CI->load->library('upload', $config);

        $field_names = array('name', 'type', 'tmp_name', 'error', 'size', );
        $keys = array();
        foreach($field_names as $field_name){
            if (isset($_FILES[$input_name][$field_name])) foreach($_FILES[$input_name][$field_name] as $key => $value){
                $_FILES[$input_name.'_'.$key][$field_name] = $value;
                $keys[$key] = $key;
            }
        }
        unset($_FILES[$input_name]); // just in case

        foreach ($keys as $key){

            $new_file = $this->CI->upload->do_upload($input_name.'_'.$key);

            $upload_data = $this->CI->upload->data();


        }

        return $upload_data;
    }

    function is_base64_encoded($img_src)
    {
        if (substr( $img_src, 0, 5 ) === "data:") {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function save_base64_image($base64_image_string, $output_file_without_extension, $path_with_end_slash="" ) {
        //usage:  if( substr( $img_src, 0, 5 ) === "data:" ) {  $filename=save_base64_image($base64_image_string, $output_file_without_extentnion, getcwd() . "/application/assets/pins/$user_id/"); }
        //
        //data is like:    data:image/png;base64,asdfasdfasdf
        $output_file_with_extension ="";
        $splited = explode(',', substr( $base64_image_string , 5 ) , 2);
        $mime=$splited[0];
        $data=$splited[1];

        $mime_split_without_base64=explode(';', $mime,2);
        $mime_split=explode('/', $mime_split_without_base64[0],2);
        if(count($mime_split)==2)
        {
            $extension=$mime_split[1];
            if($extension=='jpeg')$extension='jpg';

            $output_file_with_extension.=$output_file_without_extension.'.'.$extension;
        }
        file_put_contents( $path_with_end_slash . $output_file_with_extension, base64_decode($data) );
        return $output_file_with_extension;
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    function create_file($name,$extension,$data,$location){
        $myFile = $location."/".$name.".".$extension;
        // $fh = fopen($myFile, 'w');
        // fwrite($fh, $data);
        // fclose($fh);
        $fh   = fopen($myFile, "w");

        $pieces = str_split($data, 1024 * 4);
        foreach ($pieces as $piece) {
            fwrite($fh, $piece, strlen($piece));
        }

        fclose($fh);
    }

    function createZip($source, $destination)
    {

        if (!extension_loaded('zip') || !file_exists($source)) {
            return false;
        }

        $zip = new ZipArchive();
        if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
            return false;
        }

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            DEFINE('DS', DIRECTORY_SEPARATOR); //for windows
        } else {
            DEFINE('DS', '/'); //for linux
        }


        $source = str_replace('\\', DS, realpath($source));

        if (is_dir($source) === true)
        {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
            echo $source;
            foreach ($files as $file)
            {
                $file = str_replace('\\',DS, $file);
                // Ignore "." and ".." folders
                if( in_array(substr($file, strrpos($file, DS)+1), array('.', '..')) )
                    continue;

                $file = realpath($file);

                if (is_dir($file) === true)
                {
                    $zip->addEmptyDir(str_replace($source . DS, '', $file . DS));
                }
                else if (is_file($file) === true)
                {
                    $zip->addFromString(str_replace($source . DS, '', $file), file_get_contents($file));
                }
                echo $source;
            }
        }
        else if (is_file($source) === true)
        {
            $zip->addFromString(basename($source), file_get_contents($source));
        }

        return $zip->close();


    }





}

