<x-header />
<x-navbar />

<div class="our_room">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Our Room</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div id="serv_hover" class="room">
                    <div class="room_img" style="padding: 20px;">
                        <figure><img style="height: 300px; width: 800px; object-fit: cover"
                                src="{{ url('room/' . $room->gambar) }}" alt="Gambar_kamar" /></figure>
                    </div>
                    <div class="bed_room">
                        <h3>{{ $room->nama_kamar }}</h3>
                        <p style="padding: 12px;">{{ Str::limit($room->deskripsi, 75) }}</p>
                        <h4 style="padding: 12px;">Free WiFi : {{ Str::limit($room->wifi) }}</h4>
                        <h4 style="padding: 12px;">Tipe Kamar : {{ Str::limit($room->type_kamar) }}</h4>
                        <h3 style="padding: 12px;">Harga Kamar : {{ Str::limit($room->harga) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h1 style="font-size: 40px"> Booking Kamar </h1>

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif

                @if ($errors)
                    @foreach ($errors->all() as $errors)
                        <li style="color: red;">
                            {{$errors}}
                        </li>
                    @endforeach
                @endif

                <form action="{{ url('add_booking', $room->id) }}" method="Post">
                    @csrf
                    <div class="mb-3">
                        <label>Nama lengkap</label>
                        <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Nama"
                            @if (Auth::id()) value="{{ Auth::user()->name }}" @endif>
                    </div>
                    <div class="mb-3">
                        <label for="floatingInput">Email</label>
                        <input type="email" name="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="floatingInput">No Telpon</label>
                        <input type="number" name="telepon" class="form-control" id="floatingInput"
                            placeholder="Masukan No Telp">
                    </div>
                    <div>
                        <label for="floatingInput">Chek In</label>
                        <input type="date" name="startDate" class="form-control" id="startDate">
                    </div>
                    <div>
                        <label for="floatingInput">Chek Out</label>
                        <input type="date" name="endDate" class="form-control" id="endDate">
                    </div>
                    <div style="width: 200px; padding: 20px;">
                        <input type="submit" class="btn btn-primary" value="Booking Kamar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        40
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $('#startDate').attr('min', maxDate);
        $('#endDate').attr('min', maxDate);
    });
</script>

<x-footer />
