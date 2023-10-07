<?php

namespace App\Traits;

trait ResponseTrait{
    protected function successMsg($status,$message){
        $content = [
            'status'        => $status,
            'success'       =>  $message
        ];
        return response( $content );
    }

    protected function errorMsg($status,$message){
        $content = [
            'status'        => $status,
            'message'       =>  $message
        ];
        return response($content);
    }

}

?>
