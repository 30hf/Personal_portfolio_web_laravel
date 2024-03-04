@extends('layouts.admin')
@section('content')
    
<div class="ms-5 mt-5 ">
    <div class="container">
        <h1 class="fw-bold">Resume Data Admin.</h1>
        <span class="mb-4">*Data yang tercantum adalah data yang nantinya ditampilkan di Visitor Pages</span>       
    </div>
</div> 
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h4 class="fw-bold ">Experience</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal"
                class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bx bx-plus"></i> Tambah Experience
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped rounded">
                    <thead>
                        <tr style="vertical-align: middle">
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Nama Perusahaan</th>
                            <th>lokasi Perusahaan</th>
                            <th>Deskripsi</th>
                            
                            <th class="text-center">Action</th>
                        </tr>
                    </thead> 
                    @foreach ($pengalaman as $key => $item)
                    <tr>
    
                        <td>{{$key + 1}}</td>
                        <td>{{$item ->position}}</td>
                        <td>{{$item ->name_company}}</td>
                        <td>{{$item ->location_company}}</td>
                        <td>{{$item ->desc}}</td>
                        
                        <td>
                             <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-warning px-4" type="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id}}">
                                 Edit
                                </button>
                                <form action="{{ route('experience.destroy', $item->id)}}" method="POST">
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
                            <div class="modal-header bg-warning">
                              <h5 class="modal-title text-white"> Edit Data Experience</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('experience.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                                <div class="row">

                                    @csrf
         
                                    @method('PUT')
         
                                    <div class="col-md-6">
                                     <div class="mb-3">
                                      <label for="position">Jabatan </label>
                                      <input type="text" name="position" id="position" class="form-control" value="{{ $item->position }}">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="mb-3">
                                      <label for="name_company">Nama Perusahaan </label>
                                      <input type="text" name="name_company" id="name_company" class="form-control" value="{{ $item->name_company }}">
                                     </div>
                                 </div>
                                 <div class="mb-3">
                                  <label for="location_company">Lokasi Perusahaan </label>
                                  <input type="text" name="location_company" id="location_company" class="form-control" value="{{ $item->location_company }}">
                                 </div>
                                 <div class="mb-3">
                                  <label for="desc">Description </label>
                                  <textarea name="desc" id="desc" cols="30" rows="3" class="form-control" value="{{ $item->desc }}"></textarea>
                                 </div>
                                 
                                 <div class="col-md-6">
                                     <div class="mb-3">
                                         <label for="time_joined">Tahun Bergabung </label>
                                         <input type="text" name="time_joined" id="time_joined" class="form-control" value="{{ $item->time_joined }}">
                                        </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="mb-3">
                                         <label for="time_out">Tahun Keluar</label>
                                         <input type="text" name="time_out" id="time_out" class="form-control" value="{{ $item->time_out }}">
                                        </div>
                                 </div>
                                 <div class="d-flex gap-2">
                                     <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                    
                                </div>               
                                </div>
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
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add New Experience</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('experience.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="col-md-6">
                                <div class="mb-3">
                                 <label for="position">Jabatan </label>
                                 <input type="text" name="position" id="position" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                 <label for="name_company">Nama Perusahaan </label>
                                 <input type="text" name="name_company" id="name_company" class="form-control" >
                                </div>
                            </div>
                            <div class="mb-3">
                             <label for="location_company">Lokasi Perusahaan </label>
                             <input type="text" name="location_company" id="location_company" class="form-control" >
                            </div>
                            <div class="mb-3">
                             <label for="desc">Description </label>
                             <textarea name="desc" id="desc" cols="30" rows="3" class="form-control" required></textarea>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="time_joined">Tahun Bergabung </label>
                                    <input type="text" name="time_joined" id="time_joined" class="form-control" >
                                   </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="time_out">Tahun Keluar</label>
                                    <input type="text" name="time_out" id="time_out" class="form-control" >
                                   </div>
                            </div>
                               <div class="d-flex gap-2">
                                   <button type="submit" class="btn btn-primary">Simpan</button>

                               </div>
                        </div>
                          </form>  
                    </div>
                </div>
            </div>
    </section>
   
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h4 class="fw-bold ">Education</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addEducation"
                    class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bx bx-plus"></i> Tambah Education
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped rounded">
                    <thead>
                        <tr style="vertical-align: middle">
                            <th>No</th>
                            <th>Nama Instansi</th>
                            <th>lokasi Instansi</th>
                            <th>Deskripsi</th>
                            
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendidikan as $key => $education)
                        <tr>
        
                            <td>{{$key + 1}}</td>                          
                            <td>{{$education ->name_education}}</td>
                            <td>{{$education ->location_education}}</td>
                            <td>{{$education ->desc}}</td>
                            
                            <td>
                                 <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-warning px-4" type="button" data-bs-toggle="modal" data-bs-target="#editEducation{{ $education->id}}">
                                     Edit
                                    </button>
                                    <form action="{{ route('education.destroy', $education->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger px-4" type="submit" onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">
                                    Hapus
                                    </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                         <div class="modal" tabindex="-1" id="editEducation{{ $education->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-warning">
                                  <h5 class="modal-title text-white"> Edit Data Education</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{ route('education.update', $education->id)}}" method="POST" enctype="multipart/form-data">
                                    <div class="row">
    
                                        @csrf
             
                                        @method('PUT')
             
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                             <label for="name_education">Nama Instansi</label>
                                             <input type="text" name="name_education" id="name_education" class="form-control" value="{{ $education->name_education }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                             <label for="location_education">Lokasi Perusahaan </label>
                                             <input type="text" name="location_education" id="location_education" class="form-control" value="{{ $education->location_education }}" >
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                         <label for="desc">Description </label>
                                         <textarea name="desc" id="desc" cols="30" rows="3" class="form-control" value="{{ $education->desc }}"></textarea>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="time_joined">Tahun Bergabung </label>
                                                <input type="text" name="time_joined" id="time_joined" class="form-control" value="{{ $education->time_joined }}">
                                               </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="time_out">Tahun Keluar</label>
                                                <input type="text" name="time_out" id="time_out" class="form-control" value="{{ $education->time_out }}">
                                               </div>
                                        </div>
                                           <div class="d-flex gap-2">
                                               <button type="submit" class="btn btn-primary">Simpan</button>
            
                                           </div>
                                    </div>
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
        <div class="modal fade" id="addEducation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add New Data Education</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('education.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                           
                            <div class="col-md-6">
                                <div class="mb-3">
                                 <label for="name_education">Nama Instansi</label>
                                 <input type="text" name="name_education" id="name_education" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                 <label for="location_education">Lokasi Perusahaan </label>
                                 <input type="text" name="location_education" id="location_education" class="form-control" >
                                </div>
                            </div>
                            <div class="mb-3">
                             <label for="desc">Description </label>
                             <textarea name="desc" id="desc" cols="30" rows="3" class="form-control" required></textarea>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="time_joined">Tahun Bergabung </label>
                                    <input type="text" name="time_joined" id="time_joined" class="form-control" >
                                   </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="time_out">Tahun Keluar</label>
                                    <input type="text" name="time_out" id="time_out" class="form-control" >
                                   </div>
                            </div>
                               <div class="d-flex gap-2">
                                   <button type="submit" class="btn btn-primary">Simpan</button>

                               </div>
                        </div>
                          </form>  
                    </div>
                </div>
            </div>
    </section>

   
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h4 class="fw-bold ">Skill</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addSkill"
                class="btn btn-primary d-flex align-items-center gap-2">
                <i class="bx bx-plus"></i> Tambah Skill
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped rounded">
                <thead>
                        <tr style="vertical-align: middle">
                            <th>No</th>
                            <th>Skill</th>  
                            <th>Desciption</th>                       
                            <th class="ms-auto">Action</th>
                        </tr>
                    </thead>
                    @foreach ($skill as $key => $skills)
                    <tr>
    
                        <td>{{$key + 1}}</td>                          
                        <td>{{$skills ->name}}</td>
                        <td>{{ $skills->desc }}</td>
                        <td>
                             <div class="d-flex gap-2 text-end">
                                <button class="btn btn-sm btn-warning px-4" type="button" data-bs-toggle="modal" data-bs-target="#editSkill{{ $skills->id}}">
                                 Edit
                                </button>
                                <form action="{{ route('skill.destroy', $skills->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger px-4" type="submit" onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">
                                Hapus
                                </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                     <div class="modal" tabindex="-1" id="editSkill{{ $skills->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-warning">
                              <h5 class="modal-title text-white"> Edit Data Skill</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('skill.update', $skills->id)}}" method="POST" enctype="multipart/form-data">
                                <div class="row">

                                    @csrf
         
                                    @method('PUT')
                                        <div class="mb-3">
                                         <label for="name">Nama Skill</label>
                                         <input type="text" name="name" id="name" class="form-control" value="{{ $skills->name }}">
                                        </div>
                                    
                                    <div class="mb-3">
                                     <label for="desc">Description </label>
                                     <textarea name="desc" id="desc" cols="30" rows="3" class="form-control" value="{{ $skills->desc }}"></textarea>
                                    </div>
                                       <div class="d-flex gap-2">
                                           <button type="submit" class="btn btn-primary">Simpan</button>
        
                                       </div>
                                </div>
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
        <div class="modal fade" id="addSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add New Data Skill</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('skill.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                                                     
                                <div class="mb-3">
                                 <label for="name">Skills Name</label>
                                 <input type="text" name="name" id="name" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="desc">Description </label>
                                    <textarea name="desc" id="desc" cols="30" rows="3" class="form-control" required></textarea>
                                   </div>                 
                               <div class="d-flex gap-2">
                                   <button type="submit" class="btn btn-primary">Simpan</button>
                               </div>
                        </div>
                          </form>  
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h4 class="fw-bold ">Language</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addLanguage"
                class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bx bx-plus"></i> Tambah Language
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-strippe rounded">
                    <thead>
                        <tr style="vertical-align: middle">
                            <th>No</th>
                            <th>logo</th>
                            <th>Nama Bahasa</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                </thead>
                @foreach ($bahasa as $key => $bhs)
                <tr>

                    <td>{{ $key + 1 }}</td>                          
                    <td> <img src="{{ url('storage/' . $bhs->img) }}"width="30" height="26" alt=" "></td>
                    <td>{{$bhs ->name}}</td>
                    <td>
                         <div class="d-flex gap-2 text-end">
                            <button class="btn btn-sm btn-warning px-4" type="button" data-bs-toggle="modal" data-bs-target="#editSkill{{ $bhs->id}}">
                             Edit
                            </button>
                            <form action="{{ route('language.destroy', $bhs->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger px-4" type="submit" onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">
                            Hapus
                            </button>
                            </form>
                        </div>
                    </td>
                </tr>
                 <div class="modal" tabindex="-1" id="editSkill{{ $skills->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-warning">
                          <h5 class="modal-title text-white"> Edit Data Skill</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('skill.update', $skills->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="row">

                                @csrf
     
                                @method('PUT')
                                    <div class="mb-3">
                                     <label for="name">Nama Skill</label>
                                     <input type="text" name="name" id="name" class="form-control" value="{{ $skills->name }}">
                                    </div>
                                
                                <div class="mb-3">
                                 <label for="desc">Description </label>
                                 <textarea name="desc" id="desc" cols="30" rows="3" class="form-control" value="{{ $skills->desc }}"></textarea>
                                </div>
                                   <div class="d-flex gap-2">
                                       <button type="submit" class="btn btn-primary">Simpan</button>
    
                                   </div>
                            </div>
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
        <div class="modal fade" id="addLanguage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add New Language</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('language.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                                                     
                                <div class="mb-3">
                                 <label for="name">Language Name</label>
                                 <input type="text" name="name" id="name" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="img">Logo</label>
                                    <input type="file" name="img" id="img" class="form-control" accept="image/*" required>
                                </div>   
                               <div class="d-flex gap-2">
                                   <button type="submit" class="btn btn-primary">Simpan</button>
                               </div>
                        </div>
                          </form>  
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    


    
    