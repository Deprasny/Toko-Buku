@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading"><a href="{{ route('index.pasok') }}">Daftar Pasokan Buku</a> <a href="{{ route('add.pasok') }}">Tambah Pasokan</a>
                	<form class="inline" action="{{route('q.pasok')}}" method="GET">
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
                				<td>Nama Distributor</td>
                                <td>Judul Buku</td>
                                <td>jumlah</td>
                				<td>Tanggal</td>
                				<td>Aksi</td>
                			</tr>
                			@if($pasok->count() > 0)
                			@foreach($pasok as $data)
                			<tr>
                				<td>{{ (($pasok->currentPage() - 1 ) * $pasok->perPage() ) + $loop->iteration }}</td>
                                <td>{{ $data->distributor->nama }}</td>
                                <td>{{ $data->buku->judul }}</td>
                				<td>{{ $data->jumlah }}</td>
                				<td>{{ $data->tanggal }}</td>
                				<td><a href="{{ route('edit.pasok', $data->id) }}"> Edit</a><a href="{{ route('delete.pasok', $data->id) }}"> Delete</a></td>
                			</tr>
                			@endforeach
                			@else
                			<tr>
                			<td align="center" colspan="5">Pasokan Buku tidak ada</td>
                			</tr>
                			@endif
                		</table>
                	</div>

                </div>
                {!! $pasok->appends(['search' => $cari])->render() !!}
            </div>
        </div>
    </div>
</div>

@endsection