@extends('templates.main')

@push('style')
@endpush

@section('content')
    Menu
@endsection

@section('container')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@yield('content')</h3>

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
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formMenuModal">
                    <i class="fas fa-plus"></i> Add Menu
                </button>
                <a href="{{ route('export-menu') }}" class="btn btn-success">
                    <i class="fa fa-file-excel"></i>Export
                </a>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formInputModal">
                    <i class="fas fa-file-excel"></i>Import
                </button>
                <!--Modal -->
                @include('menu.form')
                @include('menu.formInput')
                <!-- /.card-body -->

                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            @include('menu.data')
    </section>
@endsection

@push('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = pFREvent.target.result;
            }
        }
        $('.alert-success').fadeTo(5000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(10000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })


        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            const data = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `apakah data <span style="color:red">${data}</span> akan dihapus?`,
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus data ini!'
            }).then((result) => {
                if (result.isConfirmed)
                    $(e.target).closest('form').submit()
                else swal.close()
            })
        })

        $('#formMenuModal').on('show.bs.modal', function(e) {
            console.log('form');
            const btn = $(e.relatedTarget);
            const mode = btn.data('mode');
            console.log(mode)
            const nama_menu = btn.data('nama_menu');
            const jenis_id = btn.data('jenis_id');
            const harga = btn.data('harga');
            const image = btn.data('image');
            const deskripsi = btn.data('deskripsi');
            const id = btn.data('id');
            const modal = $(this);
            if (mode === 'edit') {
                console.log(id);
                modal.find('.modal-title').text('Edit Data Menu');
                modal.find('#nama_menu').val(nama_menu);
                modal.find('#harga').val(harga);
                modal.find('#jenis_id').val(jenis_id).change();
                // modal.find('#image').val(image);
                modal.find('#deskripsi').val(deskripsi);
                modal.find('.modal-body form').attr('action', '{{ url('menu') }}/' + id);
                modal.find('#method').html('@method('PATCH')');

            } else {
                modal.find('#nama_menu').val('');
                modal.find('#harga').val('');
                modal.find('#jenis_id').val('');
                // modal.find('#image').val('');
                modal.find('#deskripsi').val('');
                modal.find('#method').html('');
                modal.find('.modal-body form').attr('action', '{{ url('menu') }}');
                modal.find('.modal-title').text('Input Data Menu');
            }
        });
    </script>
@endpush
