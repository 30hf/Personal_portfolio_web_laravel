@extends('layouts.admin')
@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="fw-bold">Selamat Datang Kembali,  {{ Auth::user()->name }}.</h1>
        <p class="mb-5 text-secondary">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta voluptatum aliquam excepturi omnis
            aperiam officia officiis nam explicabo, debitis quae pariatur rerum perspiciatis aliquid quam
            reprehenderit, eveniet voluptate accusamus non?
        </p>
    </div>
</section>
   
@endsection