<?php

use App\Models\PrinterConfig;

function globalPrinter(PrinterConfig $printer = null){
    $key = "printer_config";
    if (empty($printer)) {
        if (session()->has($key)) {
            $printer = session()->get($key);
        } else {
            $printer = PrinterConfig::first();
        }
    }{
        session()->put($key , $printer);
    }

    if(empty($printer)){
        $printer = new PrinterConfig();
    }
    return $printer;
}

// dd(phpinfo());


function isAdmin(){
   return auth()->user()->role == "admin";
}