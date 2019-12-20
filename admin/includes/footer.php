<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script> -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;  GOLD 2019</span>
          </div>
        </div>
      </footer>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>



    <div class="modal fade" id="changepassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form action="changepass.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="password" name="oldpass" class="form-control" placeholder="Old Password"><br>
            <input type="password" name="newpass" id="newpass" class="form-control" placeholder="New Password"><br>
            <input type="password" name="renewpass" id="renewpass" class="form-control" placeholder="Re-type New Password" onkeyup="checkPasswordMatch();"><br>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" name="change" id="change" value="Change" class="btn btn-warning"  style="visibility: hidden;">
        </div>
          </form>
      </div>
    </div>
  </div>


  <script>
function checkPasswordMatch() {
    var password = $("#newpass").val();
    var confirmPassword = $("#renewpass").val();

    if (password == confirmPassword)
         document.getElementById("change").style.visibility = "visible";
        // $("#divCheckPasswordMatch").html("Passwords do not match!");
        // document.getElementById("change").style.visibility = "visible";
    else
        // $("#divCheckPasswordMatch").html("Passwords match.");
        document.getElementById("change").style.visibility = "hidden";
}

$(document).ready(function () {
   $("#newpass, #renewpass").keyup(checkPasswordMatch);
});

  </script>