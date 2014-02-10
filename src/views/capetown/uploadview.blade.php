@section('title')
File Upload
@stop

@include('skins::common.uploader.assets')
@include('skins::common.inc.assets')
@include('skins::common.uploader.extra_head')
@include('skins::common.inc.navbar')
@include('skins::common.inc.messages')
@include('skins::common.uploader.getupload')
@include('skins::common.inc.bottom')

@section('content')
    @yield('getUpload')
@stop
