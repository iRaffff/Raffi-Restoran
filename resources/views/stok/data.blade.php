<table class="table table-compact table-stripped" id="data-stok">
    <thead class="text-center">
        <tr>
            <th>No</th>
            <th>Nama Jenis</th>
            <th>Jumlah</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <tbody class="text-center">
        @foreach ($stok as $s)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $s->menu->nama_menu }}</td>
                <td>{{ $s->jumlah }}</td>
                <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#formModalStok" data-mode="edit"
                        data-id="{{ $s->id }}" data-menu="{{ $s->nama_menu }}" data-menu_id="{{ $s->menu_id }}"
                        data-jumlah="{{ $s->jumlah }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="stok/{{ $s->id }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data" data-stok="{{ $s->stok }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
