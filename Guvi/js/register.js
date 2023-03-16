function submitForm() {
    var name = $("input[name=name]").val();
    var password = $("input[name=password]").val();
    var formData = {
      name: name,
      password: password
    };
    $.ajax({
      url: "http://localhost/Guvi/php/register.php",
      type: "POST",
      data: formData,
      success: function (response) {
       console.log(response)
      },
    });
    // console.log("xdfghjk")
    // alert(name);

    // var username=document.getElementById('username').value;
    // var pass=document.getElementById('password').value;

    // localStorage.setItem('Username',username);
    // localStorage.setItem('Password',pass);
  }