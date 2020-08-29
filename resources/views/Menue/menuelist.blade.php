@extends('Layouts.admin-home')
@section('title')
    Menue List
@endsection
@section('script')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection
@section('content')

<div class="container">
    
    <div class="card" style="margin-top: 10%">

        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Menue</div>
                <div class="col-md-1 ml-auto">
                    @if (Session::has('Blogadd'))
                        <a href="{{route('admin.menueAdd')}}"><i class="fas fa-plus"></i></a> 
                    @endif
                    
                </div>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{Session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-body">
            <input type="hidden" id="count" value="{{count($menues)}}">
            @foreach ($menues as $key=>$item)
                <ul id="sortable{{$key}}"> {{$item->menu_name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{route('admin.menueEdit',$item->menu_id)}}"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Are You Sure!!')" href="{{route('admin.menueDelete',$item->menu_id)}}"><i class="fas fa-trash"></i></a>
                    @foreach ($submenues as $subitem)

                        @if ($subitem->menu_parent_id==$item->menu_id)
                            <div class="row">
                                <div class="col-md-4">
                                    <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$subitem->menu_name}}</li>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{route('admin.menueEdit',$subitem->menu_id)}}"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Are You Sure!!')" href="{{route('admin.menueDelete',$subitem->menu_id)}}"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                        @endif
                    
                    @endforeach
                    
                    
                </ul>
                
            @endforeach
            
        </div>
    </div>
</div>



<script>

    var count=$("#count").val();
    for($i=0;$i<=(count);$i++){

        $("#sortable"+$i).sortable({
            /*stop: function(event, ui) {
                alert("New position: " + ui.item.index());
            }*/
            start: function(e, ui) {
                // creates a temporary attribute on the element with the old index
                console.log(ui);
                $(this).attr('data-previndex', ui.item.index());
            },
            update: function(e, ui) {
                // gets the new and old index then removes the temporary attribute
                var newIndex = ui.item.index();
                var oldIndex = $(this).attr('data-previndex');
                var element_id = ui.item.attr('id');
                alert('id of Item moved = '+element_id+' old position = '+oldIndex+' new position = '+newIndex);
                $(this).removeAttr('data-previndex');
            }
        });
    $("#sortable"+$i).disableSelection();
    }
    


</script>

    
@endsection