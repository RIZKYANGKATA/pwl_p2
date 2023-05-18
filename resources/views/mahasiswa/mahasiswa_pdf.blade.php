<!DOCTYPE html>
<html>
<head>
    <title>Cetak Nilai</title>
</head>
<body>
        <style type="text/css">
            table tr td,
            table tr th{
                font-size: 9pt;
            }
        </style>
        <center>
            <h5>JURUSAN TEGNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG </h4>
              <P><h3>KARTU HASIL STUDI (KHS)</h3></P>
        </center>
        <div class="card">
            <div class="card-header">
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>NIM: </b> {{ $mahasiswa->nim }}</li>
                <li class="list-group-item"><b>Nama: </b> {{ $mahasiswa->nama }}</li>
                <li class="list-group-item"><b>Kelas: </b> {{ $mahasiswa->kelas->nama_kelas }}</li>
            </ul> 
              <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Jam</th>
                        <th>Semester</th>
                        <th>Nilai</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $i => $m)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$m->matakuliah->id}}</td>
                      <td>{{$m->matakuliah->nama_matkul}}</td>
                      <td>{{$m->matakuliah->sks}}</td>
                      <td>{{$m->matakuliah->jam}}</td>
                      <td>{{$m->matakuliah->semester}}</td>
                      <td>{{$m->nilai}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
</body>
</html>