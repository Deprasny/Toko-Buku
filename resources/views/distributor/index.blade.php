@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading"><a href="{{ route('index.distributor') }}">Daftar Distributor</a> <a href="{{ route('add.distributor') }}">Tambah Distributor</a>
                	<form class="inline" action="{{ route('q.distributor') }}" method="GET">
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
                				<td>Nama distributor</td>
                				<td>alamat</td>
                				<td>telepon</td>
                				<td>Aksi</td>
                			</tr>
                			@if($distributor->count() > 0)
                			@foreach($distributor as $data)
                			<tr>
                				<td>{{ (($distributor->currentPage() - 1 ) * $distributor->perPage() ) + $loop->iteration }}</td>
                				<td>{{ $data->nama }}</td>
                				<td>{{ $data->alamat }}</td>
                				<td>{{ $data->telepon }}</td>
                				<td><a href="{{ route('edit.distributor', $data->id) }}"> Edit</a><a href="{{ route('delete.distributor', $data->id) }}"> Delete</a></td>
                			</tr>
                			@endforeach
                			@else
                			<tr>
                			<td align="center" colspan="5">distributor tidak ada</td>
                			</tr>
                			@endif
                		</table>
                	</div>

                </div>
                {!! $distributor->appends(['search' => $cari])->render() !!}
            </div>
        </div>
    </div>
</div>

@endsection