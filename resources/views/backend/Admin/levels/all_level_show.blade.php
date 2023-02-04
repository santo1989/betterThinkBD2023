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
    </div>
</x-backend.layouts.master>
