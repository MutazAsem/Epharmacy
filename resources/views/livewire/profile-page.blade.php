<div style="margin-top: 40px">
    <div class="liton__wishlist-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- PRODUCT TAB AREA START -->
                    <div class="ltn__product-tab-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="ltn__tab-menu-list mb-50">
                                        <div class="nav">
                                            <a class="active show" data-bs-toggle="tab" href="#liton_tab_1_1">Account
                                                Details <i class="fas fa-home"></i></a>
                                            <a data-bs-toggle="tab" href="#liton_tab_1_2">Orders <i
                                                    class="fas fa-file-alt"></i></a>
                                            <a data-bs-toggle="tab" href="#liton_tab_1_4">Address <i
                                                    class="fas fa-map-marker-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="liton_tab_1_1">

                                            <div class="ltn__myaccount-tab-content-inner">

                                                <div class="ltn__form-box">
                                                    <form action="#">
                                                        <div class="row mb-50">
                                                            <div class="col-md-6">
                                                                <label> Name</label>
                                                                <input type="text" name="ltn__name"
                                                                    value="{{ $user->name }}" readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Last name</label>
                                                                <input type="text"
                                                                    name="ltn__lastname"value="{{ $user->last_name }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Email:</label>
                                                                <input type="email"
                                                                    name="ltn__email"value="{{ $user->email }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Gender:</label>
                                                                <input type="text"
                                                                    name="ltn__gender"value="{{ $user->gender }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Mobile:</label>
                                                                <input type="text"
                                                                    name="ltn__mobile"value="{{ $user->mobile }}"
                                                                    readonly>
                                                            </div>
                                                        </div>

                                                        <a href="{{ url('/user/profile') }}"> <button type="button"
                                                                class="btn btn-primary"> Edit profile</button></a>


                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="liton_tab_1_2">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order ID</th>
                                                                <th>Status</th>
                                                                <th>Payment Method</th>
                                                                <th>Address Name</th>
                                                                <th>Total Price</th>
                                                                <th>Delivery Name</th>
                                                                <th>Create At</th>
                                                                <th>Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($orders as $order)
                                                                <tr>
                                                                    <td>{{ $order->id }}</td>
                                                                    <td>{{ $order->status }}</td>
                                                                    <td>{{ $order->payment_method }}</td>
                                                                    <td>{{ $order->order_address->name }}</td>
                                                                    <td>{{ $order->total_price }}</td>
                                                                    <td>{{ $order->order_delivery->name }}</td>
                                                                    <td>{{ $order->created_at }}</td>
                                                                    <td><a
                                                                        wire:navigate href="{{ route('bill', ['id' => $order->id]) }}">
                                                                            <button type="button"
                                                                                class="btn btn-success">View</button>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="liton_tab_1_4">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Description</th>
                                                                <th>City</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($addresses as $address)
                                                                <tr>
                                                                    <td>{{ $address->name }}</td>
                                                                    <td>{{ $address->description }}</td>
                                                                    <td>{{ $address->city }}</td>
                                                                    <td>

                                                                        <div class="btn-group" role="group"
                                                                            aria-label="Basic mixed styles example">
                                                                            <button type="button"
                                                                                class="btn btn-danger"
                                                                                wire:click="deleteAddress({{ $address->id }})">Delete</button>
                                                                            <a
                                                                            wire:navigate href="{{ route('editAddress', ['id' => $address->id]) }}"><button
                                                                                    type="button"
                                                                                    class="btn btn-warning">Edit</button></a>

                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <a wire:navigate href="{{ route('address') }}"> <button type="button"
                                                    class="btn btn-primary"> Create Address</button></a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PRODUCT TAB AREA END -->
                </div>
            </div>
        </div>
    </div>
</div>
