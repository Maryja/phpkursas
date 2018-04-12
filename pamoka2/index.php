<?php 

function myName(){
    echo "<h1>Marija</h1>";
};

function param($true, $text = ""){
    if($true):
        echo "<h1>$text</h1>";
    elseif(!$true): 
        echo "$text";
    elseif($text = ""):
        return false;
    endif;
}

function emoji($my){
    if($my == "sad"):
        echo ";(";
    elseif($my == "happy"):
        echo ";)";
    else: 
        echo ";/";
    endif;
}

myName();
param(false, "hello");
emoji("sad");