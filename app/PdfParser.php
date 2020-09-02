<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Smalot\PdfParser\Parser;

class PdfParser extends Parser
{
    public $file;

    public function __construct($pdf)
    {
        $this->file = $pdf;
        $this->text($pdf);
    }

    public function text($pdf): string
    {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($pdf);

        return $pdf->getText();
    }

    public function data(): string
    {
        return $this->text($this->file);
    }
}
