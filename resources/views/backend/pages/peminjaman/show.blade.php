<table class="table-bordered">
    <tr>
        <th>NIS</th>
        <td>{{ $item->no_siswa }}</td>
    </tr>
    <tr>
        <th>nama</th>
        <td>{{ $item->nama }}</td>
    </tr>
    <tr>
        <th>tanggal pinjam</th>
        <td>{{ $item->tanggal_pinjam }}</td>
    </tr>
    <tr>
        <th>tanggal pengembalian</th>
        <td>{{ $item->tanggal_pengembalian }}</td>
    </tr>
    <tr>
        <th>Peminjaman Buku</th>
        <td>
            <table class="table tabel-bordered w-100">
                <tr>
                    <th>Buku</th>
                    <th>Jumlah</th>
                </tr>
                @foreach ($item->details as $detail)
                    <tr>
                        <td>{{ $detail->book->judul }}</td>
                        <td>{{ $detail->jumlah_buku }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>

<div class="row">
    <div class="col-4">
        <a href="{{ route('peminjaman.status', $item->id) }}?status=ONGOING" class="btn btn-primary btn-block">
            <i class="fa fa-book-reader"></i>Set Ongoing
        </a>
    </div>

    <div class="col-4">
        <a href="{{ route('peminjaman.status', $item->id) }}?status=RECEIVED" class="btn btn-success btn-block">
            <i class="fa fa-check-circle"></i>Set Received
        </a>
    </div>

    <div class="col-4">
        <a href="{{ route('peminjaman.status', $item->id) }}?status=LATE" class="btn btn-danger btn-block">
            <i class="fa fa-calendar-times"></i>Set Telat
        </a>
    </div>

    <div class="col-4">
        <a href="{{ route('peminjaman.status', $item->id) }}?status=PROCESS" class="btn btn-secondary btn-block">
            <i class="fa fa-spinner"></i>Set Process
        </a>
    </div>
</div>
