@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading"><a href="{{ route('index.user') }}">Daftar Pegawai Kasir</a>
                	<form class="inline" action="{{ route('q.user') }}" method="GET">
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
                				<td>Nama</td>
                				<td>Alamat</td>
                				<td>Telepon</td>
                				<td>Aksi</td>
                			</tr>
                			@if($user->count() > 0)
                			@foreach($user as $data)
                			<tr>
                				<td>{{ (($user->currentPage() - 1 ) * $user->perPage() ) + $loop->iteration }}</td>
                				<td>{{ $data->nama }}</td>
                				<td>{{ $data->alamat }}</td>
                				<td>{{ $data->telepon }}</td>
                				<td><a href="{{ route('detail.user', $data->id) }}">Detail</a><a href="{{ route('edit.user', $data->id) }}"> Edit</a><a href="{{ route('delete.user', $data->id) }}"> Delete</a></td>
                			</tr>
                			@endforeach
                			@else
                			<tr>
                			<td align="center" colspan="5">User tidak ada</td>
                			</tr>
                			@endif
                		</table>
                	</div>

                </div>
                {!! $user->appends(['search' => $cari])->render() !!}
            </div>
        </div>
    </div>
</div>

@endsection