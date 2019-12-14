@extends('master.master')
@section('isi')
<h1>TAMBAH TRANSAKSI MASUK</h1>
<hr>
<form>
	<div class="form-group">
		<label>MASUKAN NAMA BARANG</label>
		<select name="barang" class="form-control">
			@foreach($barang as $b)
				<option>{{$b->nama_barang}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>MASUKAN NAMA SUPLIER</label>
		<select name="suplier" class="form-control">
			@foreach($suplier as $s)
				<option>{{$s->nama_suplier}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>MASUKAN NAMA BARANG</label>
		<input type="number" name="jumlah" class="form-control">
	</div>
	<input type="submit" value="SIMPAN" class="btn btn-info">
</form>
@endsection