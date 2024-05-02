@extends('templates.main')
@push('style')
@endpush
@section('content')
    Stok
@endsection
<!-- Main Content -->
@section('container')
    <section class="content">
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


                @include('stok.form')

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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModalStok">
                    <i class="fas fa-plus"></i> Add Stok
                </button>
                <a href="{{ route('export-stok') }}" class="btn btn-success">
                    <i class="fa fa-file-excel"></i>Export
                </a>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formInputModal">
                    <i class="fas fa-file-excel"></i>Import
                </button>
            </div>
            @include('stok.formInput')
            @include('stok.data')

    </section>

@endsection

<!-- End Content -->
@push('script')
    <script>
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


        $('#formModalStok').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const menu_id = btn.data('menu_id')
            const jumlah = btn.data('jumlah')
            const id = btn.data('id')
            const modal = $(this)
            if (mode == 'edit') {
                modal.find('#method').html('@method(' PATCH ')')
                modal.find('.modal-title').text('Edit Data stok')
                modal.find('#menu_id').val(menu_id)
                modal.find('#jumlah').val(jumlah)
                modal.find('.modal-body form').attr('action',
                    '{{ url('stok') }}/' + id)
            } else {
                modal.find('.modal-title').text('Input Data stok')
                modal.find('#menu_id').val('')
                modal.find('#jumlah').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action',
                    '{{ url('stok') }}')
            }
        })
    </script>
@endpush
