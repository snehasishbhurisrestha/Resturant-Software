<?php

namespace App\Services;

use App\Models\Printer;
use Mike42\Escpos\Printer as EscPrinter;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

class PrinterService
{
    public function print($type, $content)
    {
        $printer = Printer::where('status',1)
            ->where(function($q) use ($type){
                $q->where('type',$type)
                  ->orWhere('type','both');
            })
            ->first();

        if(!$printer){
            throw new \Exception('Printer not configured');
        }

        $connector = new NetworkPrintConnector(
            $printer->ip_address,
            $printer->port
        );

        $printerObj = new EscPrinter($connector);

        $content($printerObj);

        $printerObj->cut();
        $printerObj->close();
    }
}