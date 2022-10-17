<?php

class AuthHelper {

     /**
     * Verifica que el user este logueado y si no lo está
     * lo redirige al login.
     */
    public function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL . 'login');
            die();
        }
    } 
    //No está seteado inicie igual, pero sirve para los if else de los botones
    public function isLoggedIn(){
        if(!isset($_SESSION['IS_LOGGED'])){
        session_start();
        }
    }
}