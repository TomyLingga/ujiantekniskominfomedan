@extends('layouts.master')

@section('title')
Home
@endsection

@section('content')


@if($user === 0)
<div class="row">
      <a href="{{route('tambah_ktp')}}" class="btn btn-info">Masukkan Biodata KTP</a>
</div>
@else
@foreach ($user as $u)
<div class="form-group row">
  <label for="nik" class="col-md-4 col-form-label">Provinsi</label>
    <div class="col-sm-auto">
      <input type="text" readonly class="form-control-plaintext" id="provinsi" value="{{$u->provinsi}}">
    </div>
</div>

<div class="form-group row">
  <label for="nama" class="col-md-4 col-form-label">Kabupaten/Kota</label>
    <div class="col">
      <input type="text" readonly class="form-control-plaintext" id="kota" value="{{$u->kota}}">
    </div>
</div>

<div class="form-group row">
  <label for="nama" class="col-md-4 col-form-label">NIK</label>
    <div class="col-sm-auto">
      <input type="text" readonly class="form-control-plaintext" id="nik" value="{{$u->nik}}">
    </div>
</div>

<div class="form-group row">
    <label for="nama" class="col-md-4 col-form-label">Nama</label>
    <div class="col">
      <input type="text" readonly class="form-control-plaintext" id="nama" value="{{$u->nama}}">
    </div>
</div>

<div class="form-group row">
  <label for="nama" class="col-md-4 col-form-label">Tempat Tanggal Lahir</label>
    <div class="col">
      <input type="text" readonly class="form-control-plaintext" id="tempat_lahir" value="{{$u->tempat_lahir.'   '.$u->tanggal_lahir}}">
    </div>
</div>

<div class="form-group row">
  <label for="nama" class="col-md-4 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-auto">
    @if($u->gender == 'f')
      <input type="text" readonly class="form-control-plaintext" id="gender" value="Wanita">
    @else
    <input type="text" readonly class="form-control-plaintext" id="gender" value="Pria">
    @endif
    </div>
</div>

<div class="form-group row">
  <label for="nama" class="col-md-4 col-form-label">Alamat</label>
    <div class="col-sm-auto">
      <input type="text" readonly class="form-control-plaintext" id="alamat" value="{{$u->alamat}}">
    </div>
</div>

<div class="form-group row">
  <label for="nama" class="col-md-4 col-form-label">Agama</label>
    <div class="col-sm-auto">
      <input type="text" readonly class="form-control-plaintext" id="agama" value="{{$u->agama}}">
    </div>
</div>

<div class="form-group row">
  <label for="nama" class="col-md-4 col-form-label">Status Perkawinan</label>
    <div class="col-sm-auto">
    @if($u->status_perkawinan == '1')
      <input type="text" readonly class="form-control-plaintext" id="status_perkawinan" value="Kawin">
    @elseif($u->status_perkawinan == '2')
    <input type="text" readonly class="form-control-plaintext" id="status_perkawinan" value="Belum Kawin">
    @elseif($u->status_perkawinan == '3')
    <input type="text" readonly class="form-control-plaintext" id="status_perkawinan" value="Janda/Duda">
    @endif
      <!-- <input type="text" readonly class="form-control-plaintext" id="status_perkawinan" value="{{$u->status_perkawinan}}"> -->
    </div>
</div>

<div class="form-group row">
  <label for="nama" class="col-md-4 col-form-label">Pekerjaan</label>
    <div class="col">
      <input type="text" readonly class="form-control-plaintext" id="pekerjaan" value="{{$u->pekerjaan}}">
    </div>
</div>

<a href = "{{url('ktp/edit',$u->id)}}" class = "btn btn-info btn-sm">Edit</a>

<button type = "button" class = "btn btn-danger btn-sm" data-toggle = "modal" data-target = "#exampleModal" id={{ $u->id }} value="{{ $u->nik }}">
    Delete
</button>

@endforeach

@endif

  <!-- Modal -->
<div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role= "dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        @if($user)
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Klinik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            Yakin ingin menghapus Biodata {{ $u->nik}}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                <a href = "/ktp/hapus/{{$u->id}}" id="hapus" class   = "btn btn-danger">Ya</a>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', function(e) {
        var target1 = e.relatedTarget.id;
        var target2 = e.relatedTarget.value;
      
        $(this).find('.modal-body').text("Yakin ingin menghapus "+target2+"?");

        var link = document.getElementById("hapus");
        link.setAttribute('href', "/ktp/hapus/"+target1);
    });
</script>

@endsection