<x-backend.layouts.master>
    <x-slot name='breadCrumb'>
        <div class="text-end">
            <br> <br>
                <h4> Total Referral : {{ $referredUsers->count() ?? '0' }}</h4>
            <br> <br>
        </div>
    </x-slot>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">UUID</th>
                <th scope="col">Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($referredUsers as $referral)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $referral->name }}</td>
                    <td>{{ $referral->email }}</td>
                    <td>{{ $referral->uuid }}</td>
                    <td>{{ $referral->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-backend.layouts.master>
