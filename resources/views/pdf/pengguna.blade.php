<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
			text-align: center;
		}
	</style>
	<center>
		<h3>{{ 'Data ' . $title }}</h3>
	</center>
	<br>

	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Nama Pengguna</th>
                <th>Status</th>
                <th>Cabang</th>
			</tr>
		</thead>
		<tbody>
			@php $num=0 @endphp
            @foreach($pengguna as $p)
            @php $num++ @endphp
			<tr>
				<td>{{ $num }}</td>
				<td>{{$p->nama_lengkap}}</td>
				<td>{{$p->nama_pengguna}}</td>
				<td>{{$p->status}}</td>
				<td>{{$cabang[$num-1]->nama}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>