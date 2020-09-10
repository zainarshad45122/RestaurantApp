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
                            
                             
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card" style="padding: 25px;">
                                    <div class="card-body"><h5 class="card-title">Branch Name : {{$branch_name}} </h5>
                                        <table class="mb-0 table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Table Number</th>
                                                <th>Total Price</th>
                                                <th>Date and Time</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <th scope="row">{{$order->id}}</th>
                                                <td>{{$order->table_number}}</td>
                                                <td>{{$order->total_price}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>
                                                	 <a  href="{{ url('/order/details/')}}/{{$order->id}}" class="btn btn-primary btn-sm">Details</a>
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