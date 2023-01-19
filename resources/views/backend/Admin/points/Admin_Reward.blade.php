<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Admin Reward
    </x-slot>

    @if (session('message'))
        <div class="alert alert-success">
            <span class="close" data-dismiss="alert">&times;</span>
            <strong>{{ session('message') }}.</strong>
        </div>
    @endif

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Admin Reward </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Admin Reward</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            User Reward Point History <a class="btn btn-sm btn-info" href="#">History</a>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @php
                $point = Auth::user()->point;
            @endphp
            @if ($point < 0)
                <div class="alert alert-danger">
                    <ul>
                        <li>Sorry! You can't Reward point. You have to Generate point first.</li>
                    </ul>
                </div>
            @else
                <form action="{{ route('admin.reward') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select User</label>
                        {{-- search user by uuid or email or nid or phone number and select user --}}
                        <select name="user_id" class="js-example-basic-single">
                            @foreach ($users as $user)
                                <option  value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <x-backend.form.input name="point" type="number" label="Admin Reward Point" />

                    <span id="point_status"></span>

                    <div class="mt-4 mb-0">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
    @push('css')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    @endpush
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
    @endpush

</x-backend.layouts.master>
