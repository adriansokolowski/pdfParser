<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PdfParser;
use App\Pdf;

class PdfController extends Controller
{
    public function index()
    {
        $pdfs = Pdf::all();

        return view('pdfs.index', compact('pdfs'));
    }

    public function store(Request $request)
    {
        $file = $request->file('pdf');
        $path = $file->storeAs('pdfs', $file->getClientOriginalName(), 'public');
        $pdfText = (new PdfParser(asset('/storage/' . $path)))->results();

        $pdf = Pdf::firstOrCreate(
            ['filename' => $file->getClientOriginalName()],
            [
                'content' => addslashes($pdfText)
            ]
        );

        return back();
    }

    public function show($id)
    {
        $pdf = Pdf::findOrFail($id);

        return view('pdfs.show', compact('pdf'));
    }
}
