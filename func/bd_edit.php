<?php
function edit_caption($link, $id, $caption){
    $query = "UPDATE captions SET caption = '$caption' WHERE id = '$id' ";
    $result = mysqli_query($link, $query);
    if(!$result)   
        die(mysqli_error($link));
    return 1;
}

function edit_record($link, $id, $record){
    $query = "UPDATE records SET record = '$record' WHERE id = '$id' ";
    $result = mysqli_query($link, $query);
    if(!$result)   
        die(mysqli_error($link));
    return 1;  
}

function edit_button($link, $id, $button){
    $query = "UPDATE buttons SET button = '$button' WHERE id = '$id' ";
    $result = mysqli_query($link, $query);
    if(!$result)   
        die(mysqli_error($link));
    return 1;  
}

function edit_placeholder($link, $id, $placeholder){
    $query = "UPDATE placeholders SET placeholder = '$placeholder' WHERE id = '$id' ";
    $result = mysqli_query($link, $query);
    if(!$result)   
        die(mysqli_error($link));
    return 1; 
}

function edit_stylesheet($link, $id, $stylesheet){
    $query = "UPDATE stylesheets SET stylesheet = '$stylesheet' WHERE id = '$id' ";
    $result = mysqli_query($link, $query);
    if(!$result)   
        die(mysqli_error($link));
    return 1;
}

function edit_icon($link, $id, $icon){
    $query = "UPDATE icons SET icon = '$icon' WHERE id = '$id' ";
    $result = mysqli_query($link, $query);
    if(!$result)   
        die(mysqli_error($link));
    return 1;
}

function edit_section($link, $id, $section, $slink){
    $query = "UPDATE sections SET section = '$section', link = '$slink' WHERE id = '$id' ";
    $result = mysqli_query($link, $query);
    if(!$result)   
        die(mysqli_error($link));
    return 1;
}

function edit_image($link, $id, $alt, $slink){
    $query = "UPDATE images SET alt = '$alt', link = '$slink' WHERE id = '$id' ";
    $result = mysqli_query($link, $query);
    if(!$result)   
        die(mysqli_error($link));
    return 1;
}

function edit_article($link, $id, $title, $text){
    $query = "UPDATE articles SET title = '$title', text = '$text' WHERE id = '$id' ";
    $result = mysqli_query($link, $query);
    if(!$result)   
        die(mysqli_error($link));
    return 1;
}

function edit_postart($link, $id, $title, $slink, $alt){
    $query = "UPDATE postarts SET title = '$title', link = '$slink', alt = '$alt' WHERE id = '$id' ";
    $result = mysqli_query($link, $query);
    if(!$result)   
        die(mysqli_error($link));
    return 1;
}

function edit_banner($link, $title){
    return 1;
}

function edit_template_link($link, $template_link, $id_template){
    $query = "UPDATE templates SET link = '$template_link' WHERE id_template = '$id_template' ";
    $result = mysqli_query($link, $query);
    if(!$result)   
        die(mysqli_error($link));
    return 1;
}
?>