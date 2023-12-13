<div>
    @include('livewire.admin.brand.modal-form')
  <div class="row">

    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h4>
                            Brand List
                <a href=""  data-bs-toggle="modal" data-bs-target="#AddBrandModal"
                class="btn btn-primary btn-sm float-end"> Add Brand </a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $brands as $brand )
                       <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td>{{ $brand->status == '1' ? 'hidden' : 'visible'}}</td>
                            <td>  <a href=""
                                wire:click = "editBrand({{ $brand->id }})"
                                data-bs-toggle="modal"
                                data-bs-target="#EditBrandModal"
                                 class="btn btn-success btn-sm"> Edit</a>
                                <a href="" href=""
                                wire:click = "deleteBrand({{ $brand->id }})"
                                data-bs-toggle="modal"
                                data-bs-target="#DeleteBrandModal" class="btn btn-danger btn-sm">Delete </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                  NO BRANDS
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            <div>
                {{ $brands->links() }}
            </div>
            </div>
        </div>
    </div>
  </div>
</div>
@push('script')

<script>
    window.addEventListener('close-modal' , event => {
        $('#AddBrandModal').modal('hide');
        $('#EditBrandModal').modal('hide');
        $('#DeleteBrandModal').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    });
    </script>

@endpush
