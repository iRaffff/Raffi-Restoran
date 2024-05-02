<div class="modal fade" id="formModalStok">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Tambah Stok</h4>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <form class="form" action="stok" method="post" data-parsley-validate>
                        @csrf
                        <div id="method"></div>
                        <div class="card-body">
                            <div class="col-6">
                                <div class="form-group mandatory">
                                    <label for="menu_id" class="form-label">Pilih Menu</label>
                                    <select class="form-select" name="menu_id" id="menu_id">
                                        <option value="" selected disabled>- Pilih Nama Menu -
                                        </option>
                                        @foreach ($menu as $m)
                                            <option value="{{ $m->id }}">
                                                {{ $m->nama_menu }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mandatory">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" name="jumlah" id="jumlah" class="form-control"
                                        placeholder="Jumlah Stok" data-parsley-required="true" />
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
