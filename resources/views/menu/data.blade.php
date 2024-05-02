                <table class="table table-compact table-stripped" id="data-menu">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Jenis Id</th>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Image</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu as $m)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $m->jenis->nama_jenis }}</td>
                                <td>{{ $m->nama_menu }}</td>
                                <td>{{ $m->harga }}</td>
                                <td><img width="100px" src="{{ asset('storage/menu-image/' . $m->image) }}"
                                        alt="">
                                </td>
                                <td>{{ $m->deskripsi }}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#formMenuModal"
                                        data-mode="edit" data-id="{{ $m->id }}"
                                        data-jenis_id="{{ $m->jenis_id }}" data-nama_menu="{{ $m->nama_menu }}"
                                        data-harga="{{ $m->harga }}" data-deskripsi="{{ $m->deskripsi }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form method="post" action="menu/{{ $m->id }}" style="display: inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" title="Delete" class="btn btn-danger delete-data">
                                            <i class="fas fa-trash danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
