<!-- Find a car form -->
<section class="find-a-car">
    <div class="container">
        <form
            action="{{ route('car.search') }}"
            method="GET"
            class="find-a-car-form card flex p-medium"
        >
            <div class="find-a-car-inputs">
                <div>
                    <select>
                        <option value="">Make</option>
                        <option value="bmw">BMW</option>
                        <option value="lexus">Lexus</option>
                        <option value="mercedes">Mercedes</option>
                    </select>
                </div>
                <div>
                    <select>
                        <option value="">Model</option>
                    </select>
                </div>
                <div>
                    <select>
                        <option value="">State/Region</option>
                    </select>
                </div>
                <div>
                    <select>
                        <option value="">City</option>
                    </select>
                </div>
                <div>
                    <select>
                        <option value="">Type</option>
                    </select>
                </div>
                <div>
                    <input type="number" placeholder="Year From" />
                </div>
                <div>
                    <input type="number" placeholder="Year To" />
                </div>
                <div>
                    <input type="number" placeholder="Price From" />
                </div>
                <div>
                    <input type="number" placeholder="Price To" />
                </div>
                <div>
                    <select>
                        <option value="">Fuel Type</option>
                    </select>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-find-a-car-reset">
                    Reset
                </button>
                <button class="btn btn-primary btn-find-a-car-submit">
                    Search
                </button>
            </div>
        </form>
    </div>
</section>
<!--/ Find a car form -->
