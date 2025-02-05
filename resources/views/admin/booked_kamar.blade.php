@include('components.admin-header')
<style>
    th {
        color: rgb(255, 255, 255);
    }
    .description-container {
        position: relative;
    }
    .description-summary {
        display: block;
    }
    .description-text {
        display: none;
        /* Sembunyikan teks lengkap secara default */
    }
    .read-more {
        display: block;
        color: rgb(205, 205, 216);
        cursor: pointer;
        text-decoration: underline;
    }
    .read-more.active {
        color: red;
    }
</style>
    @include('components.admin-navbar')
        @include('components.admin-sidebar')

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Room Id</th>
                                <th scope="col">Nama Booker</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Status Booking</th>
                                <th scope="col">Tanggal Booking</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d )
                            <tr>
                                <td>{{$d->room_id}}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->telepon }}</td>
                                <td>{{ $d->status }}</td>
                                <td><p>
                                    {{ $d->start_date }} sampai
                                    {{ $d->end_date }}
                                    </p>
                                </td>
                                <td>
                                    <a class="btn btn-outline-warning" href="{{ url('booking_update',$d->id) }}">Update</a>
                                    <a onclick="return confirm('Apakah Anda Ingin Menghapus Kamar?')" class="btn btn-outline-danger" href="{{ url('booking_delete',$d->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var readMoreLinks = document.querySelectorAll('.read-more');

        readMoreLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                var container = this.parentElement;
                var text = container.querySelector('.description-text');
                var summary = container.querySelector('.description-summary');

                if (text.style.display === 'none') {
                    text.style.display = 'block';
                    summary.style.display = 'none';
                    this.textContent = 'Read Less';
                } else {
                    text.style.display = 'none';
                    summary.style.display = 'block';
                    this.textContent = 'Read More';
                }
            });
        });
    });
</script>
@include('components.admin-footer')
