# Neighbour to Neighbour Api End points


#### Restaurant Registration 

method `POST`

end point: ```/api/register``` 

Json:
```
{
 
"email": "zainarshad45122@gmail.com".
"password" : "12345678",
"chef_first_name": "Zain",
chef_last_name": "Arshad",
"branch_name": "three",
"branch_address": "street 3",
"branch_phone_number": "92313845392",
"chef_phone_number":"92313845392"
"brand_id":"1",
"branch_code": "1234",
}
```

Response:
```
{
    "message": "Your data has been successfully submitted to us, please wait for Admin Approval."
}
```

### Restaurant Login

end point: `/api/login`

method  `POST`

json:
```
 {
  	
  	"email": "salman.zafar@innowi.com",
  	"password": "12345678"
  }
```

Response:
```
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjZkZTkwZmIxZGMyZGNmYWY5ZTJjMzgxMDhhNTE2YWQ3N2FjNWIwYzk5MzQ5NjY0ZmU2ZGM3NWQyYmZjZDVhNjBjZWZmOWU2NDVhNTdmZmUyIn0.eyJhdWQiOiIyIiwianRpIjoiNmRlOTBmYjFkYzJkY2ZhZjllMmMzODEwOGE1MTZhZDc3YWM1YjBjOTkzNDk2NjRmZTZkYzc1ZDJiZmNkNWE2MGNlZmY5ZTY0NWE1N2ZmZTIiLCJpYXQiOjE1NTc3NDY3NjksIm5iZiI6MTU1Nzc0Njc2OSwiZXhwIjoxNTg5MzY5MTY5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.gActUIuKfqpYlM87qlx3EnbJcRt3zXR2wpOxo-J50qDzcaserNW1Hfd3KJ5fjtNg8q6o6alH8r5rr-J9HjBwRdFMYz3f15LjMxDhqBoF7-W8IXqOxV5eKxfveseWzwfiBtkErOJv4uNZ1PdVmPhgeOjxS9BHRDImppFc5o72ioQL4DrPHOawZr7PiSN509xWlckH7tHufon79ghAksNPn_JbhXvHQdFc4Ugw0JYp4T8HhHGcjy9iPTpbXq8ktDOe0Mkf7eb-iBS7NX-VnGNc_TrZ0Efz0N8_VNUV1HB9zIku_l2lQia8Crdv1appKqNKUAcYvmRke05hAAjCtJQqXMtJBUuOmjFOJGAXV1fFyO0LgzoPaJ-9C0b0YQCLL-WR7TzliuZrgtindz81eb165b48bFPCddQ-Uy4JtsmMOfEOV8fESeJ20H1x4Lr-3q6ASbV1R6NnKRoF2McZoUn33JpgA5qWFQvShyk-KnE2rQhKHnrl8wk0qk1SA--PM2Jhi2euwBRVMscxMYmhtQ0nXlaZSlcZFhNz8YNIW0cxR-92D-DMO_EHe5TEFr6gbJtv7Cs2z7OSL7yGEKP6hAPO0O0rm_ZNayLWQyiYN0uAJKAkAScOfV-SRNl-TE7VzCLI6bqQyC94Okr7SNq3M6eH0MCLb_920TZw0XAPPmr-YX4",
    "refresh_token": "def502004ac94b9d6d418b14ae75ef4f1e362346fa49c6ea848698eed7c04af051f068485783af47a755e0ded32920ac7e1927ce2f071c98b48ddd2139414c7d9f4c916580e80bcf3c3ad4cbb7459d4f4cc18576b1300c2d73fcd65e89dbf75d1d79e4b4ccebf1a0507e0b65d46dbeaa8ab6fdda0e6adee8b26fd556e03b465d1c54f1b90114727b39da79e997daf0636b133b6bafcf4f0fef11ffb37e9a4f747138876b72e1b564559062af83c2db541cf8da03e4babe22a479a0ef84d17c47bf617178b31ac447177ef3f3535ec467a33cc9f58b1272b8e356d4b6b23c390b86f878d25f12c0b4943a3ce55c2a08711bde1aba13c48f7364feb178048a1d344b5418688a8ebb19e995d62eea34c281cf42a22b15fba1d547197a0df537a751b6eef3962e78e3aecec8e3ee4f323568c47f74b6e477de5b1c4093c5f7b600b3e5b16108828241696bd73d21ccd2ea19e10003083155b49d6897773ba81c18b0a9"
}
```



### Add Table

method  `POST`

end point: ```/api/table```

json:
```
 {
    
   "table_number": "1",
   "restaurant_id":"1",
  }
```
Response:
```
{
    "message": "Table Added Successfully"
}
```

### Add Dish

method  `POST`

end point: ```/api/dish```

json:
```
 {
    
	"name": "Pizza",
	"price": 20,
	"serving_size": 2,
	"cuisine_type": "chinese",
	"dietary_information": "2 calories",
	"course_type": "dinner",
	"description": "this is a dish",
	"ingredients[]": "apple",
	"ingredients[]": "mango",
	serving_time:  2
  }
```
Response:
```
{
    "message": "Dish Added Successfully"
}
```


