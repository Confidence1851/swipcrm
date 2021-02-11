<?php

namespace App\Traits;

use Exception;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

trait PrintHandler
{
    public function print($data = ["sales" => [], "total" => 0])
    {
        $printerConfig = globalPrinter();

        if (empty($printerConfig->id)) {
            return [
                "success" => false,
                "message" => 'Configure printer to continue!'
            ]; 
        }

        if ($printerConfig->print == 1) {
            try {

                $connector = new WindowsPrintConnector($printerConfig->model);
                $printer = new Printer($connector);
                // dd($printer);
                $date = date('d M Y', strtotime(now()));

                /* Title of receipt */
                $printer->setJustification(Printer::JUSTIFY_RIGHT);
                $printer->text("\n");
                $printer->text($date . "\n");
                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer->setEmphasis(true);
                $printer->text($printerConfig->header . "\n");
                $printer->text("\n");

                /* Name of shop */
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text($printerConfig->title . "\n");
                $printer->selectPrintMode();
                $printer->text("\n");
                $printer->text($printerConfig->address . "\n");
                $printer->setEmphasis(false);
                $printer->text("\n");
                $printer->text("\n");
                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer->setEmphasis(true);
                $printer->text("PRODUCT NAME  |  PRICE \n");

                foreach ($data["sales"] as $sale) {
                    $printer->text("--------------------------------\n");
                    $printer->text($sale->name . ' ' . $sale->total . "\n");
                }
                $printer->setEmphasis(false);
                $printer->setJustification(Printer::JUSTIFY_RIGHT);
                $printer->text("\n");
                $printer->setEmphasis(true);
                $printer->text("--------------------------------\n");
                $printer->text("Total = NGN " . $data["total"]);
                $printer->setEmphasis(false);
                $printer->feed();


                /* Footer */
                $printer->feed(2);
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text($printerConfig->footer . "\n");
                $printer->feed(2);
                $printer->text("\n");
                $printer->text("\n");

                $printer->cut();
                $printer->close();
            } catch (Exception $e) {
                return [
                    "success" => false,
                    "message" => 'Incorrect printer configurations. Please contact Admin!'
                ];
            }
        }

        return [
            "success" => true,
            "message" => "Print successful"
        ];
    }
}
