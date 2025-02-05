@include('components.admin-header')
<style>
    th {
        color: rgb(255, 255, 255);
    }
</style>
@include('components.admin-navbar')
@include('components.admin-sidebar')
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="block">
                    <div class="title"><strong>Update Booking Kamar</strong></div>
                    <div class="block-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-bs-dismiss="alert">x</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        @if ($errors)
                            @foreach ($errors->all() as $errors)
                                <li style="color: red;">
                                    {{ $errors }}
                                </li>
                            @endforeach
                        @endif
                        <form action="{{ url('edit_booking', $data->id) }}" method="Post" enctype="multipart/form-data"
                            class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Room ID</label>
                                <div class="col-sm-9">
                                    <input type="text" name="room_id" value="{{ $data->room_id }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Nama Booker</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" value="{{ $data->nama }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="exampleFormControlTextarea1" value="{{ $data->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">No Telepon</label>
                                <div class="col-sm-9">
                                    <input type="number" name="telepon" value="{{ $data->telepon }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Check In</label>
                                <div class="col-sm-9">
                                    <input type="date" name="startDate" value="{{ $data->start_date }}"
                                    class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Check Out</label>
                                <div class="col-sm-9">
                                    <input type="date" name="endDate" value="{{ $data->end_date }}"
                                    class="form-control">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="ml-auto col-sm-9">
                                    <button type="submit" class="btn btn-primary">Update Booking Kamar</button>
                                </div>
                            </div>
                        </form>
                    </div>
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

        @include('components.admin-footer')
