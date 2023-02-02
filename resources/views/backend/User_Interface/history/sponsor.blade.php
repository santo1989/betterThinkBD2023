<x-backend.layouts.master>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Details</th>
                <th scope="col">From</th>
                <th scope="col">Point</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sponsors as $sponsor)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $sponsor->details }}</td>
                    <td>{{ $sponsor->payment_id }}</td>
                    <td>{{ $sponsor->point }}</td>
                    <td>{{ $sponsor->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
            {{ $sponsors->links() }}
        </table>
    </div>
</x-backend.layouts.master>
