<?php

namespace gabu\phpmvc;

 class Request
 {
     public function getPath()
     {
         //server URI
         $path  = $_SERVER['REQUEST_URI'] ?? '/';

         $position = strpos($path, '?');

         if ($position === false) {
             return $path;
         }

         $path = substr($path, 0, $position);
     }


     public function method()
     {
         ///For POST AND GET METHODS
         return strtolower($_SERVER['REQUEST_METHOD']);
     }
     public function isGet()
     {
         return $this->method() === 'get';
     }
     public function isPost()
     {
         return $this->method() === 'post';
     }

     public function getBody()
     {
         $body= [];

         if ($this->method()=== 'get') {
             foreach ($_GET as $key => $value) {
                 $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
             }
         }
         if ($this->method()=== 'post') {
             foreach ($_POST as $key => $value) {
                 $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
             }
         }


         return $body;
     }
 }