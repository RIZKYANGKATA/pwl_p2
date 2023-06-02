@extends('layouts.template')

@section('content')
    <h2>Data Mahasiswa</h2>
    <button class="btn btn-sm btn-success my-2" onclick="tambahData()">Tambah Data</button>
    <table class="table table-bordered table-striped" id="data_mahasiswa">
        <thead>
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
    </table>

    <div class="modal fade" id="modal_mahasiswa" style="display: none;" aria-hidden="true">
        <form method="post" action="{{ url('mahasiswa') }}" role="form" class="form-horizontal" id="form_mahasiswa">
        @csrf
        <div class="modal-dialog modal-">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-message"></div>
                    <div class="form-group required row mb-2">
                        <label class="col-sm-2 control-label col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="nim" name="nim" value="" />
                        </div>
                    </div>
                    <div class="form-group required row mb-2">
                        <label class="col-sm-2 control-label col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="" />
                        </div>
                    </div>
                    <div class="form-group required row mb-2">
                        <label class="col-sm-2 control-label col-form-label">No. HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="hp" name="hp" value="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="modal fade" id="modal_show_mahasiswa" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Detail Mahasiswa</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group row">
                      <label class="col-sm-2 control-label">NIM</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="show_nim" readonly>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="show_nama" readonly>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 control-label">No. HP</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="show_hp" readonly>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
@endsection

@push('scripts')
<script>
    function tambahData() {
        $('#modal_mahasiswa').modal('show');
        $('#modal_mahasiswa .modal-title').html('Tambah Data Mahasiswa');
        $('#modal_mahasiswa #nim').val('');
        $('#modal_mahasiswa #nama').val('');
        $('#modal_mahasiswa #hp').val('');
    }

    function updateData(th){
        $('#modal_mahasiswa').modal('show');
        $('#modal_mahasiswa .modal-title').html('Edit Data Mahasiswa');
        $('#modal_mahasiswa #nim').val($(th).data('nim'));
        $('#modal_mahasiswa #nama').val($(th).data('nama'));
        $('#modal_mahasiswa #hp').val($(th).data('hp'));
        $('#modal_mahasiswa #form_mahasiswa').attr('action', $(th).data('url'));
        $('#modal_mahasiswa #form_mahasiswa').append('<input type="hidden" name="_method" value="PUT">');
    }

    function showData(element) {
        // $(element).attr('href');
        // console.log(element);
        // console.log($(element));
        $.ajax({
            url: '{{  url('mahasiswa') }}'+ '/' + element,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
            
            $('#modal_show_mahasiswa').modal('show');
            
            $('#show_nim').val(data.nim);
            $('#show_nama').val(data.nama);
            $('#show_hp').val(data.hp);
            },
            error: function() {
            alert('Error occurred while retrieving data.');
            }
        });
    }
    function deleteData(element) {
        if (!confirm("Anda Yakin Ingin Menghapus Data Ini?")) {
            return false;
        }
        // console.log("Melakukan anu");
        $.ajax({
            url: '{{  url('mahasiswa/delete') }}'+ '/' + element,
            method: 'POST',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
                alert(data.message);
                location.reload();
            },
            error: function() {
                alert('Error occurred while deleting data.');
            }
        });
    }

    $(document).ready(function (){
        var dataMahasiswa = $('#data_mahasiswa').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                'url': '{{  url('mahasiswa/data') }}',
                'dataType': 'json',
                'type': 'POST',
            },
            columns:[
                {data:'nomor', name:'nomor', searchable:false, sortable:false},
                {data:'nim',name:'nim', sortable: false, searchable: true},
                {data:'nama',name:'nama', sortable: false, searchable: true},
                {data:'hp',name:'hp', sortable: false, searchable: true},
                {data:'id',name:'id', sortable: false, searchable: false,
                render: function(data, type, row, meta) {
                    var btn = `<button data-url="{{ url('/mahasiswa')}}/`+data+`" class="btn btn-xs btn-warning" onclick="updateData(this)" data-id="`+row.id+`" data-nim="`+row.nim+`" data-nama="`+row.nama+`" data-hp="`+row.hp+`"><i class="fa fa-edit"></i></button>` +
                                  `<button href="{{ url('/mahasiswa/') }}/`+data+` " onclick="showData(`+data+`)" class="btn btn-xs btn-info"><i class="fa fa-list"></i></button>` +
                                  `<button class="btn btn-xs btn-danger" onclick="deleteData(`+data+`)"><i class="fa fa-trash"></i> </button>`;
                    return btn;
                }
                },

            ]
        });

        $('#form_mahasiswa').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                success:function(data){
                    $('.form-message').html('');
                    if(data.status){
                        $('.form-message').html('<span class="alert alert-success" style="width: 100%">' + data.message + '</span>');
                        $('#form_mahasiswa')[0].reset();
                        dataMahasiswa.ajax.reload();
                        $('#form_mahasiswa').attr('action', '{{ url('mahasiswa') }}');
                        $('#form_mahasiswa').find('input[name="_method"]').remove();
                    }else{
                        $('.form-message').html('<span class="alert alert-danger" style="width: 100%">' + data.message + '</span>');
                        alert('error');
                    }

                    if(data.modal_close){
                        $('.form-message').html('');
                        $('#modal_mahasiswa').modal('hide');
                    }

                }
            });
        });
    });
</script>
@endpush