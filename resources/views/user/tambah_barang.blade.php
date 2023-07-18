@extends('master.master')
@section('isi')
<h1>TAMBAH BARANG</h1>
<br>
<hr>
<form action="{{route('user.do_barang_tambah')}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="form-group">
		<label>Id Barang</label>
		<input type="text" name="id_barang" class="form-control @error('nama') is-invalid @enderror">
		<label class="invalid-feedback">Nama Harus Disi</label>
	</div>
	<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" name="nama_barang" class="form-control @error('kategori') is-invalid @enderror">
		<label class="invalid-feedback">Kategori Harus Disi</label>
	</div>
	<div class="form-group">
		<label>Kategori Barang</label>
		<input type="text" name="kategori_barang" class="form-control @error('stok') is-invalid @enderror">
		<label class="invalid-feedback">Stok Invalid</label>
	</div>
	<div class="form-group">
		<label>Satuan Barang</label>
		<select name="satuan" class="form-control @error('harga') is-invalid @enderror">
			<option value="pilih">Pilih Satuan</option>
			<option value="meter">meter</option>
			<option value="cm">cm</option>
			<option value="millimeter">millimeter</option>
			<!-- Tambahkan pilihan satuan lainnya jika diperlukan -->
		</select>
	</div>
	<!-- <div class="form-group">
		<label>Stok Barang</label>
		<input type="number" name="stok_barang" class="form-control @error('exp') is-invalid @enderror">
		<label class="invalid-feedback">exp Harus Disi</label>
	</div> -->
	<!-- <div class="form-group">
		<label>Masukan Foto Barang</label>
		<input type="file" name="foto" class="form-control">
	</div> -->
	<input type="submit" name="simpan" value="SIMPAN" class="btn btn-info">
</form>	

@endsection