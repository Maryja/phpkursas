<?php 

$user = [
    'username' => 'Marija',
    'password' => '12345'
];

$user2 = [
    'username' => 'Marija',
    'password' => '12345'
];

function checkUser($user,$user2){

    if($user['username'] == $user2['username'] && $user['password'] == $user2['password']):
        return true;
    else: 
        return false;
    endif;
}
var_dump(checkUser($user,$user2));
