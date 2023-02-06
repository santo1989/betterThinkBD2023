<x-backend.layouts.master>
    <div class="container">
        @php
            $parent = DB::table('hands')->pluck('parent_id')->toArray();
            $child = DB::table('hands')->pluck('child_id')->toArray();
            $parent = array_unique($parent);
            $child = array_unique($child);
            $parent = array_values($parent);
            $child = array_values($child);
            dd($parent, $child)
        @endphp

        @foreach ($parent as $parent)

            @php
                $parent_name = DB::table('users')->where('id', $parent)->pluck('name')->toArray();
                $parent_name = array_values($parent_name);
            @endphp

            @foreach ($child as $child)
                @php
                    $child_name = DB::table('users')->where('id', $child)->pluck('name')->toArray();
                    $child_name = array_values($child_name);
                @endphp
                <div class="row">
                    <div class="col-md-6">
                        <h3>{{ $parent_name[0] }}</h3>
                    </div>
                    <div class="col-md-6">
                        <h3>{{ $child_name[0] }}</h3>
                    </div>
                </div>
            @endforeach
            
        @endforeach
       
    </div>
</x-backend.layouts.master>
