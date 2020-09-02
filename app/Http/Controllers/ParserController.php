<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PdfParser;

class ParserController extends Controller
{
    public function index()
    {
        $pdfText = (new PdfParser('http://www.africau.edu/images/default/sample.pdf'))->data();

        return view('welcome', compact('pdfText'));
    }
}
