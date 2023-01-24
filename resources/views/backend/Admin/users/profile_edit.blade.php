<x-backend.layouts.master>
      <x-slot name="pageTitle">
          Edit User and  Role
      </x-slot>

      <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Edit User and  Role </x-slot>
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Role</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- <form action="{{ route('roles.update') }}" method="post"> --}}
<form action="{{ route('profile_update', ['user' => $user->id]) }}" method="post">
  <div>
    @csrf
    @method('put')
    

      <div class="row m-4">

          <x-backend.form.input name="picture" type="file" label="Picture" :value="$user->picture"/>

          <x-backend.form.input name="nid" type="number" label="Nid" :value="$user->nid"/>

          <x-backend.form.input name="dob" type="Date" label="Date of Birth" :value="$user->dob"/>

          <x-backend.form.input name="bkash_no" type="text" label="Bkash No" :value="$user->bkash_no"/>

          <x-backend.form.input name="bank_name" type="text" label="Bank Name" :value="$user->bank_name"/>

          <x-backend.form.input name="branch" type="text" label="Branch Name" :value="$user->branch"/>

          <x-backend.form.input name="account_no" type="text" label="Account No" :value="$user->account_no"/>
          
      </div>
      <button type="submit" class="btn btn-primary" style="margin-left: 33px">Save</button>
  </div>
</form>


</x-backend.layouts.master>
