@extends('layouts.app')
@section('content')
<div>Filename: {{ $pdf->filename }}</div>
<div>Content: {{ $pdf->content }}</div>
@endsection