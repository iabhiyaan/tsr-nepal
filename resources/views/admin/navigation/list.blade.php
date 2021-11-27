@extends('admin.layouts.app')
@push('styles')
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />

<!-- <style media="screen">
.adjust-delete-button {
  margin-top: -28px;
  margin-left: 37px;
}
</style> -->
@endpush
@section('content')

<div class="page-heading">
    <h1 class="page-title">Navigation Lists</h1>


</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Navigations</div>
            @if(\Auth()->user()->role == 'super_admin')
                <div>
                    <a href="{{route('createNew')}}" class="btn btn-primary">Add Navigation</a>
                </div>
            @endif
        </div>

        <div class="ibox-body">
            <table id="" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Page Type</th>
                    <th>Published</th>
                    <th>Options</th>
                </tr>
                </thead>

                <tbody id="sortable">
              @if($details->count())
               @foreach($details as $key => $data)
                    <tr id="{{$data->id}}">
                        <td>{{++$key}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->slug}}</td>
                        <td>{{$data->type}}</td>
                        <td>{{$data->published}}</td>
                        <td class="buttom-arrange-kabirsing">
                            <a href="{{route('navigationEdit',$data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            @if(auth()->user()->role == 'super_admin')
                                <form class="adjust-delete-button delete" action="{{route('navigation.destroy', $data->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" title="Delete" type="submit" name="button" style="border-radius:50%" onclick="return confirm('If you delete it all child of this nav will be deleted. Are you sure you want to delete?')"><i class="fa fa-trash"></i></button>
                                </form>
                              @endif
                        </td>
                    </tr>
             @endforeach
             @else
             <tr>
                 <td colspan="8">
                     You do not have any Data yet.
                 </td>
             </tr>
             @endif
                </tbody>

            </table>
        </div>
    </div>

</div>

@endsection
@push('scripts')


<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{asset('/assets/admin/vendors/DataTables/datatables.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(document).ready(function(){
       $('.delete').submit(function(e){
        e.preventDefault();
        var message=confirm('Are you sure to delete');
        if(message){
          this.submit();
        }
        return;
       });

       $("#sortable").sortable({
          update: function(e, ui) {
            $("tr td:nth-child(1)").text(function() {
                return $(this).parent().index("tr");
            });
          }, 
	      stop: function(){
	        $.map($(this).find('tr'), function(el) {
	          var itemID = el.id;
	          var itemIndex = $(el).index();
	          $.ajax({
	            url:"{{route('sortableNavigation')}}",
	            method:"post",
	             data: {itemID:itemID, itemIndex: itemIndex},
	            success:function(data){
                console.log(data);
	            }
	          })
	        });
	      }
	    });

    });
  </script>

@endpush
