<x-backend.layouts.master>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Point</th>
                <th scope="col">Details</th>
                <th scope="col">Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($earned as $earn)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $earn->point }}</td>
                    <td>{{ $earn->details }}</td>
                    <td>{{ $earn->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-backend.layouts.master>
