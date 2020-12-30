<!DOCTYPE html>
<html>
<head>
	<title>Laporan KTP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 6pt;
		}
	</style>
	<center>
		<h5>Laporan KTP </h5>
		<br><br>
	</center>
	<div class = "card-body table-responsive p-0">
	<table class='table table-striped'>
		<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>TTL</th>
				<th>Alamat</th>
				<th>Provinsi</th>
				<th>Kabupaten/Kota</th>
				<th>Seks</th>
				<th>Agama</th>
				<th>Status</th>
				<th>Pekerjaan</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($ktp as $k)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$k->nik}}</td>
				<td>{{$k->nama}}</td>
				<td>{{$k->tempat_lahir.', '.$k->tanggal_lahir}}</td>
				<td>{{$k->alamat}}</td>
				<td>{{$k->provinsi}}</td>
				<td>{{$k->kota}}</td>
				<td>{{$k->gender}}</td>
				<td>{{$k->agama}}</td>
				<td>{{$k->status_perkawinan}}</td>
				<td>{{$k->pekerjaan}}</td>
				
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
 
</body>
</html>