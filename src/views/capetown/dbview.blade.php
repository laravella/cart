@include("skins::common.inc.assets")

@include("skins::common.inc.title")
@include("skins::common.inc.extra_head")

@include("skins::common.inc.navbar")

@include("skins::common.actions.getsearch")
@include("skins::common.inc.messages")

@include("skins::common.actions.getdelete")
@include("skins::common.actions.getedit")
@include("skins::common.actions.getindex")
@include("skins::common.actions.getpage")
@include("skins::common.actions.getinsert")
@include("skins::common.actions.getselect")

@include("skins::common.inc.bottom")
@include("skins::common.inc.footer")

@section('content')

    {{--
    @if (isset($object))
        @foreach($object as $obj)
            page_id : {{$obj->page_id}}
            slug : {{$obj->slug}}
            table_id : {{$obj->table_id}}
            table_name : {{$obj->table_name}}<br />
        @endforeach
    @endif
    --}}

    <!-- {{$action}} -->
    
    @yield($action)
@stop

