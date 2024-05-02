    <div class="modal fade" id="formAbsensiModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Tambah Absensi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="absensi">
                            @csrf
                            <div id="method"></div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputAbsensi">Nama Karyawan</label>
                                    <input type="text" class="form-control" id="nama_karyawan" value=""
                                        name="nama_karyawan">
                                    <label for="exampleInputAbsensi">Tanggal Masuk</label>
                                    <input type="date" class="form-control" id="tanggal_masuk" value=""
                                        name="tanggal_masuk">
                                    <label for="exampleInputAbsensi">Waktu Masuk</label>
                                    <input type="time" class="form-control" id="waktu_masuk" value=""
                                        name="waktu_masuk">
                                    <label for="exampleInputAbsensi" class="form-label">Pilih Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="masuk">Masuk</option>
                                        <option value="sakit">Sakit </option>
                                        <option value="cuti">Cuti</option>
                                    </select>

                                    <label for="exampleInputAbsensi">Waktu Selesai Kerja</label>
                                    <input type="time" class="form-control" id="waktu_selesai_kerja" value=""
                                        name="waktu_selesai_kerja">

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <div class="modal fade" id="formImport" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Import Data Absensi</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ url(request()->segment(1) . '/absensi_kerja/import') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="absensi">FIle Excel</label>
                                                            <input type="file" name="import" id="import">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            id="btn-submit">Upload</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    </div>
