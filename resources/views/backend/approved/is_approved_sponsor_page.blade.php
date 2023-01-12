<x-backend.layouts.master>
    <div class="m-5">
        <h3>Welcome,
            @php
                echo auth()->user()->name;
            @endphp !
        </h3>
    </div>
                {{-- notification --}}

    <div class="container">
        <div class="row">
            <div class="col-md-12">
{{-- @dd($sponser) --}}
@if($sponser_details->is_approved_sponsor == 0)
               @isset($sponser)
                       <div class="alert alert-success" role="alert">
                           <h4 class="alert-heading">Conform Approve Request</h4>
                           <p>Are you sure you want to approve this request?</p>
                           <hr>
                            <form action="{{ route('is_approved_sponsor',['id' => Auth::user()->uuid]) }}" method="post">
                               @csrf
                                 <input type="hidden" name="sponser_uuid" value="{{ $sponser->user_id }}">
                                <input type="hidden" name="notification_id" value="{{ $sponser->id }}">
                           <button type="submit" class="btn btn-success">Conform </button>
                        </form>
                       </div>
                   
               @endisset
               @endif
            </div>
        </div>
    </div>
    {{-- end notification --}}
</x-backend.layouts.master>
