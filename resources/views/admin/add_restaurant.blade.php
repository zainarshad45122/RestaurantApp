<!DOCTYPE html>
<html>
@include('admin.head')

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('admin.header')  
        @include('admin.sidebar')  
              <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-graph text-success">
                                        </i>
                                    </div>
                                    <div>Add Restaurant
                                       
                                    </div>
                                </div>
                     
                            </div>
                        </div>          
                        
                    
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <form method="POST"  action="{{ url('/restaurant/add/') }}">
                                             @csrf
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input name="email" id="exampleEmail"  type="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autofocus>
                                                     @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input name="password"  type="password" class="form-control @error('password') is-invalid @enderror"  value="{{ old('password') }}" required autofocus>
                                                     @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Chef First Name</label>
                                                <div class="col-sm-10">
                                                    <input name="chef_first_name" type="text" class="form-control @error('chef_first_name') is-invalid @enderror"  value="{{ old('chef_first_name') }}" required >
                                                    @error('chef_first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                             <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Chef Last Name</label>
                                                <div class="col-sm-10">
                                                    <input name="chef_last_name" type="text" class="form-control @error('chef_last_name') is-invalid @enderror"  value="{{ old('chef_last_name') }}" required >
                                                    @error('chef_last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                              <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Branch Name</label>
                                                <div class="col-sm-10">
                                                    <input name="branch_name" type="text" class="form-control @error('branch_name') is-invalid @enderror"  value="{{ old('branch_name') }}" required >
                                                    @error('branch_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                             <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Branch Address</label>
                                                <div class="col-sm-10">
                                                    <input name="branch_address" type="text" class="form-control @error('branch_address') is-invalid @enderror"  value="{{ old('branch_address') }}" required>
                                                    @error('branch_address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Branch Code</label>
                                                <div class="col-sm-10">
                                                    <input name="branch_code" type="text" class="form-control @error('branch_code') is-invalid @enderror"  value="{{ old('branch_code') }}" required>
                                                    @error('branch_code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Branch Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input name="branch_phone_number" type="text" class="form-control @error('branch_phone_number') is-invalid @enderror"  value="{{ old('branch_phone_number') }}" required>
                                                    @error('branch_phone_number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>               
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Chef Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input name="chef_phone_number" type="text" class="form-control @error('chef_phone_number') is-invalid @enderror"  value="{{ old('chef_phone_number') }}" required>
                                                    @error('chef_phone_number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>               
                                            </div>
                                             <div class="position-relative row form-group">  
                                                 <label for="chefFistname" class="col-sm-2 col-form-label">Choose Brand</label>
                                                 <div class="col-sm-10">
                                                    
                                                        <select name="brand_id" class="form-control" required>
                                                                     @foreach($brands as $brand)
                                                                      <option value="{{$brand->id}}">{{$brand->brand_name}}</option>@endforeach
                                                        </select>      
                                                </div>       
                                            </div>
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button type="submit" class="btn btn-secondary">Add</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                               
                        
                       </div>
      </div>






  <script src="{!! asset('assets/scripts/main.js') !!}"></script>
</body>

</html>