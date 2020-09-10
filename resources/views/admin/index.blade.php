<!DOCTYPE html>
<html>
@include('admin.head')

<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
		@include('admin.header')  
		@include('admin.sidebar')  
		@include('admin.dashboard')

	</div>






  <script src="{!! asset('assets/scripts/main.js') !!}"></script>
</body>

</html>