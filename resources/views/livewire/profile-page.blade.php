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
                                            <a class="active show" data-bs-toggle="tab" href="#liton_tab_1_1">Account Details <i class="fas fa-home"></i></a>
                                            <a data-bs-toggle="tab" href="#liton_tab_1_2">Orders <i class="fas fa-file-alt"></i></a>
                                            <a data-bs-toggle="tab" href="#liton_tab_1_4">address <i class="fas fa-map-marker-alt"></i></a>
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
                                                                    <input type="text" name="ltn__name" value="{{$user->name}}" disabled>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Last name</label>
                                                                    <input type="text" name="ltn__lastname"value="{{$user->last_name}}" disabled>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Email:</label>
                                                                    <input type="email" name="ltn__email"value="{{$user->email}}" disabled>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Gender:</label>
                                                                    <input type="text" name="ltn__gender"value="{{$user->gender}}" disabled>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Mobile:</label>
                                                                    <input type="text" name="ltn__mobile"value="{{$user->mobile}}" disabled>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="btn btn-primary ">
                                                                <a href="{{ url('/user/profile') }}">Edit profile</a>
                                                            </div>
                                                            
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
                                                                {{-- <th>Address ID</th> --}}
                                                                <th>Total Price</th>
                                                                <th>Delivery ID</th>
                                                                <th>Create At</th>
                                                                <th>Action</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($orders as $order)
                                                            <tr>
                                                                <td>{{ $order->id}}</td>
                                                                <td>{{$order->status}}</td>
                                                                <td>{{$order->payment_method}}</td>
                                                                {{-- <td>{{$order->user_address->name}}</td> --}}
                                                                <td>{{$order->total_price}}</td>
                                                                <td>{{$order->order_delivery->name}}</td>
                                                                <td>{{$order->Created_at}}</td>
                                                                <td><a href="{{ route('bill', ['id' => $order->id]) }}">View</a></td>
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
                                                                <td>{{ $address->name}}</td>
                                                                <td>{{$address->description}}</td>
                                                                <td>{{$address->city}}</td>
                                                                <td><a href="{{ route('bill', ['id' => $address->id]) }}">Edit</a></td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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
    </div></div>
