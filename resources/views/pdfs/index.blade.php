@extends('layouts.app')
@section('content')
@foreach ($pdfs as $pdf)
<div>
    <div>Filename: {{ $pdf->filename }}</div>
    <div>{{ $pdf->content }}</div>
</div>
@endforeach
<form action="{{ route('pdf') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-md-6">
            <input type="file" name="pdf" class="form-control">
        </div>

        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Parse</button>
        </div>
    </div>
</form>
@endsection