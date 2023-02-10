@extends('layout.template')
<!-- START FORM -->
@section('content')

<form action='{{ url('ppl') }}' method='post'>
@csrf 
 <div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('ppl') }}' class="btn btn-secondary">back</a>
     <div class="mb-3 row">
         <label for="id" class="col-sm-2 col-form-label">ID</label>
         <div class="col-sm-10">
             <input type="number" class="form-control" name='id' value="{{ Session::get('id') }}" id="id">
         </div>
     </div>
     <div class="mb-3 row">
         <label for="produk" class="col-sm-2 col-form-label">Produk</label>
         <div class="col-sm-10">
             <input type="text" class="form-control" name='produk' value="{{ Session::get('produk') }}" id="produk">
         </div>
     </div>
     <div class="mb-3 row">
         <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
         <div class="col-sm-10">
             <input type="text" class="form-control" name='kategori' value="{{ Session::get('kategori') }}" id="kategori">
         </div>
     </div>
     <div class="mb-3 row">
         <label for="kategori" class="col-sm-2 col-form-label"></label>
         <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
     </div>
 </div>
</form>
 <!-- AKHIR FORM -->
@endsection