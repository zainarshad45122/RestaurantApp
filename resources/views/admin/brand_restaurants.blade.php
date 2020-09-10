<!DOCTYPE html>
<html>
@include('admin.head')

<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
		@include('admin.header')  
		@include('admin.sidebar')  
		    <div class="app-main__outer">
                <div class="app-main__inner">
		          <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card" style="padding: 25px;">
                                    <div class="card-header">{{$brand_name}} Restaurants 
                                       
                                    </div>
                                    <br/>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Branch Name</th>
                                                <th class="text-center">Branch Phone Number</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Restaurant Orders</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($restaurants as $restaurant)
                                            <tr>
                                                <td class="text-center text-muted">#{{$restaurant->id}}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{$restaurant->branch_name}}</div>
                                                                <div class="widget-subheading opacity-7">{{$restaurant->brand_name}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                               
                                            
                                                <td class="text-center">{{$restaurant->branch_phone_number}}</td>
                                                <td class="text-center">
                                                    <div class="badge badge-warning">{{$restaurant->status}}</div>
                                                </td>
                                                <td class="text-center">
                                                    <a  href="{{ url('/orders/')}}/{{$restaurant->id}}" class="btn btn-primary btn-sm">Orders</a>
                                                </td>
                                                <td class="text-center">
                                                    <a  href="{{ url('/restaurant/details/')}}/{{$restaurant->id}}" class="btn btn-primary btn-sm">Details</a>
                                                </td>
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






  <script src="{!! asset('assets/scripts/main.js') !!}"></script>
    <script type="text/javascript">
      $(document).ready( function () {
    $('.table').DataTable();
} );
</script>
</body>

</html>