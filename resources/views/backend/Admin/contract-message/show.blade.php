<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Details
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> show Message </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('contract_message.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">show New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Message Details <a class="btn btn-sm btn-info" href="{{ route('contract_message.index') }}">List</a>
        </div>
        <div class="card-body">
                 <p><h4>Messager Name  : </h4>{{ $show_contract_message->name }}</p> 
                <p><h4>Sender E-mail  : </h4>{{ $show_contract_message->email }}</p>
                <p><h4>Message  : </h4>{{ $show_contract_message->message }}</p>
                

        </div>
    </div>

</x-backend.layouts.master>