@switch(auth()->user()->role->name)
    @case('Admin')
        @include('layouts.Admin')
    @break

    @case('User')
    @if(auth()->user()->is_approve == 1)
    @include('layouts.User') 
    @else
 <x-backend.layouts.master>

 <div class="col-md-12 text-center text-danger">
                Waiting for Conformation and Approval.
            </div>
        </x-backend.layouts.master>
    @endif
       
    @break

    @case('Guest')
        <x-backend.layouts.master>
            <x-slot name="pageTitle">
                Guest Portal
            </x-slot>

            <x-slot name='breadCrumb'>
                <x-backend.layouts.elements.breadcrumb>
                    <x-slot name="pageHeader"> Welcome, {{ auth()->user()->name }} </x-slot>

                </x-backend.layouts.elements.breadcrumb>
            </x-slot>
            <div class="col-md-12"><i class="fas fa-tachometer-alt"></i>
                Waiting for Conformation
            </div>

            {{-- </div> --}}
        </x-backend.layouts.master>
    @break

    @default
        <x-backend.layouts.master>

<div class="col-md-12 text-center text-danger">
                Waiting for Conformation and Approval.
            </div>
        </x-backend.layouts.master>
@endswitch

<script>
    // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

    $('#reservation').daterangepicker()

    //   Date picker JS
</script>
{{-- @endif --}}
