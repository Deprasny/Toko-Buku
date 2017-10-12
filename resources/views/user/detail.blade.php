@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Detail user {{ $detail->nama }}</div>
                	<div class="panel-body">
                        <p><b>username</b> : {{ $detail->username }}</p>
						<p><b>nama</b> : {{ $detail->nama }}</p>
						<p><b>alamat</b> : {{ $detail->alamat }}</p>
						<p><b>telepon</b> : {{ $detail->telepon }}</p>
						<p><b>status</b> : {{ $detail->status }}</p>
						<p><b>akses</b> : {{ $detail->akses }}</p>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection