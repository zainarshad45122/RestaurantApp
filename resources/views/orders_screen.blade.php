<!DOCTYPE html>
<html>
<head>
  <script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-analytics.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-database.js"></script>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="./main.css" rel="stylesheet">
    <link href="{{ asset('main.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <style type="text/css">
      .myRow {
        font-size: 20px;
      }
    </style>
</head>
<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
		
		<div class="app-main__outer">
	         <div class="app-main__inner">
			   	<div class="row">
                            
                             
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card" style="padding: 25px;">
                                  <div class="card-header">Restaurant Orders
                                       
                                    </div>
                                   
                                    <div class="table-responsive">
                                        <table id="myTable" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                              
                                           <thead>
                                            <tr>
                                                <th >#</th>
                                                <th >Total Price</th>
                                                <th >Table Number</th>
                                                <th >Status</th>
                                               
                                            </tr>
                                            </thead>                                         
                                             <tbody>
                                             
                                            <tr id="myRow"></tr>
                                            
                                            
                                           
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
 

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyCM7VYuszM8K4KLm0SJgiGLr7mpeDMRzEY",
    authDomain: "restaurant-84ada.firebaseapp.com",
    databaseURL: "https://restaurant-84ada.firebaseio.com",
    projectId: "restaurant-84ada",
    storageBucket: "restaurant-84ada.appspot.com",
    messagingSenderId: "183707617617",
    appId: "1:183707617617:web:a795f9eb834e885be96b70",
    measurementId: "G-PB70H8FRDP"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  var database = firebase.database();

  firebase.database().ref('restaurant').orderByChild("restaurant_id").equalTo(1).on('value',   function(snapshot) {
     $("#myTable .myRow").remove(); 
    snapshot.forEach(function(childSnapshot) {
      var childKey = childSnapshot.key;
      var childData = childSnapshot.val();
      console.log(childData);
      var table = document.getElementById("myTable");
      var row = table.insertRow(-1);
      var cell1 = row.insertCell(0);
      cell1.className= "myRow";
      var cell2 = row.insertCell(1);
      cell2.className= "myRow";
      var cell3 = row.insertCell(2);
      cell3.className= "myRow";
      var cell4 = row.insertCell(3);
      cell4.className="myRow";
      cell1.innerHTML = childData.id;
      cell2.innerHTML = childData.total_price;
      cell3.innerHTML = childData.table_number;
      cell4.innerHTML = childData.status;
    });
  });
  
</script>
</body>

</html>