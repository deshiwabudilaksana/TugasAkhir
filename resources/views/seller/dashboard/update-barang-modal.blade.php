{{-- {{dd($barang->detail_kategori_kado->first())}} --}}
<div class="modal fade" id="update_modal{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="nm_barang" aria-describedby="emailHelp" placeholder="Nama Produk"
                        required value="{{$barang->nama_kado}}">
                </div>

                <div class="form-group">

                    <textarea class="form-control" id="deskripsi_barang" rows="3" placeholder="Deskripsi" required>{{$barang->deskripsi}}</textarea>
                </div>

                <div class="form-group">
                    <input type="number" class="form-control" id="harga_barang" required placeholder="harga" value="{{$barang->harga_kado}}">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="jumlah_barang" required placeholder="Stok Produk"
                        value="{{$barang->stok}}">
                </div>

                <div class="form-group">
                    <h6>Kategori Barang</h6>
                    <div class="d-block">
                        @foreach ($kategoris as $kategori)
                            @foreach ($barang->detail_kategori_kado as $selected_category)
                                {{-- {{dd($selected_category->id_kategori)}} --}}

                            @if ($kategori->id == $selected_category->id_kategori)
                            <input class="form-check-input" type="checkbox" value="{{$kategori->id}}" id="kategori{{$loop->index}}"
                                name="kategori_kado" checked>
                            <label class="form-check-label" for="kategori{{$loop->index}}">
                                {{$kategori->nama_kategori}}
                            </label>

                            @break
                            @else
                                <input class="form-check-input" type="checkbox" value="{{$kategori->id}}" id="kategori{{$loop->index}}"
                                    name="kategori_kado">
                                <label class="form-check-label" for="kategori{{$loop->index}}">
                                    {{$kategori->nama_kategori}}
                                </label>

                            @endif
                            @endforeach

                        <div class="form-check">
                            {{-- @if ()

                            @else

                            @endif --}}

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>