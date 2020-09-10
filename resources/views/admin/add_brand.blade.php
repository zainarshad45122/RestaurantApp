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
                                    <div>Add Brand
                                       
                                    </div>
                                </div>
                     
                            </div>
                        </div>          
                        
                    
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <form method="POST"  action="{{ url('/add/brand') }}">
                                             @csrf
                                            
                                            <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Enter Brand Name</label>
                                                <div class="col-sm-10">
                                                    <input name="brand_name" type="text" class="form-control @error('brand_name') is-invalid @enderror"  value="{{ old('brand_name') }}" required >
                                                    @error('brand_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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