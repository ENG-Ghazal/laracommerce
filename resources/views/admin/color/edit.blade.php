@extends('layouts.admin')
@section('content')


<div class="row">
    <div class="col-md-12">

      @if(session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
      @endif

        <div class="card">
          <div class="card-header">
              <h3>Edit Color
                   <a href="{{ route('admin.color.index') }}" class="btn btn-danger btn-sm  text-white float-end">
                     Back  </a>
              </h3>

          </div>
          <div class="card-body">
          <form action="{{ route('admin.color.update',$color->id) }}" method="post">
            @csrf
            @method('put')
            <div class="row">

                <div class="col-md-4 mb-3">
                    <label for="name">Name </label>
                    <input type="text" name="name" class="form-control" value="{{ $color->name }}" />
                      @error('name')
                         <small class="text-danger"> {{ $message }}</small>
                      @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="code">Code </label>
                    <input type="text" name="code" class="form-control" value="{{ $color->code }}"  />
                    @error('code')
                         <small class="text-danger"> {{ $message }}</small>
                      @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="status">Status </label><br>
                    <input type="checkbox" lass="form-control" name="status" {{ $color->status =='1' ? 'checked':'' }} />
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary float-end"> Update</button>
               </div>
            </div>
          </form>


          </div>
        </div>
    </div>
</div>



@endsection
