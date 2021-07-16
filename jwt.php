<?php 
class KelolaJwt{
    // kunci rahasia
    public static $SECRET_KEY = "fjnljaicnuwe8nuwvo8nfulvieufksvfukenkfnelvnuf";

    function login($username, $password){
        // pengecekan
        if ($username == "admin" && $password == "admin") {
            // data yg dikirim
            $payload = [
                "username" => $username,
                "level" => "member"
            ];

            $jwt = \Firebase\JWT\JWT::encode($payload, KelolaJwt::$SECRET_KEY, 'HS256');
            // membuat data cookie jwt sejam
            setcookie("login", $jwt, time()+8600);

            return true;
        } else {
            return false;
        }
    }

    public static function cekLogin()
    {
        if(isset($_COOKIE['login'])){
            $jwt = $_COOKIE['login'];
            try {
                $payload = \Firebase\JWT\JWT::decode($jwt, KelolaJwt::$SECRET_KEY, ['HS256']);
                $login['username']=$payload->username;
                $login['level']=$payload->level;
                return $login;
            }catch (Exception $exception){
                return "User belum login";
            }
        }else{
            return "User belum login";
        }
    }

}
?>