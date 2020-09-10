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
                                    <div>Order Details  
                                    </div>
                                </div>
                            </div>
                        </div>          
                        
                    
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Brnach Name : {{$branch_name}}</h5>
                                        <form class="">
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Order Id</label>
                                                <div class="col-sm-10">
                                                    <input name="id" id="exampleEmail" value="{{$order->id}}" type="number" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Total Price</label>
                                                <div class="col-sm-10">
                                                    <input name="total_price"  value="{{$order->total_price}}" type="text" class="form-control" readonly>
                                                </div>
                                            </div>
                                             <div class="position-relative row form-group">
                                                <label for="chefFistname" class="col-sm-2 col-form-label">Table Number</label>
                                                <div class="col-sm-10">
                                                    <input name="table_number"  value="{{$table_number}}" type="text" class="form-control" readonly>
                                                </div>
                                            </div>    
                                        </form>
                                    </div>
                                </div>
                             
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Dishes Ordered</h5>
                                        <table class="mb-0 table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Dish Name</th>
                                                <th>Dish Price</th>
                                                <th>Serving Size</th>
                                                <th>Cuisine Type</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($dishes as $dish)
                                            <tr>
                                                <th scope="row"></th>
                                                <td>{{$dish->dish->name}}</td>
                                                <td>{{$dish->dish->price}}</td>
                                                <td>{{$dish->dish->serving_size}}</td>
                                                <td>{{$dish->dish->cuisine_type}}</td>
                                               
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            
                            </div>
                       </div>
      </div>






  <script src="{!! asset('assets/scripts/main.js') !!}"></script>
</body>

</html>