@extends('layouts.admin')
@section('content')
    
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="fw-bold "> Data Project</h4>
            
            <button type="button" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bx bx-plus"></i> Add New Project
            </button>
        </div>
        <span class="mb-4">*Data yang tercantum adalah data yang nantinya ditampilkan di Visitor Pages</span>
        <div class="table-responsive">
        <table class="table table-hover table-striped rounded">
            <thead>
                <tr style="vertical-align: middle"> 
                    <th>No</th>
                    <th>Photo</th>
                    <th>Nama Project</th>
                    <th>Deskripsi</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project as $key => $item)
                <tr>

                    <td>{{$key + 1}}</td>
                    <td>
                        <img src="{{ url('storage/' . $item->img) }}"width="60" height="70" alt=" ">
                    </td>
                    <td>{{$item -> name}}</td>
                    <td>{{$item -> description}}</td>
                    
                    <td>
                         <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-warning px-4" type="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id}}">
                             Edit
                            </button>
                            <form action="{{ route('project.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger px-4" type="submit" onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">
                            Hapus
                            </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <div class="modal" tabindex="-1" id="editModal{{ $item->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title"> Edit Data Project{{$item ->name}}</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('project.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                           @csrf

                           @method('PUT')

                           <div class="mb-3">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name}} ">
                           </div>
                           <div class="mb-3">
                            <label for="description">Description </label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control" value="{{ $item->description }}"></textarea>
                           </div>
                        <div class="mb-3">
                            <label for="image">image</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*" value="{{$item->
                            image}}">
                        </div>                         
                        <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add New Project</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('project.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                     <label for="name">Nama </label>
                     <input type="text" name="name" id="name" class="form-control" >
                    </div>
                    <div class="mb-3">
                     <label for="description">Description </label>
                     <textarea name="description" id="description" cols="30" rows="3" class="form-control" required></textarea>
                    </div>
                        <div class="mb-3">
                            <label for="img">Photo</label>
                            <input type="file" name="img" id="img" class="form-control" accept="image/*" required>
                        </div>
         
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>  
                </div>
            </div>
        </div>
    </section>
</section>
 @endsection
