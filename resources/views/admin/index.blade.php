@extends('admin.layout.master')

@section('title')
Admin-Home
@endsection

@section('content')


    <!-- Info boxes -->
    <div class = "row">
        <div class = "col-12">
            <div class = "card">
                <div class = "card-header">
                    <h3  class = "card-title">Daftar KTP</h3>
                    <a href = "admin/cetak_nik_pdf" class = "btn btn-info btn-sm">Print berdasarkan NIK</a>
                    <a href = "/admin/cetak_nama_pdf" class = "btn btn-info btn-sm">Print berdasarkan Nama</a>
                    <a href = "/admin/cetak_gender_pdf" class = "btn btn-info btn-sm">Print berdasarkan Jenis Kelamin</a>
                </div>
                <!-- /.card-header -->
                <div class = "card-body table-responsive p-0">
                    <table class = "table table-striped text-nowrap">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Kabupaten/Kota</th>
                                <th>Provinsi</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Status Perkawinan</th>
                                <th>Pekerjaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ktp as $k)
                                <tr>
                                    <td> {{ $k->nik }} </td>
                                    <td> {{ $k->nama }} </td>
                                    <td> {{ $k->alamat }} </td>
                                    <td> {{ $k->kota }} </td>
                                    <td> {{ $k->provinsi }} </td>
                                    <td> {{ $k->tempat_lahir }} </td>
                                    <td> {{ $k->tanggal_lahir }} </td>
                                    <td> {{ $k->gender }} </td>
                                    <td> {{ $k->agama }} </td>
                                    <td> {{ $k->status_perkawinan }} </td>
                                    <td> {{ $k->pekerjaan }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <!-- /.card-body -->
            </div>
          <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
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