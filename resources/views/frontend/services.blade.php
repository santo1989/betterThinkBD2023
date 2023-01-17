<x-frontend.layouts.master>
    
<section>
      <div class="row">
        <h2 class="section-heading">Our Services</h2>
      </div>
      <div class="row">
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class='fas fa-user-md'></i>
            </div>
            <h3>Hospital</h3>
            <p>
             <img src="{{ asset('ui/frontend/images/assets/hospital.jpg') }}" alt="" heigt=50px; width=60px; class="image-log rounded">
            </p>
          </div>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class='fas fa-capsules'></i>
            </div>
            <h3>Pharmacy</h3>
            <p>
              <img src="{{ asset('ui/frontend/images/assets/pharmacy.jpg') }}" alt="" heigt=50px; width=60px; class="image-log rounded">
            </p>
          </div>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            </div>
            <h3>Super Shop</h3>
            <p>
             <img src="{{ asset('ui/frontend/images/assets/SuperShop.jpg') }}" alt="" heigt=50px; width=60px; class="image-log rounded">
            </p>
          </div>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fa fa-suitcase" aria-hidden="true"></i>
            </div>
            <h3>Hotel</h3>
            <p>
              <img src="{{ asset('ui/frontend/images/assets/Hotel.jpg') }}" alt="" heigt=50px; width=60px; class="image-log rounded">
            </p>
          </div>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fa fa-plane" aria-hidden="true"></i>
            </div>
            <h3>Travel</h3>
            <p>
               <img src="{{ asset('ui/frontend/images/assets/Travel.jpg') }}" alt="" heigt=50px; width=60px; class="image-log rounded">
          </div>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class='fas fa-hamburger'></i>
            </div>
            <h3>Restaurant</h3>
            <p>
               <img src="{{ asset('ui/frontend/images/assets/Restaurant.jpg') }}" alt="" heigt=50px; width=60px; class="image-log rounded">
            </p>
          </div>
        </div>
      </div>
    </section>

    @push('css')

    <style>

        * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
section {
  height: 100vh;
  width: 100%;
  display: grid;
  place-items: center;
}
.row {
  display: flex;
  flex-wrap: wrap;
}
.column {
  width: 100%;
  padding: 0 1em 1em 1em;
  text-align: center;
}
.card {
  width: 100%;
  height: 100%;
  padding: 2em 1.5em;
  background: linear-gradient(#ffffff 50%, #2c7bfe 50%);
  background-size: 100% 200%;
  background-position: 0 2.5%;
  border-radius: 5px;
  box-shadow: 0 0 35px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  transition: 0.5s;
}
h3 {
  font-size: 20px;
  font-weight: 600;
  color: #1f194c;
  margin: 1em 0;
}
p {
  color: #575a7b;
  font-size: 15px;
  line-height: 1.6;
  letter-spacing: 0.03em;
}
.icon-wrapper {
  background-color: #2c7bfe;
  position: relative;
  margin: auto;
  font-size: 30px;
  height: 2.5em;
  width: 2.5em;
  color: #ffffff;
  border-radius: 50%;
  display: grid;
  place-items: center;
  transition: 0.5s;
}
.card:hover {
  background-position: 0 100%;
}
.card:hover .icon-wrapper {
  background-color: #ffffff;
  color: #2c7bfe;
}
.card:hover h3 {
  color: #ffffff;
}
.card:hover p {
  color: #f0f0f0;
}

 .image-log {
                width: 200px;
                height: 100px;
                background-color: transparent;
            }



@media screen and (min-width: 768px) {
  section {
    padding: 0 2em;
  }
  .column {
    flex: 0 50%;
    max-width: 50%;
  }
}
@media screen and (min-width: 992px) {
  section {
    padding: 1em 3em;
  }
  .column {
    flex: 0 0 33.33%;
    max-width: 33.33%;
  }
}


    </style>
        
    @endpush

</x-frontend.layouts.master>