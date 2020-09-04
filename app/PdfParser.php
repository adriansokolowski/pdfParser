<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Smalot\PdfParser\Parser;

class PdfParser extends Parser
{
    public $file;

    public function __construct($pdf)
    {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($pdf);
        $this->file = $pdf;
        $this->text($pdf);
    }

    public function text($pdf): string
    {
        return $pdf->getText();
    }

    public function results(): string
    {
        return $this->text($this->file);
    }
}
