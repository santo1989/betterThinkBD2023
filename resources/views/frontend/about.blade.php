<x-frontend.layouts.master>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <!-- Material UI CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.3.0/material.indigo-pink.min.css" />

    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>

    <!-- Material UI JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.3.0/material.min.js"></script>


    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <!-- main content goes here -->
                <form>
                    <div class="form-group">
                        <label for="name-input">Name</label>
                        <input type="text" class="form-control" id="name-input">
                    </div>
                    <div class="form-group">
                        <label for="email-input">Email</label>
                        <input type="email" class="form-control" id="email-input">
                    </div>
                    <div class="form-group">
                        <label for="message-input">Message</label>
                        <textarea class="form-control" id="message-input" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <script>
                    const form = document.querySelector('form');

                    form.addEventListener('submit', function(event) {
                        event.preventDefault();

                        const nameInput = document.querySelector('#name-input');
                        const emailInput = document.querySelector('#email-input');
                        const messageInput = document.querySelector('#message-input');

                        if (nameInput.value === '' || emailInput.value === '' || messageInput.value === '') {
                            alert('All fields are required!');
                            return;
                        }

                        // submit the form
                    });
                </script>

            </div>
            <div class="col-4">
                <!-- sidebar goes here -->

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Phone
                        <span class="badge badge-primary badge-pill">(123) 456-7890</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Email
                        <span class="badge badge-primary badge-pill">info@example.com</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Address
                        <span class="badge badge-primary badge-pill">123 Main Street, Anytown USA</span>
                    </li>
                </ul>

            </div>
        </div>
    </div>



</x-frontend.layouts.master>
