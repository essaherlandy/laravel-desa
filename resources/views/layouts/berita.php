@if(count($beritas) > 0)
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Penguna</th>
                                                                <th>Gambar</th>
                                                                <th>Judul Berita</th>
                                                                <th>Isi Berita</th>
                                                                <th colspan="2">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no=1;?>
                                                            @foreach($beritas as $index => $berita)
                                                            <tr>
                                                                <td>{{$index + $beritas->firstItem()}}</td>
                                                                <td>{{$berita->users->name}}</td>
                                                                <td><img src="{{$berita->gambar}}" style="width:150px;heitgh:150px;"></td>
                                                                <td>{{$berita->judul_berita}}</td>
                                                                <td>{!!$berita->isi_berita!!}</td>
                                                                <td>
                                                                    <a href="{{route('dashboard.admin.edit-berita',$berita->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                                                    <a type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusPengguna{{$berita->id}}"><i class="fa fa-trash"></i></a>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="hapusPengguna{{$berita->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-body">
                                                                                    <form action="{{route('dashboard.admin.berita-delete',$berita->id)}}" method="get" enctype="multipart/form-data">
                                                                                        {{csrf_field()}}
                                                                                        <h4 class="text-center"><b>Apakah Anda Yakin Ingin Menghapus Data dengan nama <br>{{$berita->name}}??</b></h4>
                                                                                    </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>  Ya, Lanjutkan</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <a>Total Keseluruhan: <b>{{ $beritas->total() }}</b></a>
                                                    {{$beritas->appends(request()->query())->links()}}
                                                </div>
                                            </div>
                                            @else
                                            <br>
                                            <div class="alert alert-warning alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h3 class="text-center"><i class="fa fa-warning"></i> Tidak Ada Data</h3>
                                            </div>
                                            @endif