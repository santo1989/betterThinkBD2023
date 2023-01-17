<x-frontend.layouts.master>

    <section>
        {{-- <div class="row">
            <h2 class="section-heading">Our Services</h2>
        </div> --}}
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-plug"></i>
                    </div>
                    <h3>Our Goal</h3>
                    <p>
                        In this era of busy work, this effort or initiative of Better Thing BD is to bring our daily
                        essential needs easily available and affordable.
                        Better Thing BD is doing the job of bringing the country's standard services to your doorstep
                        easily.
                        Through our new concept, we are committed to creating a bridge between service providers and
                        service receivers.
                    </p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fa fa-building" aria-hidden="true"></i>
                    </div>
                    <h3>Better Think BD</h3>
                    <p>
                        Up to 15% Discount for our Card holder
                        Our Facilities
                       
                            Hospitals<br />
                            Medicines<br />
                            Super shops<br />
                            Restaurants<br />
                            Hotel & Resorts<br />
                        
                    </p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fa fa-bullhorn" aria-hidden="true"></i>
                    </div>
                    <h3> আমাদের লক্ষ্য ও উদ্দেশ্য </h3>
                    <p>
                        কর্ম ব্যস্তার এই যুগে আমাদের দৈনন্দিন প্রয়োজনীয় চাহিদাগুলো সহজলব্য ও সাশ্রয়ী করে সহজে আপনাদের
                        সামনে নিয়ে আসার জন্য Better Thing BD এর এই প্রচেষ্টা বা উদ্যোগ।
                        দেশের মানসম্মত সেবাখাতগুলোকে সহজে আপনার দ্বারপ্রান্তে আনার কাজটুকু করে যাচ্ছে Better Thing BD.
                        আমাদের এই নতুন ভাবনার মাধ্যমে আমরা সেবাদানকারী ও সেবাগ্রহনকারীর মধ্যে একটি সেতু বন্ধন তৈরিতে
                        প্রতিশ্রুতিবন্ধ।

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
