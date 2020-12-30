@extends('layouts.master')

@section('title')
Home
@endsection

@section('content')
    <h3>KTP</h3>
    <br>
    <form enctype="multipart/form-data" action="/ktp/store" method="post">
        {{ csrf_field() }}
        <div class="form-group"> {{-- alamat ktp--}}
            <div class="form-row">
                <div class="col">
                <label>Domisili</label>
                    <select class="custom-select" id="provinsialamat" name="provinsialamat">
                        <option selected>Provinsi...</option>
                        @foreach ($prov as $id_prov => $nama_prov)
                        <option value="{{ $id_prov }}">{{ $nama_prov }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                <label>Domisili</label>
                    <select class="custom-select" id="kota2" name="kota" required>
                        <option value="">Kota/Kabupaten</option>
                    </select>
                </div><br>
            </div> <br>
        </div>
        <div class="form-group"> {{-- nik --}}
            <label>NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" value="{{ old('nik') }}" required autofocus placeholder="Nama lengkap ...">
        </div>
        <div class="form-group"> {{-- nama --}}
            <label>Nama lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" required autofocus placeholder="Nama lengkap ...">
        </div>
        <div class="form-group"> {{-- ttl --}}
            <label>Tempat tanggal lahir</label>
            <div class="form-row">
                <div class="col">
                    <select class="custom-select" id="provinsilahir" name="provinsilahir">
                        <option selected>Provinsi...</option>
                        @foreach ($prov as $id_prov => $nama_prov)
                        <option value="{{ $id_prov }}">{{ $nama_prov }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select class="custom-select" id="kota1" name="tempat_lahir" required>
                        <option value="">Kota/Kabupaten</option>
                    </select>
                </div>
            </div> <br>
            <input type="date" name="tanggal_lahir" max="3000-12-31" min="1000-01-01" class="form-control" placeholder="bulan-tanggal-tahun" required>
        </div>
        <div class="form-group"> {{-- kelamin --}}
            <label>Jenis kelamin</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="pria" value="m" required>
                <label class="form-check-label" for="pria">Pria</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="wanita" value="f">
                <label class="form-check-label" for="wanita">Wanita</label>
            </div>
        </div>
        <div class="form-group"> {{-- alamat --}}
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat') }}" required autofocus placeholder="Nama lengkap ...">
        </div>
        <div class="form-group"> {{-- agama --}}
            <label>Agama</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agama" id="islam" value="Islam" required>
                <label class="form-check-label" for="islam">Islam</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agama" id="katolik" value="Katolik">
                <label class="form-check-label" for="katolik">Katolik</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agama" id="protestan" value="Protestan">
                <label class="form-check-label" for="protestan">Protestan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agama" id="budha" value="Buddha">
                <label class="form-check-label" for="budha">Budha</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agama" id="hindu" value="Hindu">
                <label class="form-check-label" for="hindu">Hindu</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="agama" id="lainnya" value="lainnya">
                <label class="form-check-label" for="lainnya">Lainnya</label>
            </div>
        </div>
        <div class="form-group"> {{--status perkawinnan --}}
            <label>Status Perkawinan</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="statuskawin" id="kawin" value="1" required>
                <label class="form-check-label" for="kawin">Kawin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="statuskawin" id="belumkawin" value="2">
                <label class="form-check-label" for="belumkawin">Belum Kawin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="statuskawin" id="cerai" value="3">
                <label class="form-check-label" for="cerai">Janda/Duda</label>
            </div>
        </div>
        <div class="form-group"> {{-- pekerjaan --}}
            <label>Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}"  autofocus placeholder="Nama lengkap ...">
        </div>
        
        <br><br>
        <button type="submit" class="btn btn-danger">Kirim</button>
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
                        console.log(data);
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