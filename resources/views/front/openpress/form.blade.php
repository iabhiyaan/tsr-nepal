@extends('front.layouts.app')


@section('content')


<div class="article-form-page">
   <div class="container">
        <form action="{{route('openwrittingStore')}}" method="post" class="article-wrapper" enctype="multipart/form-data">
           @csrf
            <div class="row">
              @if(session('message'))
                  <div class="alert alert-info alert-dismissible" id="successMessage">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{session('message')}}
                  </div>
              @endif

              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <div class="col-lg-12 col-md-6 col-12">
                  <label>Title</label>
                  <input type="text" name="title" placeholder="" value={{old('title')}}>
              </div>

                <!-- <div class="col-lg-6 col-md-6 col-12">
                    <label>Date</label>
                    <input type="date" placeholder="">
                </div> -->

                <!-- <div class="col-lg-6 col-md-6 col-12">
                    <label for="">Category</label>
                    <select name="" id="">
                        <option value="">News</option>
                        <option value="">Analysis</option>
                        <option value="">Market</option>
                        <option value="">IPO</option>
                        <option value="">Media</option>
                    </select>
                </div> -->
                <div class="col-lg-6 col-md-6 col-12">
                    <label>Image For Article</label>
                    <input name="main_image" type="file" placeholder="">
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <label>Full Name</label>
                    <input type="text" name="author" placeholder="" value="{{old('author')}}">
                </div>
                <div class="col-12">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" placeholder="Article here">{{old('description')}}</textarea>
                </div>
            </div>
            <button>Submit</button>
        </form>
   </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endpush
