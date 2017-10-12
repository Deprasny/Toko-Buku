@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Pasok</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('update.pasok', $pasok->id)}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('distributor_id') ? ' has-error' : '' }}">
                            <label for="distributor_id" class="col-md-4 control-label">Nama Distributor</label>

                            <div class="col-md-6">
                                <select name="distributor_id" id="" class="form-control"> 
                                    @foreach ($distributor as $data)
                                    <option value="{{ $data->id}}" {{ ($data->id == $pasok->distributor_id) ? 'selected' : '' }}>{{ $data->nama }}</option>  
                                    @endforeach
                              
                                </select>
                            </div>

                                @if ($errors->has('distributor_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('distributor_id') }}</strong>
                                    </span>
                                @endif
                      
                        </div>

                        <div class="form-group{{ $errors->has('buku_id') ? ' has-error' : '' }}">
                            <label for="buku_id" class="col-md-4 control-label">Judul Buku</label>

                            <div class="col-md-6">
                                <select name="buku_id" id="" class="form-control"> 
                                    @foreach ($buku as $data)
                                    <option value="{{ $data->id}}" {{ ($data->id == $pasok->buku_id) ? 'selected' : '' }}>{{ $data->judul }}</option>  
                                    @endforeach
                              
                                </select>
                                @if ($errors->has('buku_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('buku_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
                            <label for="tanggal" class="col-md-4 control-label">Tanggal Pasok</label>

                            <div class="col-md-6">
                                <input id="tanggal" type="date" class="form-control" name="tanggal" value="{{ $pasok->tanggal }}" required autofocus>

                                @if ($errors->has('tanggal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
                            <label for="jumlah" class="col-md-4 control-label">Jumlah</label>

                            <div class="col-md-6">
                                <input id="jumlah" type="text" class="form-control" name="jumlah" value="{{ $pasok->jumlah }}" required autofocus>

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