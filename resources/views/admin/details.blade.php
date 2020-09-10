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
                                    <div>Resturant Details
                                       
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                  
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                
                                            </span>
                                           Status : {{$restaurant->status}}
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="{{ url('/restaurant/approve/')}}/{{$restaurant->id}}" class="nav-link">
                                                        <i class="nav-link-icon lnr-inbox"></i>
                                                        <span>
                                                            Approve
                                                        </span>
                                                      
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ url('/restaurant/block/')}}/{{$restaurant->id}}" class="nav-link">
                                                        <i class="nav-link-icon lnr-book"></i>
                                                        <span>
                                                            Block
                                                        </span>
                                                        
                                                    </a>
                                                </li>
                                                 <li class="nav-item">
                                                    <a href="{{ url('/restaurant/inprocessing/')}}/{{$restaurant->id}}" class="nav-link">
                                                        <i class="nav-link-icon lnr-book"></i>
                                                        <span>
                                                            In Process
                                                        </span>
                                                        
                                                    </a>
                                                </li>
                                              
                                            </ul>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>          
                        
                    
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Branch Name : {{$restaurant->branch_name}}</h5>
                                        <form method="POST"  action="{{ url('/restaurant/update/')}}/{{$restaurant->id}}">
                                             @csrf
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input name="email" id="exampleEmail" value="{{$restaurant->email}}" type="email" class="form-control" readonly required>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Chef First Name</label>
                                                <div class="col-sm-10">
                                                    <input name="chef_first_name"  value="{{$restaurant->chef_first_name}}" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                             <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Chef Last Name</label>
                                                <div class="col-sm-10">
                                                    <input name="chef_last_name"  value="{{$restaurant->chef_last_name}}" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                              <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Branch Name</label>
                                                <div class="col-sm-10">
                                                    <input name="branch_name"  value="{{$restaurant->branch_name}}" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                             <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Branch Address</label>
                                                <div class="col-sm-10">
                                                    <input name="branch_address"  value="{{$restaurant->branch_address}}" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Branch Code</label>
                                                <div class="col-sm-10">
                                                    <input name="branch_code"  value="{{$restaurant->branch_code}}" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Branch Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input name="branch_phone_number"  value="{{$restaurant->branch_phone_number}}" type="text" class="form-control" required>
                                                </div>               
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Chef Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input name="chef_phone_number"  value="{{$restaurant->chef_phone_number}}" type="text" class="form-control" required>
                                                </div>               
                                            </div>
                                             <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Brand</label>
                                                <div class="col-sm-10">
                                                    <input name="brand_name"  value="{{$restaurant->brand->brand_name}}" type="text" class="form-control" readonly>
                                                </div>               
                                            </div>
                                             <div class="position-relative row form-group">
                                                   
                                                 <label for="chefFistname" class="col-sm-2 col-form-label">Choose Brand</label>
                                                 <div class="col-sm-10">
                                                    
                                                        <select name="brand_id" class="form-control">
                                                                     @foreach($brands as $brand)
                                                                      <option value="{{$brand->id}}">{{$brand->brand_name}}</option>@endforeach
                                                        </select>  
                                                    
                                                </div>       
                                            </div>




                                         
                                           
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button type="submit" class="btn btn-secondary">Update</button>
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