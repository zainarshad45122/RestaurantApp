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
                                    <div class="card-header">All Brands 
                                       
                                    </div>
                                    <br/>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Brand Name</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($brands as $brand)
                                            <tr>
                                                <td class="text-center text-muted">#{{$brand->id}}</td>
                                                <td >{{$brand->brand_name}}</td>
                                                <td class="text-center">
                                                    <a  href="{{ url('/edit/brand/')}}/{{$brand->id}}" class="btn btn-primary btn-sm">Edit</a>
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