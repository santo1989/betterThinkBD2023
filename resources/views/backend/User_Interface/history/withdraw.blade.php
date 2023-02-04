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
            @foreach($withdraws as $withdraw)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $withdraw->details }}</td>
                    <td>{{ $withdraw->payment_id }}</td>
                    <td>{{ $withdraw->point }}</td>
                    <td>{{ $withdraw->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
            {{ $withdraws->links() }}
        </table>
    </div>
</x-backend.layouts.master>
