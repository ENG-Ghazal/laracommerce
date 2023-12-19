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
              <h3> Edit  Product
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
            <form action="{{ route('admin.product.update',$product->id) }}" method="post" enctype="multipart/form-data">
               @csrf
               @method('PUT')
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
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                      Product Colors </button>
                  </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="mb-3 ">
                        <label class="mb-3">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                 <option value="{{ $category->id }}" {{ $category->id == $product->category->id ? 'selected' :'' }}>
                                    {{  $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                         <label class="mb-3"> Product Name</label>
                         <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="mb-3"> Product Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $product->slug }}">
                   </div>
                   <div class="mb-3 ">
                    <label class="mb-3">Brands</label>
                    <select name="brand" class="form-control">
                        @foreach ($brands as $brand)
                             <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected' :'' }}>
                                {{  $brand->name }}</option>
                        @endforeach
                    </select>
                   </div>
                   <div class="mb-3">
                    <label class="mb-3"> Small Description</label>
                    <textarea class="form-control" name="small_description" rows="4"> {{ $product->small_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="mb-3">  Description</label>
                        <textarea class="form-control" name="description" rows="4">{{ $product->description }}</textarea>
                        </div>

                </div>
                <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                    <div class="mb-3">
                        <label class="mb-3"> Meta Title </label>
                        <input type="text" class="form-control" name="meta_title" value="{{ $product->meta_title }}">
                   </div>
                    <div class="mb-3">
                        <label class="mb-3"> Meta Keyword </label>
                        <textarea class="form-control" name="meta_keyword" rows="4">{{ $product->meta_keyword }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="mb-3">  Meta Description </label>
                            <textarea class="form-control" name="meta_description" rows="4">{{ $product->meta_description }}</textarea>
                            </div>
                </div>
                <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label> Original Price</label>
                                <input type="number" class="form-control" name="original_price" value="{{ $product->original_price }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label> Selling Price</label>
                                <input type="number" class="form-control" name="selling_price" value="{{ $product->original_price }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label> Quantity</label>
                                <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label> Trending</label><br>
                                <input type="checkbox" class="" name="trending" {{ $product->trending == '1' ? 'checked' : '' }} style="width:30px; height:30px;">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label> Status</label><br>
                                <input type="checkbox" class="" name="status" {{ $product->status == '1' ? 'checked' : '' }} style="width:30px; height:30px;">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                   <div class="mb-3">
                     <label>Upload Product Images</label>
                    <input type="file" name="image[]"  multiple class="form-control">
                   </div>
                    <div class="mb-3">
                        @if(count($product->productImages) > 0)
                           <div class="row">
                            @foreach($product->productImages as $productImage )
                            <div class="col-md-2">
                                 <img src="{{ asset($productImage->image) }}" alt="" class="me-4" style="width:80px;height:80px">
                                  <a href="{{ route('admin.product.delete.product-image',$productImage->id) }}" class="d-block"> Remove</a>
                                </div>

                             @endforeach
                           </div>

                        @else
                        <h5> No Images For This Product </h5>
                        @endif

                    </div>

                </div>
                <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                <div class="mb-3">
                    <h4> Add Product Color</h4>
                    <label>Select  Colors</label>
                    <hr/>
                    <div class="row">

                        @forelse ($colors as $color)
                        <div class="col-md-12 mb-3">
                           <div class="p-2 border">
                            Color :  <input type="checkbox" name="colors[{{ $color->id }}]" value="{{ $color->id }}" > {{ $color->name }} &ensp;&ensp;&ensp;
                            Quantity :  <input type="number" name="colorquantity[{{ $color->id }}]" style="width:70px;border:1px solid">
                        </div>
                        </div>
                        @empty
                        <h1>No Colors Found</h1>
                        @endforelse

                    </div>

                </div>
                @if(count($product->productColors) >0)
                <div class="mb-3">
                <h4> Edit Product Color</h4>
                <hr>
                <div class="table-responsive">
                   <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>Color Name</td>
                            <td>Quantity</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $product->productColors as $productColor )
                        <tr class="prod-color-tr">
                            <td>{{ $productColor->color->name }}</td>
                            <td>
                                <div class="input-group" style="width:150px">
                                 <input type="text" value="{{ $productColor->quantity  }}" class="productColorQuantity form-control form-control-sm">
                                 <button type="button" value="{{ $productColor->id }}" class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                </div>


                            </td>
                            <td><button type="button" value="{{ $productColor->id }}" class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete </button></td>
                        </tr>
                        @endforeach

                    </tbody>
                   </table>
                </div>
            </div>
                @endif

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
@section('scripts')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click','.updateProductColorBtn',function(){
            var product_id = "{{ $product->id }}";
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
            if(qty <=0 ){
                alert("quantity is required ");
                return false ;
            }
            var data ={
                'product_id' : product_id,
                'qty' : qty
            };
            //var url = "{{ route('admin.product.product-color.update',"+prod_color_id+") }}";

            $.ajax({
                 type :"POST",
                 url: "/admin/product/product-color/"+prod_color_id+"/update",

                 data: data,
                 success: function (response){
                     alert(response.message);
                 }
            });

        });

        $(document).on('click','.deleteProductColorBtn',function(){

            var prod_color_id = $(this).val();
            var thisClick = $(this);

            $.ajax({
                 type :"GET",
                 url: "/admin/product/product-color/"+prod_color_id+"/delete",
                 success: function (response){
                    thisClick.closest('.prod-color-tr').remove();
                     alert(response.message);
                 }
            });

        });

    })

</script>
@endsection

