@extends('admin.layouts.app')

@section('content')

<div class="page-content fade-in-up">

@include('admin.layouts._partials.messages.info')

<div class="row">
    <div class="col-md-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Add Navigation</div>

                <div class="back-button">
                  <a class="btn btn-info btn-md" href="{{ route('navigation.list')}}">Lists </a>
                </div>

                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <!-- <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item">option 1</a>
                        <a class="dropdown-item">option 2</a>
                    </div> -->

                </div>
            </div>
  <form method="post" action="{{route('navigation.store.new')}}" enctype="multipart/form-data">
    @csrf

            <div class="ibox-body" style="">

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Enter Menu Name">
                            {!!$errors->first('name', '<span class="text-danger has-error">:message</span>')!!}
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Slug (Do not use / in slug.)</label>
                            <input class="form-control" name="slug" value="{{old('slug')}}" placeholder="Enter Slug">
                            {!!$errors->first('slug', '<span class="text-danger has-error">:message</span>')!!}
                        </div>

                        <div class="check-list col-sm-6">
                            <label class="ui-checkbox ui-checkbox-primary">
                            <input name="published" type="checkbox">
                            <span class="input-span"></span>Publish</label>
                        </div>
                    </div>
                    <br>
            @if(auth()->user()->role == 'super_admin')
                  <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Identifier (Developer Option)</label>
                                <input class="form-control" type="text" name="identifier" value="{{old('identifier')}}"  placeholder="Enter Identifier">
                                {!!$errors->first('identifier', '<span class="text-danger has-error">:message</span>')!!}
                            </div>

                            <div class="col-sm-4 form-group">
                                <label>Page Type (Developer Option)</label>
                                <select class="form-control" name="type">
                                    <option value="">--select one--</option>
                                    <option value="single_page">Single Page</option>
                                    <!-- <option value="multiple_page">Multiple Page</option> -->
                                </select>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Location (Developer Option)</label>
                                <select class="form-control" name="location">
                                    <option value="">--select one--</option>
                                    <option value="footer">Display in Footer</option>
                                    <!-- <option value="multiple_page">Multiple Page</option> -->
                                </select>
                            </div>
                  </div>
            @endif

            <div class="row">
                <!-- <div class="col-sm-6 form-group">
                    <label>Order</label>
                    <input class="form-control" type="text" name="order" value="{{old('order')}}" placeholder="Enter Order Id">
                    {!!$errors->first('order', '<span class="text-danger has-error">:message</span>')!!}
                </div> -->
                <div class="col-sm-6 form-group">
                    <label>Parent (Write 0 for parent navigaiton )</label>
                    <input class="form-control" name="parent" value="{{old('parent')}}" placeholder="Enter Parent Id">
                    {!!$errors->first('parent', '<span class="text-danger has-error">:message</span>')!!}
                </div>

                <div class="col-12">
                  <h3>ID Of Alredy Created Parent navigation</h3>
                <ul>
                  @foreach($allParentNavigation as $parent)
                   <li>ID of <span style="color: blue;">{{$parent->name}}</span> is <span style="color: blue;">{{$parent->id}}</span></li>
                  @endforeach
                </ul>
              </div>

              </div>

                    <br>
                    <div class="form-group">
                      <input type="submit" class="btn btn-default" name="" value="Submit">
                        <!-- <button class="btn btn-default" type="submit">Submit</button> -->
                    </div>
            </div>
        </form>
        </div>
    </div>

</div>

@endsection
