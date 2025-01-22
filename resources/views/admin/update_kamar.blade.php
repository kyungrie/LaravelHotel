@include('components.admin-header')
    @include('components.admin-navbar')
        @include('components.admin-sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Update Kamar</strong></div>
                        <div class="block-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                        {{session('success')}}
                                </div>
                            @endif
                            <form action="{{ url('edit_kamar',$data->id) }}" method="Post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Nama Kamar</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="kamar" value="{{ $data->nama_kamar }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="desk" id="exampleFormControlTextarea1" rows="3">{{ $data->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">harga</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="harga" value="{{ $data->harga }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Tipe Kamar</label>
                                    <div class="col-sm-9">
                                        <select name="type" class="mb-3 form-control">
                                            <option selected value="{{ $data->type_kamar }}">{{ $data->type_kamar }}</option>
                                            <option value="regular">Regular</option>
                                            <option value="premium">Premium</option>
                                            <option value="deluxe">Deluxe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Free Wifi</label>
                                    <div class="col-sm-9">
                                        <select name="wifi" class="mb-3 form-control">
                                            <option selected value="{{ $data->wifi }}">{{ $data->wifi }}</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Gambar Sebelumnya</label>
                                    <div class="col-sm-9">
                                        <img width="100" src="/room/{{ $data->gambar }}" alt="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Uploud Gambar</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="gambar" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="ml-auto col-sm-9">
                                        <button type="submit" class="btn btn-primary">Update Kamar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('components.admin-footer')
