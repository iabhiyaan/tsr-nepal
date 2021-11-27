@extends('admin.layouts.app')

@section('content')


<div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Edit Commodity</div>

                                <div class="ibox-tools">

                                </div>
                            </div>
                            @if (count($errors) > 0)
                          	<div class="alert alert-danger">
                          		<ul>
                          			@foreach($errors->all() as $error)
                          			<li>{{$error}}</li>
                          			@endforeach
                          		</ul>
                          	</div>
                          	@endif

                            <div class="ibox-body" style="">
                                <form method="post" action="{{route('commodity.update', $detail->id)}}" enctype="multipart/form-data">
                                  @csrf
                                  @method('put')

                              <div class="row">

                                  <div class="col-md-6 form-group">
                                      <label>Name</label>
                                      <input class="form-control" name="name" value="{{$detail->name}}" type="text" placeholder="Enter Name">
                                      <!-- {!!$errors->first('name', '<span class="text-danger has-error">:message</span>')!!} -->
                                  </div>

                                  <div class="col-md-6 form-group">
                                      <label>Unit</label>
                                      <input class="form-control" name="unit" value="{{$detail->unit}}" type="text" placeholder="Enter Unit">
                                  </div>

                                </div>

                                <div class="form-group">
                                    <label>Order</label>
                                    <input class="form-control" type="number" name="order" value="{{$detail->order}}">
                                </div>

                                <div class="row">
                                  <div class="col-md-6 check-list">
                                      <label class="ui-checkbox ui-checkbox-primary">
                                      <input name="published" type="checkbox" {{$detail->published == 'Yes' ? 'checked' : ''}}>
                                      <span class="input-span"></span>Publish</label>
                                  </div>



                              </div>

                                  <br>

                                    <div class="form-group">
                                        <button class="btn btn-default" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>



            </div>

@endsection
