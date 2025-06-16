<x-app-layout title="Edit car">
    <main>
        <div class="container-small">
            <h1 class="car-details-page-title fs-3 text-black">Edit car: {{ $car->getTitle() }}</h1>
            <form action="{{ route('car.update', $car) }}" method="POST" enctype="multipart/form-data"
                class="card add-new-car-form">
                @csrf
                @method('PUT')
                <div class="form-content">
                    <div class="form-details">
                        <div class="row">
                            <div class="col">
                                <div
                                    class="form-group @error('maker_id')
                                    has-error
                                @enderror">
                                    <label>Maker</label>
                                    <x-select-maker :value="old('maker_id', $car->maker_id)" />
                                    <p class="error-message">
                                        {{ $errors->first('maker_id') }}
                                    </p>
                                </div>
                            </div>
                            <div class="col">
                                <div
                                    class="form-group @error('model_id')
                                    has-error
                                @enderror">
                                    <label>Model</label>
                                    <x-select-model :value="old('model_id', $car->model_id)" />
                                    <p class="error-message"> {{ $errors->first('model_id') }}</p>
                                </div>
                            </div>
                            <div class="col">
                                <div
                                    class="form-group @error('year')
                                    has-error
                                @enderror">
                                    <label>Year</label>
                                    <x-select-year :value="old('year', $car->year)" />
                                    <p class="error-message"> {{ $errors->first('year') }}</p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="form-group @error('car_type_id')
                            has-error
                        @enderror">
                            <label>Car Type</label>
                            <x-radio-list-car-type :value="old('car_type_id', $car->car_type_id)" />
                            <p class="error-message"> {{ $errors->first('car_type_id') }}</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div
                                    class="form-group @error('price')
                                    has-error
                                @enderror">
                                    <label>Price</label>
                                    <input name="price" type="number" placeholder="Price"
                                        value="{{ old('price', $car->price) }}" />
                                    <p class="error-message"> {{ $errors->first('price') }}</p>
                                </div>
                            </div>
                            <div class="col">
                                <div
                                    class="form-group @error('vin')
                                    has-error
                                @enderror">
                                    <label>Vin Code</label>
                                    <input name="vin" placeholder="Vin Code" value="{{ old('vin', $car->vin) }}" />
                                    <p class="error-message"> {{ $errors->first('vin') }}</p>
                                </div>
                            </div>
                            <div class="col">
                                <div
                                    class="form-group @error('mileage')
                                    has-error
                                @enderror">
                                    <label>Mileage (ml)</label>
                                    <input placeholder="Mileage" name="mileage"
                                        value="{{ old('mileage', $car->mileage) }}" />
                                    <p class="error-message"> {{ $errors->first('mileage') }}</p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="form-group @error('fuel_type_id')
                            has-error
                        @enderror">
                            <label>Fuel Type</label>
                            <x-radio-list-fuel-type :value="old('fuel_type_id', $car->fuel_type_id)" />
                            <p class="error-message"> {{ $errors->first('fuel_type_id') }}</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>State/Region</label>
                                    <x-select-state :value="old('state_id', $car->city->state_id)" />
                                </div>
                            </div>
                            <div class="col">
                                <div
                                    class="form-group @error('city_id')
                                    has-error
                                @enderror">
                                    <label>City</label>
                                    <x-select-city :value="old('city_id', $car->city_id)" />
                                    <p class="error-message"> {{ $errors->first('city_id') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div
                                    class="form-group @error('addresss')
                                    has-error
                                @enderror">
                                    <label>Address</label>
                                    <input name="address" placeholder="Address"
                                        value="{{ old('address', $car->address) }}" />
                                    <p class="error-message"> {{ $errors->first('address') }}</p>
                                </div>
                            </div>
                            <div class="col">
                                <div
                                    class="form-group @error('phone')
                                    has-error
                                @enderror">
                                    <label>Phone</label>
                                    <input name="phone" placeholder="Phone"
                                        value="{{ old('phone', $car->phone) }}" />
                                    <p class="error-message"> {{ $errors->first('phone') }}</p>
                                </div>
                            </div>
                        </div>
                        <x-checkbox-car-features :$car />
                        <div
                            class="form-group @error('description')
                            has-error
                        @enderror">
                            <label>Detailed Description</label>
                            <textarea rows="10" name="description">{{ old('description', $car->description) }}</textarea>
                            <p class="error-message"> {{ $errors->first('description') }}</p>
                        </div>
                        <div class="form-group">
                            <label>Publish Date</label>
                            <input type="date" name="published_at"
                                value="{{ old('published_at', $car->published_at) }}" />
                            <p class="error-message"> {{ $errors->first('published_at') }}</p>
                        </div>
                    </div>
                    <div class="form-images">
                        <p class="mb-3">Manage your images <a href="#">From here</a></p>

                        <div class="car-form-images">
                            @foreach ($car->images as $image)
                                <div class="car-form-image-preview">
                                    <img src="{{$image->getUrl()}}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="p-medium" style="width: 100%">
                    <div class="flex justify-end gap-1">
                        <button type="button" class="btn btn-default">Reset</button>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
