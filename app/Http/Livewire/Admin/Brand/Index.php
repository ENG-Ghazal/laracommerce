<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\Brand;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme ='bootstrap';

    public $name , $slug , $status , $brand_id;

    public function rules(){
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
    }
    public function resetInput(){
        $this->name =NULL;
        $this->lug =NULL;
        $this->status =NULL;
    }
    public function closeModal(){
       $this->resetInput();
    }
    public function openModal(){
        $this->resetInput();
     }
    public function storeBrand(){
        $validatedData = $this->validate();
        Brand::create([
            'name'=> $this->name,
            'slug'=> Str::slug ($this->slug),
            'status'=> $this->status == true ? '1' :'0',
        ]);
        session()->flash('message','Brand Added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function editBrand(int $brand_id){
          $this->brand_id = $brand_id;
          $brand = Brand::findorFail($brand_id);
          $this->name = $brand->name ;
          $this->slug = $brand->slug ;
          $this->status = $brand->status ;
    }
    public function updateBrand(){
        $validatedData = $this->validate();
        Brand::find($this->brand_id)->update([
            'name'=> $this->name,
            'slug'=> Str::slug ($this->slug),
            'status'=> $this->status == true ? '1' :'0',
        ]);
        session()->flash('message','Brand updated successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function deleteBrand(int $brand_id){
        $this->brand_id = $brand_id;
        $brand = Brand::findorFail($brand_id);
        $this->name = $brand->name ;
        $this->slug = $brand->slug ;
        $this->status = $brand->status ;
    }
    public function destroyBrand(){
         Brand::find($this->brand_id)->delete();
         session()->flash('message','Brand deleted successfully');
         $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index',['brands'=> $brands])->extends('layouts.admin')->section('content');
    }
}
