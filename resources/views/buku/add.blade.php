@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Buku</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('store.buku')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label for="judul" class="col-md-4 control-label">Judul</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" required autofocus>

                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('noisbn') ? ' has-error' : '' }}">
                            <label for="noisbn" class="col-md-4 control-label">noisbn</label>

                            <div class="col-md-6">
                                <input id="noisbn" type="text" class="form-control" name="noisbn" value="{{ old('noisbn') }}" required autofocus>

                                @if ($errors->has('noisbn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('noisbn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('penulis') ? ' has-error' : '' }}">
                            <label for="penulis" class="col-md-4 control-label">penulis</label>

                            <div class="col-md-6">
                                <input id="penulis" type="text" class="form-control" name="penulis" value="{{ old('penulis') }}" required autofocus>

                                @if ($errors->has('penulis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penulis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('penerbit') ? ' has-error' : '' }}">
                            <label for="penerbit" class="col-md-4 control-label">penerbit</label>

                            <div class="col-md-6">
                                <input id="penerbit" type="text" class="form-control" name="penerbit" value="{{ old('penerbit') }}" required autofocus>

                                @if ($errors->has('penerbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penerbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tahun') ? ' has-error' : '' }}">
                            <label for="tahun" class="col-md-4 control-label">tahun</label>

                            <div class="col-md-6">
                                <input id="tahun" type="date" class="form-control" name="tahun" value="{{ old('tahun') }}" required autofocus>

                                @if ($errors->has('tahun'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('stok') ? ' has-error' : '' }}">
                            <label for="stok" class="col-md-4 control-label">stok</label>

                            <div class="col-md-6">
                                <input id="stok" type="text" class="form-control" name="stok" value="{{ old('stok') }}" required autofocus>

                                @if ($errors->has('stok'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stok') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('harga_pokok') ? ' has-error' : '' }}">
                            <label for="harga_pokok" class="col-md-4 control-label">harga pokok</label>

                            <div class="col-md-6">
                                <input id="harga_pokok" type="text" class="form-control" name="harga_pokok" value="{{ old('harga_pokok') }}" required autofocus>

                                @if ($errors->has('harga_pokok'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('harga_pokok') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('harga_jual') ? ' has-error' : '' }}">
                            <label for="harga_jual" class="col-md-4 control-label">harga jual</label>

                            <div class="col-md-6">
                                <input id="harga_jual" type="text" class="form-control" name="harga_jual" value="{{ old('harga_jual') }}" required autofocus>

                                @if ($errors->has('harga_jual'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('harga_jual') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ppn') ? ' has-error' : '' }}">
                            <label for="ppn" class="col-md-4 control-label">ppn %</label>

                            <div class="col-md-6">
                                <input id="ppn" type="text" class="form-control" name="ppn" value="{{ old('ppn') }}" required autofocus>

                                @if ($errors->has('ppn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ppn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('diskon') ? ' has-error' : '' }}">
                            <label for="diskon" class="col-md-4 control-label">diskon %</label>

                            <div class="col-md-6">
                                <input id="diskon" type="text" class="form-control" name="diskon" value="{{ old('judul') }}" required autofocus>

                                @if ($errors->has('diskon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('diskon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection