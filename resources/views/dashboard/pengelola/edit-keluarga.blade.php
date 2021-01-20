@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
@endsection


@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h5>Edit Data Keluarga</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li class="first-opt"><i
                                                class="feather icon-chevron-left open-card-option"></i>
                                        </li>
                                        <li><i class="feather icon-maximize full-card"></i></li>
                                        <li><i class="feather icon-minus minimize-card"></i>
                                        </li>
                                        <li><i class="feather icon-refresh-cw reload-card"></i>
                                        </li>
                                        <li><i class="feather icon-trash close-card"></i></li>
                                        <li><i
                                                class="feather icon-chevron-left open-card-option"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block p-b-0">
                                <div class="container">
                                    <div class="table-responsive">
                                        <form action="{{route('dashboard.pengelola.update-keluarga',$penduduk->id)}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="alert alert-primary">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled"></i>
                                                </button>
                                                <strong>DATA KELUARGA</strong>
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Kartu Keluarga</label>
                                                <input name="no_kk" type="text" class="form-control" placeholder="Masukan nama user"
                                                    value="{{ $keluarga->no_kk }}">
                                                @if($errors->first('no_kk'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('no_kk') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input name="alamat_jalan" type="text" class="form-control" placeholder="Masukan nama user"
                                                    value="{{ $keluarga->alamat_jalan }}">
                                                @if($errors->first('alamat_jalan'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('alamat_jalan') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label for="">Dusun</label>
                                                    <select id="id_dusun" name="id_dusun" class="form-control">
                                                        <option value="" selected disabled>Select</option>
                                                        @foreach($dusun as $key => $dusuns)
                                                        <option value="{{$key}}"> {{$dusuns}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->first('id_dusun'))
                                                        <span class="text-danger font-size-14">{{ $errors->first('id_dusun') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-4">
                                                <label for="">RW</label>
                                                <select name="id_rw" id="id_rw" class="form-control"></select>
                                                @if($errors->first('id_rw'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('id_rw') }}</span>
                                                @endif
                                                </div>
                                                <div class="col">
                                                <label for="">RT</label>
                                                    <select name="id_rt" id="id_rt" class="form-control"></select>
                                                    @if($errors->first('id_rt'))
                                                        <span class="text-danger font-size-14">{{ $errors->first('id_rt') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Kelas Sosial</label>
                                                <select name="id_kelas_sosial" class="form-control fill">
                                                    <option value="0">--PILIH KELAS SOSIAL--</option>
                                                    @foreach($kelasSosial as $sosial)
                                                        <option value="{{$sosial->id}}" <?=($sosial->id == $keluarga->id_kelas_sosial ? 'selected' : null)?>>{{$sosial->deskripsi}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->first('id_kelas_sosial'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('id_kelas_sosial') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label for="">Menerima PKH</label>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="gridRadios2">
                                                            <input class="form-check-input" type="radio" name="is_pkh" id="gridRadios2" value="Y" {{ $keluarga->is_pkh == 'Y' ? 'checked' : '' }}>
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="gridRadios1">
                                                            <input class="form-check-input" type="radio" name="is_pkh" id="gridRadios1" value="N" {{ $keluarga->is_pkh == 'N' ? 'checked' : '' }}>
                                                            Tidak
                                                        </label>
                                                    </div>
                                                    @if($errors->first('is_pkh'))
                                                        <span class="text-danger font-size-14">{{ $errors->first('is_pkh') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-4">
                                                <label for="">Raskin</label>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="raskin1">
                                                            <input class="form-check-input" type="radio" name="is_raskin" id="raskin1" value="Y" {{ $keluarga->is_raskin == 'Y' ? 'checked' : '' }}>
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="raskin2">
                                                            <input class="form-check-input" type="radio" name="is_raskin" id="raskin2" value="N" {{ $keluarga->is_raskin == 'N' ? 'checked' : '' }}>
                                                            Tidak
                                                        </label>
                                                    </div>
                                                    @if($errors->first('is_raskin'))
                                                        <span class="text-danger font-size-14">{{ $errors->first('is_raskin') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    <label for="">Jamkesmas</label>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="Jamkesmas1">
                                                            <input class="form-check-input" type="radio" name="is_jamkesmas" id="Jamkesmas1" value="Y" {{ $keluarga->is_jamkesmas == 'Y' ? 'checked' : '' }}>
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="Jamkesmas2">
                                                            <input class="form-check-input" type="radio" name="is_jamkesmas" id="Jamkesmas2" value="N" {{ $keluarga->is_jamkesmas == 'N' ? 'checked' : '' }}>
                                                            Tidak
                                                        </label>
                                                    </div>
                                                    @if($errors->first('is_jamkesmas'))
                                                        <span class="text-danger font-size-14">{{ $errors->first('is_jamkesmas') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="alert alert-primary">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled"></i>
                                                </button>
                                                <strong>Data Kepala Keluarga</strong>
                                            </div>
                                            <div class="form-group">
                                                <label>Status Penduduk Sementara</label>
                                                <div class="form-check">
                                                    <label class="form-check-label" for="Status1">
                                                        <input class="form-check-input" type="radio" name="is_sementara" id="Status1" value="Y" {{ $keluarga->is_sementara == 'Y' ? 'checked' : '' }}>
                                                        Ya
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label" for="Status2">
                                                        <input class="form-check-input" type="radio" name="is_sementara" id="Status2" value="N" {{ $keluarga->is_sementara == 'N' ? 'checked' : '' }}>
                                                        Tidak
                                                    </label>
                                                </div>
                                                @if($errors->first('is_sementara'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('is_sementara') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>NIK*</label>
                                                <input name="nik" type="text" class="form-control" placeholder="Masukan Nomor KTP"
                                                    value="{{ $penduduk->nik }}">
                                                @if($errors->first('nik'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('nik') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input name="nama" type="text" class="form-control" placeholder="Masukan Nama"
                                                    value="{{ $penduduk->nama }}">
                                                @if($errors->first('nama'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('nama') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input name="tempat_lahir" type="text" class="form-control" placeholder="Masukan Tempat"
                                                    value="{{ $penduduk->tempat_lahir }}">
                                                @if($errors->first('tempat_lahir'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('tempat_lahir') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="tgl_hpl">Tanggal Lahir</label>  
                                                <div class="input-group mb-2 col-md-6">
                                                    <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-table"></i></div>
                                                    </div>
                                                    <input name="tgl_lahir" type="text" class="datepicker form-control" value="{{ $penduduk->tgl_lahir }}" autocomplete="off">
                                                    @if($errors->first('tgl_lahir'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('tgl_lahir') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6" for="id_jen_kel">Jenis Kelamin</label>
                                                <div class="col-md-6">
                                                    <ul class="kelamin">
                                                    <li>
                                                        <input name="id_jenis_kelamin" class="id_jen_kel" type="radio" id="laki" value="1" {{ $penduduk->id_jenis_kelamin == '1' ? 'checked' : '' }}> Laki Laki      
                                                        </li>       
                                                        <li>
                                                            <input name="id_jenis_kelamin" class="id_jen_kel" type="radio" id="perempuan" value="2" {{ $penduduk->id_jenis_kelamin == '2' ? 'checked' : '' }}> Perempuan
                                                            <ul id="list-perempuan" style="display: none;">
                                                            <br>
                                                                <li>
                                                                    <input type="radio" name="hamil" class="tidakHamil" id="tidakHamil" checked="true" value="N">Tidak Hamil<br>			
                                                                </li>
                                                                <li>
                                                                    <input type="radio" name="hamil" class="sedangHamil" id="sedangHamil" value="Y">Sedang Hamil<br>						
                                                                    <ul id="list-sedangHamil" style="">
                                                                    <br>
                                                                        <li>
                                                                            <input type="radio" name="is_resti" checked="true" value="N">Normal<br>
                                                                            <input type="radio" name="is_resti" value="Y">Resiko Tinggi<br>									
                                                                            <!-- Text input-->
                                                                            <div class="form-group">
                                                                            <label class="control-label" for="keterangan">Keterangan</label>  
                                                                            <div>
                                                                            <input id="keterangan" name="keterangan" type="text" placeholder="Keterangan" class="form-control input-md">
                                                                            <span class="help-block"></span>  
                                                                            </div>
                                                                            </div>
                                                                            <!-- Text input-->
                                                                            <div class="form-group">
                                                                            <label class="control-label" for="tgl_hpl">Tanggal Perkiraan Lahir</label>  
                                                                                <div class="input-group mb-2 col-md-6">
                                                                                    <div class="input-group-prepend">
                                                                                    <div class="input-group-text"><i class="fa fa-table"></i></div>
                                                                                    </div>
                                                                                    <input name="tanggal_lahir" type="text" class="datepicker form-control">
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </li><li>
                                                            </li></ul>	
                                                        </li> 
                                                    </ul>
                                                </div>
                                                @if($errors->first('id_jenis_kelamin'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('id_jenis_kelamin') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Telepon</label>
                                                <input name="no_telp" type="text" class="form-control" placeholder="Masukan nama user"
                                                    value="{{ $penduduk->no_telp }}">
                                                @if($errors->first('no_telp'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('no_telp') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" type="email" class="form-control" placeholder="Masukan nama user"
                                                    value="{{ $penduduk->email }}">
                                                @if($errors->first('email'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>No KITAS</label>
                                                <input name="no_kitas" type="text" class="form-control" placeholder="Masukan nama user"
                                                    value="{{ $penduduk->no_kitas }}">
                                            </div>
                                            <div class="form-group">
                                                <label>No Paspor</label>
                                                <input name="no_paspor" type="text" class="form-control" placeholder="Masukan nama user"
                                                    value="{{ $penduduk->no_paspor }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <select name="id_agama" id="id_agama" class="form-control input-md">
                                                    <option value="" selected="selected">--Pilih--</option>
                                                    @foreach($agama as $agamas)
                                                        <option value="{{$agamas->id}}" <?=($agamas->id == $penduduk->id_agama ? 'selected' : null)?>>{{$agamas->deskripsi}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->first('id_agama'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('id_agama') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
    	                                        <label>Golongan Darah </label>
                                                <select name="id_goldar" id="id_goldar" class="form-control input-md">
                                                    <option value="" selected="selected">--Pilih--</option>
                                                    @foreach($golonganDarah as $goldar)
                                                        <option value="{{$goldar->id}}" <?=($goldar->id == $penduduk->id_goldar ? 'selected' : null)?>>{{$goldar->deskripsi}}</option>
                                                    @endforeach
                                                </select>   
                                                @if($errors->first('id_goldar'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('id_goldar') }}</span>
                                                @endif   
                                            </div>
                                            <div class="form-group">
    	                                        <label>Pendidikan</label>
                                                <select name="id_pendidikan" id="id_goldar" class="form-control input-md">
                                                    <option value="" selected="selected">--Pilih--</option>
                                                    @foreach($pendidikans as $pendidikan)
                                                        <option value="{{$pendidikan->id}}" <?=($pendidikan->id == $penduduk->id_pendidikan ? 'selected' : null)?>>{{$pendidikan->deskripsi}}</option>
                                                    @endforeach
                                                </select>     
                                                @if($errors->first('id_pendidikan'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('id_pendidikan') }}</span>
                                                @endif  
                                            </div>
                                            <div class="form-group">
    	                                        <label>Pendidikan Terakhir</label>
                                                <select name="id_pendidikan_terakhir" id="id_goldar" class="form-control input-md">
                                                    <option value="" selected="selected">--Pilih--</option>
                                                    @foreach($pendidikans as $terakhir)
                                                        <option value="{{$terakhir->id}}" <?=($terakhir->id == $penduduk->id_pendidikan_terakhir ? 'selected' : null)?>>{{$terakhir->deskripsi}}</option>
                                                    @endforeach
                                                </select>    
                                                @if($errors->first('id_pendidikan_terakhir'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('id_pendidikan_terakhir') }}</span>
                                                @endif     
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label>Pekerjaan</label>
                                                    <select name="id_pekerjaan" id="id_goldar" class="form-control input-md">
                                                        <option value="" selected="selected">--Pilih--</option>
                                                        @foreach($pekerjaans as $pekerjaan)
                                                        <option value="{{$pekerjaan->id}}" <?=($pekerjaan->id == $penduduk->id_pekerjaan ? 'selected' : null)?>>{{$pekerjaan->deskripsi}}</option>
                                                        @endforeach
                                                    </select>  
                                                    @if($errors->first('id_pekerjaan'))
                                                        <span class="text-danger font-size-14">{{ $errors->first('id_pekerjaan') }}</span>
                                                    @endif  
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="">Potensi Ekonomi Desa</label>
                                                    <select name="id_pekerjaan_penduduk" id="" class="form-control input-md">
                                                        <option value="" selected="selected">--Pilih--</option>
                                                        @foreach($pekerjaanPends as $penduduks)
                                                        <option value="{{$penduduks->id}}" <?=($penduduks->id == $penduduk->id_pekerjaan_penduduk ? 'selected' : null)?>>{{$penduduks->deskripsi}}</option>
                                                        @endforeach
                                                    </select>  
                                                    @if($errors->first('id_pekerjaan_penduduk'))
                                                        <span class="text-danger font-size-14">{{ $errors->first('id_pekerjaan_penduduk') }}</span>
                                                    @endif  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Kewarganegaraan</label>
                                                <select name="id_kewarganegaraan" class="form-control">
                                                    <option value="0" selected="selected">--Pilih--</option>
                                                    @foreach($kewarganegaraan as $kewarganegara)
                                                    <option value="{{$kewarganegara->id}}" <?=($kewarganegara->id == $penduduk->id_kewarganegaraan ? 'selected' : null)?>>{{$kewarganegara->deskripsi}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->first('id_kewarganegaraan'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('id_kewarganegaraan') }}</span>
                                                @endif 
                                            </div>
                                            <div class="form-group">
                                                <label>Kompetensi</label>
                                                <select name="id_kompetensi" id="id_agama" class="form-control input-md">
                                                    <option value="" selected="selected">--Pilih--</option>
                                                    @foreach($kompetensi as $kompeten)
                                                    <option value="{{$kompeten->id}}" <?=($kompeten->id == $penduduk->id_kompetensi ? 'selected' : null)?>>{{$kompeten->deskripsi}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->first('id_kompetensi'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('id_kompetensi') }}</span>
                                                @endif 
                                            </div>
                                            <div class="form-group">
                                                <label>Status Kawin</label>
                                                <select name="id_status_kawin" id="id_agama" class="form-control input-md">
                                                    <option value="" selected="selected">--Pilih--</option>
                                                    @foreach($statusKawins as $statusKawin)
                                                    <option value="{{$statusKawin->id}}" <?=($statusKawin->id == $penduduk->id_status_kawin ? 'selected' : null)?>>{{$statusKawin->deskripsi}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->first('id_status_kawin'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('id_status_kawin') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Status Penduduk</label>
                                                <select name="id_status_penduduk" id="id_agama" class="form-control input-md">
                                                    <option value="" selected="selected">--Pilih--</option>
                                                    @foreach($statusPenduduks as $statusPenduduk)
                                                    <option value="{{$statusPenduduk->id}}" <?=($statusPenduduk->id == $penduduk->id_status_penduduk ? 'selected' : null)?>>{{$statusPenduduk->deskripsi}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->first('id_status_penduduk'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('id_status_penduduk') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Status Tinggal</label>
                                                <select name="id_status_tinggal" id="id_agama" class="form-control input-md">
                                                    <option value="" selected="selected">--Pilih--</option>
                                                    @foreach($statusTinggals as $statusTinggal)
                                                    <option value="{{$statusTinggal->id}}" <?=($statusTinggal->id == $penduduk->id_status_tinggal ? 'selected' : null)?>>{{$statusTinggal->deskripsi}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->first('id_status_tinggal'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('id_status_tinggal') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label>Difabilitas</label>
                                                    <select name="id_difabilitas" id="id_goldar" class="form-control input-md">
                                                        <option value="" selected="selected">--Pilih--</option>
                                                        @foreach($difabilitas as $difabi)
                                                        <option value="{{$difabi->id}}" <?=($difabi->id == $penduduk->id_difabilitas ? 'selected' : null)?>>{{$difabi->deskripsi}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->first('id_difabilitas'))
                                                        <span class="text-danger font-size-14">{{ $errors->first('id_difabilitas') }}</span>
                                                    @endif  
                                                </div>
                                                <div class="col-sm-6">
                                                <label for="">Kontrasepsi</label>
                                                    <select name="id_kontrasepsi" id="id_goldar" class="form-control input-md">
                                                        <option value="" selected="selected">--Pilih--</option>
                                                        @foreach($kontrasepsi as $kontra)
                                                        <option value="{{$kontra->id}}" <?=($kontra->id == $penduduk->id_kontrasepsi ? 'selected' : null)?>>{{$kontra->deskripsi}}</option>
                                                        @endforeach
                                                    </select>  
                                                    @if($errors->first('id_kontrasepsi'))
                                                        <span class="text-danger font-size-14">{{ $errors->first('id_kontrasepsi') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-3">Foto</label><br>
                                                <img src="{{$penduduk->foto}}" style="border: 1px solid #aaa; width:150px; height:150px;" class="mb-3">
                                                <input name="foto" type="file" class="form-control" required>
                                            </div>
                                            <div class="alert alert-primary">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled"></i>
                                                </button>
                                                <strong>Hubungan Keluarga</strong>
                                            </div>
                                            <div class="form-group">
                                                <label>Statu Keluarga</label>
                                                <input type="text" class="form-control" placeholder="Masukan nama user"
                                                    value="{{ $statusKeluarga->deskripsi }}" readonly>
                                            </div>
                                            <input name="id_status_keluarga" type="hidden" class="form-control" value="{{ $statusKeluarga->id }}" readonly>
                                            <div class="form-group">
                                                <label>Nama Ayah</label>
                                                <input name="nama_ayah" type="text" class="form-control" placeholder="Masukan nama user"
                                                    value="{{ $hubunganKeluarga->nama_ayah }}">
                                                @if($errors->first('nama_ayah'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('nama_ayah') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Ibu</label>
                                                <input name="nama_ibu" type="text" class="form-control" placeholder="Masukan nama user"
                                                    value="{{ $hubunganKeluarga->nama_ibu }}">
                                                @if($errors->first('nama_ibu'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('nama_ibu') }}</span>
                                                @endif
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{route('dashboard.pengelola.data-keluarga')}}" type="submit" class="btn btn-warning btn-sm text-white">Batal</a>
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js">
</script>

<script>
    $(".id_jen_kel").click(function(){
    var ul = $(this).next(); // Get the UL
    ul.slideDown(200); // Slide down the list
    $("[id^=list-]").not(ul).slideUp(200); // Slide up the other list
});
$(".sedangHamil").click(function(){
   var ul = $(this).next(); // Get the UL
    ul.slideUp(200); // Slide down the list
    $("[id^=list-]").not(ul).slideDown(200); // Slide up the other list
});
$(".tidakHamil").click(function(){
   var ul = $(this).next(); // Get the UL
    //ul.slideUp(200); // Slide down the list
   $("[id^=list-]").not(ul).slideUp(200); // Slide up the other list
});
</script>
<script>
    $(document).ready(function(){
        $('#pekerjaan').select2();
    });

  $('#id_dusun').change(function(){
  var dusunID = $(this).val();  
  if(dusunID){
    $.ajax({
      type:"GET",
      url:"{{url('get-rw-list')}}?id_dusun="+dusunID,
      success:function(res){        
      if(res){
        $("#id_rw").empty();
        $("#id_rw").append('<option>Select</option>');
        $.each(res,function(key,value){
          $("#id_rw").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#id_rw").empty();
      }
      }
    });
  }else{
    $("#id_rw").empty();
    $("#id_rt").empty();
  }   
  });
  $('#id_rw').on('change',function(){
  var rwID = $(this).val();  
  if(rwID){
    $.ajax({
      type:"GET",
      url:"{{url('get-rt-list')}}?id_rw="+rwID,
      success:function(res){        
      if(res){
        $("#id_rt").empty();
        $.each(res,function(key,value){
          $("#id_rt").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#id_rt").empty();
      }
      }
    });
  }else{
    $("#id_rt").empty();
  }
    
  });
</script>
<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
 $(function(){
  $(".datepicker2").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
@endsection 