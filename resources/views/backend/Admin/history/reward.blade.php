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
            @foreach($rewards as $reward)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $reward->point }}</td>
                    <td>{{ $reward->details }}</td>
                    <td>{{ $reward->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
            {{ $rewards->links() }}
        </table>
    </div>
</x-backend.layouts.master>
