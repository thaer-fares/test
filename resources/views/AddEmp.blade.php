@include('header')

<div class="container mt-5">
<form method="POST" action="">
  <div class="form-row">
{{csrf_field()}}
  <div class="form-group col-md-6">
      <label for="inputPassword4">ID</label>
      <input type="text" class="form-control" name="id" placeholder="ID" required>
    </div> 

    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
  
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Your Name" required>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">Age</label>
    <input type="text" class="form-control" name="age" placeholder="Your Age" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Department</label>
      <input type="text" class="form-control" name="dep" placeholder="Your Department" required>
    </div>
  
    </div>
    <button type="submit" class="btn btn-primary mt-3">Add</button>
  </div>
  
</form>
</div>






@include('footer')