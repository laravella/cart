@extends(Options::get('skin').'.default')
@include('skins::common.inc.navbar')

{{-- Web site Title --}}
@section('title')
@parent
:: Home
@stop

@section('content')
<h1>Laravella</h1>
@stop
