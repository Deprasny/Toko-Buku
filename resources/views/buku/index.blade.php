@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading"><a href="{{ route('index.buku') }}">Daftar Buku</a> <a href="{{ route('add.buku') }}">Tambah Buku</a>
                	<form class="inline" action="{{ route('q.buku') }}" method="GET">
						<div class="form-group">
    						<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
   						 <div class="input-group">
      						<div class="input-group-addon"></div>
      						<input type="text" class="form-control" placeholder="Masukan Keyword" name="search">
      						
    					</div>
 						 </div>
  						<button type="submit" class="btn btn-primary">Cari Data</button>                		
                	</form>
                </div>
                
                	<div class="panel-body">
                		<table class="table">
                			<tr>
                				<td>no</td>
                				<td>Judul</td>
                				<td>NOISBN</td>
                				<td>Stok</td>
                				<td>Aksi</td>
                			</tr>
                			@if($buku->count() > 0)
                			@foreach($buku as $data)
                			<tr>
                				<td>{{ (($buku->currentPage() - 1 ) * $buku->perPage() ) + $loop->iteration }}</td>
                				<td>{{ $data->judul }}</td>
                				<td>{{ $data->noisbn }}</td>
                				<td>{{ $data->stok }}</td>
                				<td><a href="{{ route('detail.buku', $data->id) }}">Detail</a><a href="{{ route('edit.buku', $data->id) }}"> Edit</a><a href="{{ route('delete.buku', $data->id) }}"> Delete</a></td>
                			</tr>
                			@endforeach
                			@else
                			<tr>
                			<td align="center" colspan="5">Buku tidak ada</td>
                			</tr>
                			@endif
                		</table>
                	</div>

                </div>
                {!! $buku->appends(['search' => $cari])->render() !!}
            </div>
        </div>
    </div>
</div>

@endsection