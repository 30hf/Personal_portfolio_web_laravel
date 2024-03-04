@extends('layouts.admin')
@section('content')
    
<section class="py-5 ">
    <div class="container mt-4">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="fw-bold ">Home Pages</h4>
            
            <button type="button" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bx bx-plus"></i> Add New Data
            </button>
        </div>
        <span class=>*Data yang tercantum adalah data yang nantinya ditampilkan di Visitor Pages</span>
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-center mb-4">
                        <header>
                            <h5 class="card-title fw-bold mb-2">Biodata Admin</h5>
                        </header>
                        @foreach ( $data as $item)
                        <img src="{{ url('storage/' . $item->image) }}"width="110" height="120" alt=" {{ $item->name }}">                   
                       
                    </div>

                </div>
            </div>
            <div class="col-8">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th width ="203px">name</th>
                            <td>:
                               {{ $item->name }}
                            </td>
                        <tr>
                            <th width ="203px">desc</th>
                            <td>:
                                {{ $item->description }}
                            </td>
                        <tr>
                            <th width ="203px">url insta</th>
                            <td>:
                                {{ $item->url_insta }}
                            </td>
                            <tr>
                                <th width ="203px">url linked</th>
                                <td>:
                                    {{ $item->url_linked }}
                                </td>
                                
                                <tr>
                                    <th width ="203px">url github</th>
                                    <td>:
                                        {{ $item->url_github }}
                                    </td>
                                    <tr>
                                        <td>

                                            <div class="d-flex gap-2">
                                                <button class="btn btn-sm btn-warning px-4" type="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id}}">
                                                 Edit
                                                </button>
                                                <form action="{{ route('homevisit.destroy', $item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger px-4" type="submit" onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">
                                                Hapus
                                                </button>
                                                </form>
                                            </div>
                                        </td>
                                    </div>
                                    <div class="modal" tabindex="-1" id="editModal{{ $item->id}}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title"> Edit Data {{$item -> name}}</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{ route('homevisit.update', $item->id)}}" method="POST" enctype="multipart/form-data">
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
                                                <label for="url_insta">Url Instagram</label>
                                                <input type="text" name="url_insta" id="url_insta" class="form-control" value="{{ $item->url_insta }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="url_github">Url Github</label>
                                                <input type="text" name="url_github" id="url_github" class="form-control" value="{{ $item->url_github }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="url_linked">Url Linked</label>
                                                <input type="text" name="url_linked" id="url_linked" class="form-control" value="{{ $item->url_linked}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="image">image</label>
                                                <input type="file" name="image" id="image" class="form-control" accept="image/*" value="{{$item-> image}}">
                                            </div>
                                               
                                              
                                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                            </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    @endforeach
                                </table>
                </div>    <!-- Modal -->
            </div>
        </div>
    </div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Create Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('homevisit.store')}}" method="POST" enctype="multipart/form-data">
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
                    <label for="url_insta">Url Instagram</label>
                    <input type="text" name="url_insta" id="url_insta" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="url_github">Url Github</label>
                    <input type="text" name="url_github" id="url_github" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="url_linked">Url Linked</label>
                    <input type="text" name="url_linked" id="url_linked" class="form-control">
                </div>
                    <div class="mb-3">
                        <label for="image">Photo</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                    </div>
     
              <button type="submit" class="btn btn-primary">Simpan</button>
              </form>  
            </div>
        </div>
    </div>
</section>
@endsection