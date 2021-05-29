@extends('layouts.app')

@section('content')
<form action="/storeland" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
            <div class="row">
                <h1>land</h1>
            </div>
            <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label ">description</label>

                                
            <input id="description" type="text" 
            name="description"
            class="form-control @error('description') is-invalid @enderror" 
           value="{{ old('description') }}" 
             autocomplete="description" autofocus>

            @error('description')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                
      </div><div class="row">
      <label for="image" class="col-md-4 col-form-label ">image</label>
      <input  type="file" class="form-control-file" id="image" name="image" >
            @error('image')
              
                     <strong>{{ $message }}</strong>
                </span>
            @enderror

      </div>
      <div class="row">
          <button class="btn btn-primary">add new land</button>
      </div>
    </div>
</div> 
</form>







@endsection
