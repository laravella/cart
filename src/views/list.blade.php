@extends('cart::layouts.frontend')
@section('content')
@foreach ($tables['products']['records'] as $id=>$record)
{{ $record['name'] }}<br />
@endforeach
@stop