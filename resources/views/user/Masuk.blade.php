@extends('master.master')
@section('isi')
<h1>DATA BARANG MASUK</h1>
<div class="row">
	<div class="col-md-8">
		<a href="{{route('user.tambah_masuk')}}" class="btn btn-info">TAMBAH</a>
	</div>
	<div class="col-md-4">
		<form action="{{route('user.cari_masuk')}}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<input type="text" name="cari" class="form-control" placeholder="Masukan Tanggal Masuk">
			</div>
		</form>
	</div>
</div>
@if(Session::has('success'))
	<div class="alert alert-success">
		<p>{{Session::get('success')}}</p>
	</div>
@endif
@if(Session::has('error'))
	<div class="alert alert-error">
		<p>{{Session::get('error')}}</p>
	</div>
@endif
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>NAMA BARANG</th>
			<th>TANGGAL MASUK</th>
			<th>JUMLAH</th>
			<th>AKSI</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>NAMA BARANG</th>
			<th>TANGGAL MASUK</th>
			<th>JUMLAH</th>
			<th>AKSI</th>
		</tr>
	</tfoot>
	@foreach($data as $d)
	<tr>
		<td>
			@if(isset($d->Barang))
				{{$d->Barang->nama_barang}}
			@endif
		</td>
		<td>
			{{$d->tgl_masuk ?? 'Data tidak tersedia'}}
		</td>
		<td>
			{{$d->jumlah_masuk ?? 'Data tidak tersedia'}}
		</td>
		<td>
			<!-- <a href="{{route('user.show_masuk',$d->id)}}" class="btn btn-info">SHOW</a> -->
			<a href="{{route('user.hapusmasuk',$d->id)}}" class="btn btn-danger" onclick="return confirm('Hapus Data..??')">HAPUS</a>
		</td>
	</tr>
@endforeach

</table>
@endsection
