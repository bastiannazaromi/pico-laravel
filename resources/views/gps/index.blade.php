@extends('layouts.app')

@section('title', 'Lokasi')

@section('content')
    <h2 class="mb-4">Lokasi GPS</h2>

    <iframe width="100%" height="450" style="border:0;" loading="lazy"
        src="https://maps.google.com/maps?q={{ $gpsData->latitude }},{{ $gpsData->longitude }}&output=embed">
    </iframe>
@endsection
