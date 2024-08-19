<div>
    <h2>Detail Data Pengaju</h2>
    <p>Nama Pemohon: {{ $record->applicant }}</p>
    <p>Instansi: {{ $record->instansi }}</p>
    <p>Email: {{ $record->email }}</p>
    <p>Nomor Telepon: {{ $record->phone }}</p>

    <h2>Data Layanan</h2>
    <p>Layanan: {{ $record->service->name }}</p>

    <!-- Custom view sesuai dengan layanan yang dipilih -->
    @if($record->service_id == 3)
        <!-- Custom content for service 3 -->
    @elseif($record->service_id == 1)
        <!-- Custom content for service 1 -->
    @elseif($record->service_id == 2)
        <!-- Custom content for service 2 -->
    @elseif($record->service_id == 4)
        <p>Tujuan: {{ $record->reqDetailClearances->purpose }}</p>  
        <p>Dokumen</p>
        <ul>
            @foreach ($record->reqDetailClearances->documents as $document)
                <li><a href="{{ url('storage/' . $document) }}" target="_blank">{{ $document }}</a></li>
            @endforeach
        </ul>
  
    <!-- Custom content for service 4 -->
    @endif

    <!-- Anda bisa menampilkan field lain sesuai dengan kebutuhan -->
</div>
