@extends('layouts.admin')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <h3> Add Product
                   <a href="{{ route('admin.product.index') }}" class="btn btn-danger btn-sm  text-white float-end">
                  Back </a>
              </h3>

          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                 @foreach ($errors->all() as $error)
                    <div>
                        {{ $error }}
                    </div>
                 @endforeach
              </div>

            @endif
            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
               @csrf
            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                    Home</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                    SEO Tags </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                    Details</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                      Product Image </button>
                  </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="mb-3 ">
                        <label class="mb-3">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                 <option value="{{ $category->id }}">{{  $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                         <label class="mb-3"> Product Name</label>
                         <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="mb-3"> Product Slug</label>
                        <input type="text" class="form-control" name="slug">
                   </div>
                   <div class="mb-3 ">
                    <label class="mb-3">Brands</label>
                    <select name="brand" class="form-control">
                        @foreach ($brands as $brand)
                             <option value="{{ $brand->name }}">{{  $category->name }}</option>
                        @endforeach
                    </select>
                   </div>
                   <div class="mb-3">
                    <label class="mb-3"> Small Description</label>
                    <textarea class="form-control" name="small_description" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="mb-3">  Description</label>
                        <textarea class="form-control" name="description" rows="4"></textarea>
                        </div>

                </div>
                <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                    <div class="mb-3">
                        <label class="mb-3"> Meta Title </label>
                        <input type="text" class="form-control" name="meta_title">
                   </div>
                    <div class="mb-3">
                        <label class="mb-3"> Meta Keyword </label>
                        <textarea class="form-control" name="meta_keyword" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="mb-3">  Meta Description </label>
                            <textarea class="form-control" name="meta_description" rows="4"></textarea>
                            </div>
                </div>
                <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label> Original Price</label>
                                <input type="number" class="form-control" name="original_price">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label> Selling Price</label>
                                <input type="number" class="form-control" name="selling_price">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label> Quantity</label>
                                <input type="number" class="form-control" name="quantity">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label> Trending</label><br>
                                <input type="checkbox" class="" name="trending" style="width:30px; height:30px;">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label> Status</label><br>
                                <input type="checkbox" class="" name="status" style="width:30px; height:30px;">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                   <div class="mb-3">
                     <label>Upload Product Images</label>
                    <input type="file" name="image[]"  multiple class="form-control">
                   </div>


                </div>



              </div>
              <div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>



@endsection
