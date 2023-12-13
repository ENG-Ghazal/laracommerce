   <!--  ADD BRANDModal -->
   <div wire:ignore.self class="modal fade" id="AddBrandModal" tabindex="-1"  aria-labelledby="AddBrandModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="AddBrandModalLabel">Add Brands  </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form wire:submit.prevent="storeBrand()">
          <div class="modal-body">
            <div class="mb-3">
                <label for="">Brand Name</label>
                <input type="text" class="form-control" wire:model.defer="name">
                @error('name')
                      <small class="text-danger">
                          {{  $message }}
                      </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Brand Slug</label>
                <input type="text" class="form-control" wire:model.defer="slug">
                @error('slug')
                <small class="text-danger">
                    {{  $message }}
                </small>
          @enderror
            </div>
            <div class="mb-3">
                <label for="">Status</label>
                <input type="checkbox" wire:model.defer="status">
                @error('status')
                <small class="text-danger">
                    {{  $message }}
                </small>
          @enderror
            </div>
           ----------
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit"   class="btn btn-primary">save </button>
          </div>
          </form>


        </div>
      </div>
    </div>


    <!--  EDIT BRAND Modal -->



    <div wire:ignore.self class="modal fade" id="EditBrandModal" tabindex="-1" aria-labelledby="EditBrandModalLabel" aria-hidden="true">



      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="EditBrandModalLabel">Update Brands  </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div wire:loading class="p-2">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
          </div>
          <div wire:loading.remove>
              <form wire:submit.prevent="updateBrand()">
          <div class="modal-body">
            <div class="mb-3">
                <label for="">Brand Name</label>
                <input type="text" class="form-control" wire:model.defer="name">
                @error('name')
                      <small class="text-danger">
                          {{  $message }}
                      </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Brand Slug</label>
                <input type="text" class="form-control" wire:model.defer="slug">
                @error('slug')
                <small class="text-danger">
                    {{  $message }}
                </small>
          @enderror
            </div>
            <div class="mb-3">
                <label for="">Status</label>
                <input type="checkbox" wire:model.defer="status">
                @error('status')
                <small class="text-danger">
                    {{  $message }}
                </small>
          @enderror
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit"   class="btn btn-primary">update </button>
          </div>
          </form>
          </div>



        </div>
      </div>
    </div>


 <!-- Delete Brand Modal -->
    <div wire:ignore.self class="modal fade" id="DeleteBrandModal"
     tabindex="-1" aria-labelledby="DeleteBrandModalLabel" aria-hidden="true">



        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="DeleteBrandModalLabel">Delete Brands  </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2">
              <div class="spinner-border text-primary" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="destroyBrand()">
            <div class="modal-body">
              <h4> Are You Sure You Want To Delete   {{ $name }}  ?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit"   class="btn btn-primary">yes </button>
            </div>
            </form>
            </div>



          </div>
        </div>
      </div>


