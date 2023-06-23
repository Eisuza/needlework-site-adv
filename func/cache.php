<?php
function check_status_cache($cache_folder, $url){
    $hash_url = md5($url);
    $hash_name = $cache_folder . $hash_url . ".txt";

    if(file_exists($hash_name)){

        $last_updated = filemtime($hash_name);

        if((time() - $last_updated) > 900) {
            return false;
        } else {
            return true;
        }

    } else {
        return false;
    }
}

function check_status_cache_page($cache_folder, $url){
    $hash_url = md5($url);
    $hash_name = $cache_folder . $hash_url . ".txt";

    if(file_exists($hash_name)){

        $last_updated = filemtime($hash_name);

        if((time() - $last_updated) > 240) {
            return false;
        } else {
            return true;
        }

    } else {
        return false;
    }
}

function create_cache($cache_folder, $url, $data){
    $hash_url = md5($url);
    $hash_name = $cache_folder . $hash_url . ".txt";

    $file = fopen($hash_name, 'w');
    fwrite($file, $data);
    fclose($file);
    return;
}

function get_cache($cache_folder, $url){
    $hash_url = md5($url);
    $hash_name = $cache_folder . $hash_url . ".txt";
    $content = file_get_contents($hash_name);
    return $content;
}
?>