<x-guest-layout>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />

    <section class="gradient-custom"
        style="background-image: linear-gradient(90deg,#1358a7,
 #191839, #0680c6, #273871, #0473bc, #2b4388, #2c2c64, #23345b, #2c3c94); background-size: cover; background-repeat: no-repeat;">
        <div class="container py-5 justify-content-between">
            <div class="row justify-content-between">
                <div class="col-md-9 col-lg-9 col-xl-7 col-sm-12">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                @php
                                    $UUID = App\Models\User::all()->last()->uuid;
                                @endphp

                                <div class="w-1">
                                    <div class="mt-3">
                                        Last Account: {{ $UUID }}
                                    </div>
                                    <div class="flex justify-content-between mt-3">

                                        <!-- Name -->
                                        <div class="w-1/2">
                                            <div class="mt-3">
                                                <x-label for="name" :value="__('Name')" />

                                                <x-input id="name" class="block mt-1 w-full" type="text"
                                                    name="name" :value="old('name')" required autofocus />

                                            </div>

                                            <!-- Email Address -->
                                            <div class="mt-3">
                                                <x-label for="email" :value="__('Email')" />

                                                <x-input id="email" class="block mt-1 w-full" type="email"
                                                    name="email" :value="old('email')" required />
                                            </div>

                                            <!-- Password -->
                                            <div class="mt-3">
                                                <x-label for="password" :value="__('Password')" />

                                                <x-input id="password" class="block mt-1 w-full" type="password"
                                                    name="password" required autocomplete="new-password" />
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="mt-3">
                                                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                                <x-input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password" name="password_confirmation" required />
                                            </div>



                                        </div>

                                        {{-- image upload --}}

                                        <div class="w-1/2">
                                            <div class="mt-3 mr-4">
                                                <x-label for="imageUpload" :value="__('Picture')" />

                                                <x-input id="image" class="block mt-1 ml-2 w-full" type="file"
                                                    name="picture" :value="old('picture')" required autofocus accept="image/*"
                                                    onchange="loadFile(event)" />

                                            </div>

                                            <div class="mt-3 ">
                                                <img class="img-thumbnail mx-auto d-block" id="output" height="100px"
                                                    width="100px" />
                                                <script>
                                                    var loadFile = function(event) {
                                                        var output = document.getElementById('output');
                                                        output.src = URL.createObjectURL(event.target.files[0]);
                                                        output.onload = function() {
                                                            URL.revokeObjectURL(output.src) // free memory
                                                        }
                                                    };
                                                </script>

                                            </div>
                                            {{-- end image upload --}}

                                        </div>

                                    </div>
                                    <div class="flex justify-content-between mt-3">
                                        <div class="w-1/2">

                                            {{-- mobile --}}
                                            <div class="mt-3">
                                                <x-label for="mobile" :value="__('Mobile')" />

                                                <x-input id="mobile" class="block mt-1 w-full" type="text"
                                                    name="mobile" :value="old('mobile')" required autofocus />

                                            </div>

                                            {{-- nid --}}

                                            <div class="mt-3">
                                                <x-label for="nid" :value="__('NID')" />

                                                <x-input id="nid" class="block mt-1 w-full" type="text"
                                                    name="nid" :value="old('nid')" autofocus />

                                            </div>


                                            {{-- Dob --}}

                                            <div class="mt-3">
                                                <x-label for="dob" :value="__('Date of Birth')" />

                                                <x-input id="dob" class="block mt-1 w-full" type="date"
                                                    name="dob" :value="old('dob')" required autofocus />

                                            </div>

                                            {{-- sponsor id --}}
                                            <div class="mt-3">

                                                <x-label for="sponsor_id" :value="__('Sponsor ID')" />
                                                <div class="row">
                                                    <div class="col-4">
                                                        <x-input id="sponsor_id" class="block mt-1 w-full" type="text"
                                                                 value="0012-2022-"  readonly autofocus />
                                                    </div>
                                                    <div class="col-8">
                                                        <x-input id="sponsor_id" class="block mt-1 w-full" type="text"
                                                                 placeholder="Last 8 digit of Sponsor ID" name="sponsor_id" :value="old('sponsor_id')" required autofocus />
                                                    </div>
                                                </div>

                                                <label class="mt-3" id="sponsor_name">

                                                </label>

                                            </div>
                                        </div>
                                        <div class="w-1/2">

                                            {{-- bkash no --}}

                                            <div class="mt-3">
                                                <x-label for="bkash_no" :value="__('Bkash No')" />

                                                <x-input id="bkash_no" class="block mt-1 w-full" type="text"
                                                    name="bkash_no" :value="old('bkash_no')"  autofocus />

                                            </div>

                                            {{-- bank name --}}

                                            <div class="mt-3">
                                                <x-label for="bank_name" :value="__('Bank Name')" />

                                                <x-input id="bank_name" class="block mt-1 w-full" type="text"
                                                    name="bank_name" :value="old('bank_name')"  autofocus />

                                            </div>

                                            {{-- branch name --}}

                                            <div class="mt-3">
                                                <x-label for="branch" :value="__('Branch Name')" />

                                                <x-input id="branch" class="block mt-1 w-full" type="text"
                                                    name="branch" :value="old('branch')"  autofocus />

                                            </div>

                                            {{-- account no --}}

                                            <div class="mt-3">
                                                <x-label for="account_no" :value="__('Account No')" />

                                                <x-input id="account_no" class="block mt-1 w-full" type="text"
                                                    name="account_no" :value="old('account_no')"  autofocus />

                                            </div>

                                        </div>
                                    </div>

                                    <div class="flex justify-content-between mt-3">
                                        <div class="w-1/2">

                                            {{-- payment Id  --}}
                                            <div class="mt-3">
                                                <div class="row">
                                                    <x-label for="payment_id" :value="__('Payment ID')" />
                                                    <div class="col-3">
                                                        <x-input id="payment_id" class="block mt-1 w-full" type="text"
                                                                 value="0012-2022-"  readonly autofocus />
                                                    </div>
                                                    <div class="col-8">
                                                        <x-input id="payment_id" class="block mt-1 w-full" type="text"
                                                                 placeholder="Last 8 digit of Payment ID" name="payment_id" :value="old('payment_id')" required autofocus />
                                                    </div>
                                                </div>
                                                



                                                <div class="mt-3" id="payment_name">
                                                </div>

                                            </div>

                                        </div>

                                        <div class="w-1/2">

                                            <div class="mt-3">
                                            
                                                <button type="submit"
                                                    class="btn btn-outline-primary mx-auto d-block mt-3">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                           
            </div>
            <div class="col-md-3 col-lg-3 col-xl-5 align-self-end"> 
              <p>  <img src="{{ asset('ui/frontend/images/assets/reg.png') }}" alt="" heigt=350px; width=150px; class="rounded float-end">
              </p>
            </div>
        </div>
    </section>
    @push('css')
        <style>
   
         .gradient-custom {
                /* fallback for old browsers */
                background: #f093fb;

                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));


            }

            .card-registration .select-input.form-control[readonly]:not([disabled]) {
                font-size: 1rem;
                line-height: 2.15;
                padding-left: .75em;
                padding-right: .75em;
            }

            .card-registration .select-arrow {
                top: 13px;
            }
        </style>
    @endpush

    @push('js')
        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>

        {{-- jquary 3.5.1 --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    uiLibrary: 'bootstrap5'
                });
            });

            let sponsor_id = document.getElementById('sponsor_id');
            sponsor_id.addEventListener('key', function() {
                var sponsor_id = this.value;
                console.log(sponsor_id);
                $.ajax({
                    type: 'get',
                    url: '{{ route('search') }}',
                    data: {
                        'sponsor_id': sponsor_id
                    },
                    success: function(data) {
                        $('#sponsor_name').text(data);
                    }
                });
            });
        </script>
    @endpush
</x-guest-layout>
