<?php

namespace App\Http\Controllers;

use App\Models\PrinterConfig;
use Illuminate\Http\Request;

class PrinterConfigController extends Controller
{
    public function setting(Request $request){
        $data = $request->validate([
            "name" => "required|string",
            "model" => "required|string",
            "print" => "required|string",
            "header" => "required|string",
            "title" => "required|string",
            "address" => "required|string",
            "footer" => "required|string",
        ]);

        $data["model"] = strtoupper($data["model"]);
        $printer = PrinterConfig::updateOrCreate(
            ["id" => 1],
            $data
        );
        globalPrinter($printer);
        return redirect()->back()->with('success_msg', 'Printer settings saved successfully!');
    }

    
}

