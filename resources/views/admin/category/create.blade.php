@extends('layouts.admin')
@section('content')

  <div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h3> Add Category
                 <a href="{{ route('admin.category.index') }}"
                 class="btn btn-danger btn-sm  text-white float-end">
                    Back  </a>
            </h3>

        </div>
        <div class="card-body">
           <form action="{{ Route('admin.category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="name">Name </label>
                    <input type="text" name="name" class="form-control" />
                      @error('name')
                         <small class="text-danger"> {{ $message }}</small>
                      @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="slug">Slug </label>
                    <input type="text" name="slug" class="form-control" />
                    @error('slug')
                         <small class="text-danger"> {{ $message }}</small>
                      @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="description ">Description  </label>
                    <textarea name="description" class="form-control" row="3"></textarea>
                    @error('description')
                    <small class="text-danger"> {{ $message }}</small>
                   @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image">Image </label>
                    <input type="file" name="image" class="form-control" />

                </div>

                <div class="col-md-6 mb-3">
                    <label for="status">Status </label><br>
                    <input type="checkbox" name="status"/>
                </div>
                      <div class="col-md-12">
                        <h4> SEO Tags</h4>
                      </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_title">Meta Title </label>
                    <input type="text" name="meta_title" class="form-control" />
                    @error('meta_title')
                    <small class="text-danger"> {{ $message }}</small>
                   @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_keyword">Meta Keyword </label>
                    <textarea  name="meta_keyword" class="form-control" row="3"></textarea>
                    @error('meta_keyword')
                    <small class="text-danger"> {{ $message }}</small>
                   @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_description">Meta Description </label>
                    <textarea  name="meta_description" class="form-control" row="3"></textarea>
                    @error('meta_description')
                    <small class="text-danger"> {{ $message }}</small>
                   @enderror
                </div>
                <div class="col-md-12 mb-3">
                     <button type="submit" class="btn btn-primary float-end"> Save</button>
                </div>
            </div>
           </form>

        </div>

      </div>
  </div>
  </div>

@endsection
