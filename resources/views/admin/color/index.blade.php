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
              <h3> Colors
                   <a href="{{ route('admin.color.create') }}" class="btn btn-primary btn-sm  text-white float-end">
                      Add Color  </a>
              </h3>

          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
              </thead>
              <tbody>
                  @foreach ($colors as $color )
                   <tr>
                    <td>{{ $color->id }}</td>
                    <td>{{  $color->name }}</td>
                    <td>{{  $color->code }}</td>
                    <td>{{  $color->status == '1' ? 'Hidden' : 'visible'}}</td>
                    <td>
                        <a href="{{ route('admin.color.edit',$color->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <a  href="{{ route('admin.color.delete',$color->id) }}"
                            class="btn btn-sm btn-danger" onclick="return confirm('Are You sure you want to delete this ?  ')"
                            >Delete</a>
                    </td>
                   </tr>
                  @endforeach
              </tbody>
            </table>


          </div>
        </div>
    </div>
</div>



@endsection
