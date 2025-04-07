<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($perjalananCinta as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img class="img-thumbnail" src="{{ Storage::url($item->image) }}" alt="Image 1" width="120"></td>
                <td>
                    <!-- Tombol Edit & Delete (optional AJAX nanti) -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
