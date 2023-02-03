<x-backend.layouts.master>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Point</th>
                <th scope="col">Details</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($points as $point)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $point->point }}</td>
                    <td>{{ $point->details }}</td>
                    <td>{{ $point->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
            {{ $points->links() }}
        </table>
    </div>
</x-backend.layouts.master>
