<table class="table table-compact table-stripped" id="data-meja">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Nomor Meja</th>
            <th>Kapasitas</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($meja as $m)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $m->nomor_meja }}</td>
                <td>{{ $m->kapasitas }}</td>
                <td>{{ $m->status }}</td>

                <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#formMejaModal" data-mode="edit"
                        data-id="{{ $m->id }}" data-nomor_meja="{{ $m->nomor_meja }}"
                        data-kapasitas="{{ $m->kapasitas }}" data-status="{{ $m->status }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="meja/{{ $m->id }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data"
                            data-nomor_meja="{{ $m->nomor_meja }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
