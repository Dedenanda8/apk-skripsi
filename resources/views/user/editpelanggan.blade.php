@extends('master.master')
@section('isi')
<h1>TAMBAH PELANGGAN</h1>
<br>
<hr>
<form action="{{route('user.do_edit_pelanggan',$data->id)}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="form-group">
		<label>MASUKAN NAMA PELANGGAN</label>
		<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$data->nama_pelanggan}}">
		<label class="invalid-feedback">NAMA REQUIRED</label>
	</div>
	<div class="form-group">
		<label>MASUKAN ALAMAT PELANGGAN</label>
		<input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{$data->alamat_pelanggan}}">
		<label class="invalid-feedback">ALAMAT REQUIRED</label>
	</div>
	<div class="form-group">
		<label>MASUKAN NO HP PELANGGAN</label>
		<input type="text" name="no" class="form-control @error('no') is-invalid @enderror" value="{{$data->no_hp_pelanggan}}">
		<label class="invalid-feedback">NO REQUIRED AND MUST BE NUMERIC </label>
	</div>
	<div class="form-group">
		<label>MASUKAN EMAIL PELANGGAN</label>
		<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$data->email_pelanggan}}">
		<label class="invalid-feedback">EMAIL REQUIRED  AND FIX EMAIL</label>
	</div>
	<div class="form-group">
		<img style="width: 100px" src="{{asset('image/'.$data->foto_pelanggan)}}"><br>
		<label>MASUKAN FOTO PELANGGAN</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<input type="submit" name="simpan" value="SIMPAN" class="btn btn-info">
</form>	
@endsection