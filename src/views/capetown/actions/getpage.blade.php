{{-------------------------------------------------------- getSelect --------------}}

@section('getPage')

    @if($action == 'getPage' || @action == 'getPage')
    <!-- getpage -->
        @if($displayType == "text/html")

            <div class="page-header">
                <h1>{{$title}}</h1>
            </div>
            <div class="well">
                <div class="btn-group">
                    <a href="/db/insert/{{$tableName}}" class="btn">New</a>
                    <a href="javascript:sendDelete()" class="btn">Delete</a>
                    <a href="#myModal" role="button" class="btn" data-toggle="modal">Search</b></a>
                </div>
                <div class="btn-group">
                    @if(Options::get('debug'))
                    <a href="#" id="btnVisualize" onclick="javascript:debugBox();" class="btn">Debug</a>
                    @endif
                </div>
            </div>

            @yield('messages')
            @yield('search')

        @endif

        @if(isset($data) && isset($data[0]))

        <div class="table_container">
            <table class="table table-striped dbtable">

                {{-- the field titles --}}

                <tr>

                    @foreach($meta as $name=>$field)

                        @if ($displayTypes[$field['display_type_id']] == 'nodisplay')

                        @elseif ($displayTypes[$field['display_type_id']] == 'widget' && 
                            $widgetTypes[$field['widget_type_id']] == 'ckeditor')

                        @elseif ($displayTypes[$field['display_type_id']] == 'widget' && $widgetTypes[$field['widget_type_id']] == 'textarea')

                        @else

                            <th>{{$field['label']}}</th>
                            @if (isset($field['pk']))
                                {{-- this is a foreign key, it contains a reference to a primary key --}}
                                <th>{{$field['pk']['label']}}</th>
                            @endif
                        @endif
                    @endforeach
                </tr>

                {{-- the records --}}

                @foreach($data as $record)
                <tr id="tr-{{$tableName}}-{{$record->id}}">

                    @foreach($meta as $name=>$field)

                        @if ($displayTypes[$field['display_type_id']] == 'nodisplay')
                        @elseif ($displayTypes[$field['display_type_id']] == 'thumbnail' 
                        || ($displayTypes[$field['display_type_id']] == 'widget' 
                        && $widgetTypes[$field['widget_type_id']] == 'thumbnail'))
                            <td>
                                @if(isset($record) && is_object($record) && property_exists($record, 'file_name') && file_exists(public_path().'/uploads/thumbnail/'.$record->file_name))
                                    <a href="{{$prefix[$name]}}{{$value}}"><img src="/uploads/thumbnail/{{$record->file_name}}" class="img-rounded" style="width:80px; height:80px; max-width:80px" /></a>
                                @else
                                    <i class="icon-file"> </i>
                                @endif
                                    <input data-tablename="{{$tableName}}" data-recordid="{{$record->id}}" data-fieldname="{{$name}}" type="hidden" value="{{$value}}" id="{{$tableName}}-{{$record->id}}-{{$name}}" class="hover-edit fld-{{$tableName}}-{{$record->id}}" />
                            </td>
                        @elseif ($displayTypes[$field['display_type_id']] == 'widget' && $widgetTypes[$field['widget_type_id']] == 'ckeditor')

                        @elseif ($displayTypes[$field['display_type_id']] == 'widget' && $widgetTypes[$field['widget_type_id']] == 'textarea')

                        @else

                            @if((isset($prefix) && isset($prefix[$name])) || (isset($meta) && isset($field) && $field['key'] == 'PRI'))
                                <td>
                                    <a href="{{$prefix[$name]}}{{$record->$name}}">{{$record->$name}}</a>
                                    <input data-tablename="{{$tableName}}" data-recordid="{{$record->id}}" data-fieldname="{{$name}}" type="hidden" value="{{$record->$name}}" id="{{$tableName}}-{{$record->id}}-{{$name}}" class="hover-edit fld-{{$tableName}}-{{$record->id}}" />
                                </td>
                            @else
                                {{-- hover-edit : see : https://github.com/mruoss/HoverEdit-jQuery-Plugin --}}

                                <td>
                                    <input data-tablename="{{$tableName}}" data-recordid="{{$record->id}}" data-fieldname="{{$name}}" style="width:{{$field['width']}}px" type="text" value="{{ $record->{$name} }}" id="{{$tableName}}-{{$record->id}}-{{$name}}" class="hover-edit fld-{{$tableName}}-{{$record->id}}" />
                                </td>
                                @if(isset($field['pk']))
                                {{-- this is a foreign key, it contains a reference to a primary key --}}
                                <td>
                                    <a href="/db/edit/{{$field['pk']['tableName']}}/{{$record->$name}}">{{$pkTables[$field['pk']['tableName']][$record->$name]}}</a>
                                    <input data-tablename="{{$tableName}}" data-recordid="{{$record->id}}" data-fieldname="{{$name}}" type="hidden" value="{$record->{$name}}" id="{{$tableName}}-{{$record->id}}-{{$name}}" class="hover-edit fld-{{$tableName}}-{{$record->id}}" />
                                </td> 
                                @endif
                            @endif


                        @endif
                    @endforeach

                </tr>
                @endforeach
            </table>
        </div>
        {{$data->links()}}
        @endif
    @endif
    <!-- /getpage -->
@stop