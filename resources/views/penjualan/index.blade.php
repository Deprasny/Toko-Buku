@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading"><a href="{{ route('index.penjualan') }}">Daftar Buku Terjual</a>  <a href="{{ route('add.penjualan') }}">Form Penjualan</a>
                	<form class="inline" action="{{route('q.penjualan')}}" method="GET">
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
                				<td>Petugas Kasir</td>
                                <td>Judul Buku</td>
                                <td>jumlah</td>
                                <td>total</td>
                				<td>Tanggal</td>
                				<td>Aksi</td>
                			</tr>
                			@if($penjualan->count() > 0)
                			@foreach($penjualan as $data)
                			<tr>
                				<td>{{ (($penjualan->currentPage() - 1 ) * $penjualan->perPage() ) + $loop->iteration }}</td>
                                <td>{{ $data->user->nama }}</td>
                                <td>{{ $data->buku->judul }}</td>
                				<td>{{ $data->jumlah }}</td>
                                <td>{{ $data->total }}</td>
                				<td>{{ $data->tanggal }}</td>
                				<td><a href="{{ route('edit.penjualan', $data->id) }}"> Edit</a><a href="{{ route('delete.penjualan', $data->id) }}"> Delete</a></td>
                			</tr>
                			@endforeach
                			@else
                			<tr>
                			<td align="center" colspan="5">Penjualan buku tidak ada</td>
                			</tr>
                			@endif
                		</table>
                	</div>

                </div>
                {!! $penjualan->appends(['search' => $cari])->render() !!}
            </div>
        </div>
    </div>
</div>

@endsection