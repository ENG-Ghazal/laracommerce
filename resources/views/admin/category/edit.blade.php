@extends('layouts.admin')
@section('content')

  <div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h3> Edit Category
                 <a href="{{ route('admin.category.index') }}" class="btn btn-primary btn-sm  text-white float-end">
                    Back  </a>
            </h3>

        </div>
        <div class="card-body">
           <form action="{{ Route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="name">Name </label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}"/>
                      @error('name')
                         <small class="text-danger"> {{ $message }}</small>
                      @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="slug">Slug </label>
                    <input type="text" name="slug" class="form-control" value="{{ $category->slug }}"/>
                    @error('slug')
                         <small class="text-danger"> {{ $message }}</small>
                      @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="description ">Description  </label>
                    <textarea name="description" class="form-control" row="3"> {{ $category->description }}</textarea>
                    @error('description')
                    <small class="text-danger"> {{ $message }}</small>
                   @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image">Image </label>
                    <input type="file" name="image" class="form-control" />
                    <img src="{{ asset('/uploads/category/'.$category->image) }}" width="60px" height="60px">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="status">Status </label><br>
                    <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}/>
                </div>
                      <div class="col-md-12">
                        <h4> SEO Tags</h4>
                      </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_title">Meta Title </label>
                    <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}" />
                    @error('meta_title')
                    <small class="text-danger"> {{ $message }}</small>
                   @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_keyword">Meta Keyword </label>
                    <textarea  name="meta_keyword" class="form-control" row="3"> {{ $category->meta_keyword }}</textarea>
                    @error('meta_keyword')
                    <small class="text-danger"> {{ $message }}</small>
                   @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_description">Meta Description </label>
                    <textarea  name="meta_description" class="form-control" row="3">{{ $category->meta_description }} </textarea>
                    @error('meta_description')
                    <small class="text-danger"> {{ $message }}</small>
                   @enderror
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
