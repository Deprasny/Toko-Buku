@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Detail Buku {{ $detail->judul }}</div>
                	<div class="panel-body">
						<p><b>NOISBN</b> : {{ $detail->noisbn }}</p>
						<p><b>Penulis</b> : {{ $detail->penulis }}</p>
						<p><b>Penerbit</b> : {{ $detail->penerbit }}</p>
						<p><b>Tahun</b> : {{ $detail->tahun }}</p>
						<p><b>Stok</b> : {{ $detail->stok }}</p>
						<p><b>Harga pokok</b> : {{ $detail->harga_pokok }}</p>
						<p><b>Harga jual</b> : {{ $detail->harga_jual }}</p>
						<p><b>PPN</b> : {{ $detail->ppn }}%</p>
						<p><b>Diskon</b> : {{ $detail->diskon }}%</p>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection