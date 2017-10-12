@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Pasok</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('store.penjualan')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-4 control-label">Nama Kasir</label>

                            <div class="col-md-6">
                                <select id="user_id" type="user_id" class="form-control" name="user_id">
                                    <option value="">Kasir Yang Bertugas</option>
                                    @foreach ($user as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('buku_id') ? ' has-error' : '' }}">
                            <label for="buku_id" class="col-md-4 control-label">Judul Buku</label>

                            <div class="col-md-6">
                                <select id="buku_id" type="buku_id" class="form-control" name="buku_id">
                                    <option value="">Pilih Buku</option>
                                    @foreach ($buku as $data)
                                        @if($data->stok > 0)
                                        <option value="{{ $data->id }}">{{ $data->judul }}</option>
                                         @endif
                                    @endforeach
                                    @foreach ($buku as $data)
                                    <input type="hidden" name="harga" value="{{$data->harga_jual}}">
                                    <input type="hidden" name="ppn" value="{{$data->ppn}}">
                                    <input type="hidden" name="diskon" value="{{$data->diskon}}">
                                    @endforeach
                                </select>

                                @if ($errors->has('buku_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('buku_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
                            <label for="jumlah" class="col-md-4 control-label">Jumlah Buku</label>

                            <div class="col-md-6">
                                <input id="jumlah" type="text" class="form-control" name="jumlah" value="{{ old('jumlah') }}" required autofocus>

                                @if ($errors->has('jumlah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah') }}</strong>
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