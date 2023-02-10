@extends('layout.template') 
        <!-- START DATA -->
        @section('content')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('ppl/create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">ID</th>
                            <th class="col-md-4">Produk</th>
                            <th class="col-md-2">Kategori</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)  
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->produk }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                <a href='{{ url('ppl/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form class="d-inline" action="{{ url('ppl/'.$item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
          </div>
          <!-- AKHIR DATA -->
        @endsection

