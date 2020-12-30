@extends('layouts.master')

@section('title')
Edit KTP
@endsection

@section('content')
    <h3>Edit KTP</h3>
    <br>
    @foreach ($ktp as $k)
    <form enctype="multipart/form-data" action="/ktp/update/{{ $k->id }}" method="post">
    @endforeach
        {{ csrf_field() }}
        <div class="form-group"> {{-- alamat ktp--}}
            <div class="form-row">
                <div class="col">
                <label>Domisili</label>
                    <select class="custom-select" id="provinsialamat" name="provinsialamat">
                        <option selected>Provinsi...</option>
                        @foreach ($prov as $id_prov => $nama_prov)
                        <option value="{{ $id_prov }}" {{ $k->provinsi == $id_prov ? 'selected = ""' : '' }}>{{ $nama_prov }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                <label>Domisili</label>
                    <select class="custom-select" id="kota2" name="kota">
                        <option value="">Kota/Kabupaten</option>
                    </select>
                </div><br>
            </div> <br>
        </div>
        <div class="form-group"> {{-- nik --}}
            <label>NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" value="{{ $k->nik }}"  autofocus placeholder="NIK ...">
        </div>
        <div class="form-group"> {{-- nama --}}
            <label>Nama lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $k->nama }}"  autofocus placeholder="Nama lengkap ...">
        </div>
        <div class="form-group"> {{-- ttl --}}
            <label>Tempat tanggal lahir</label>
            <div class="form-row">
                <div class="col">
                    <select class="custom-select" id="provinsilahir" name="provinsilahir">
                        <option selected>Provinsi...</option>
                        @foreach ($prov as $id_prov => $nama_prov)
                        <option value="{{ $id_prov }}"{{ $k->tempat_lahir == $id_prov ? 'selected = "selected"' : '' }}>{{ $nama_prov }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select class="custom-select" id="kota1" name="tempat_lahir" >
                        <option value="">Kota/Kabupaten</option>
                    </select>
                </div>
            </div> <br>
            <input type="date" name="tanggal_lahir" max="3000-12-31" min="1000-01-01" class="form-control" placeholder="bulan-tanggal-tahun" value="{{ $k->tanggal_lahir }}">
        </div>
        <div class="form-group"> {{-- kelamin --}}
            <label>Jenis kelamin</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="pria" value="m" {{ $k->gender == "m" ? 'checked = "checked"' : '' }}>
                <label class="form-check-label" for="pria">Pria</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="wanita" value="f"{{ $k->gender == "f" ? 'checked = "checked"' : '' }}>
                <label class="form-check-label" for="wanita">Wanita</label>
            </div>
        </div>
        <div class="form-group"> {{-- alamat --}}
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $k->alamat }}"  autofocus placeholder="Nama lengkap ...">
        </div>
        <div class="form-group"> {{-- agama --}}
            <label>Agama</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agama" id="islam" value="Islam" {{ $k->agama == "Islam" ? 'checked = "checked"' : '' }} >
                <label class="form-check-label" for="islam">Islam</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agama" id="katolik" value="Katolik"{{ $k->agama == "Katolik" ? 'checked = "checked"' : '' }}>
                <label class="form-check-label" for="katolik">Katolik</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agama" id="protestan" value="Protestan"{{ $k->agama == "Protestan" ? 'checked = "checked"' : '' }}>
                <label class="form-check-label" for="protestan">Protestan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agama" id="budha" value="Buddha"{{ $k->agama == "Buddha" ? 'checked = "checked"' : '' }}>
                <label class="form-check-label" for="budha">Budha</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agama" id="hindu" value="Hindu">{{ $k->agama == "Hindu" ? 'checked = "checked"' : '' }}
                <label class="form-check-label" for="hindu">Hindu</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agama" id="lainnya" value="lainnya"{{ $k->agama == "lainnya" ? 'checked = "checked"' : '' }}>
                <label class="form-check-label" for="lainnya">Lainnya</label>
            </div>
        </div>
        <div class="form-group"> {{--status perkawinnan --}}
            <label>Status Perkawinan</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_perkawinan" id="status_perkawinan" value="1" {{ $k->status_perkawinan == "1" ? 'checked = "checked"' : '' }}>
                <label class="form-check-label" for="kawin">Kawin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_perkawinan" id="status_perkawinan" value="2" {{ $k->status_perkawinan == "2" ? 'checked = "checked"' : '' }}>
                <label class="form-check-label" for="belumkawin">Belum Kawin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_perkawinan" id="status_perkawinan" value="3" {{ $k->status_perkawinan == "3" ? 'checked = "checked"' : '' }}>
                <label class="form-check-label" for="cerai">Cerai</label>
            </div>
        </div>
        <div class="form-group"> {{-- pekerjaan --}}
            <label>Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{ $k->pekerjaan }}"  autofocus placeholder="Nama lengkap ...">
        </div>
        
        <br><br>
        <button type="submit" class="btn btn-danger">Simpan</button>
    </form>


<script type="text/javascript">

    jQuery(function()
    {
        $("#provinsilahir").on('change', function() {
            var provID = $(this).val();
            getKota(provID,1)
        });
        $("#provinsialamat").on('change', function() {
            var provID = $(this).val();
            getKota(provID,2)
        });

        function getKota(id,code) {
            // alert(id);
            if(id) {
                $.ajax({
                    url: '/ktp/kota/'+id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $("#kota".concat(code)).empty();
                        $.each(data, function(key, value) {
                            $("#kota".concat(code)).append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $("#kota".concat(code)).empty();
            }
        }
    });

</script>
@endsection