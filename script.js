function changeView() {
  var createAccountBox = document.getElementById("createAccountBox");
  var logInBox = document.getElementById("logInBox");

  createAccountBox.classList.toggle("d-none");
  logInBox.classList.toggle("d-none");
}

function createAccount() {
  var f = document.getElementById("f");
  var l = document.getElementById("l");
  var e = document.getElementById("e");
  var p = document.getElementById("p");
  var m = document.getElementById("m");
  var g = document.getElementById("g");
  var c = document.getElementById("c");

  var form = new FormData();
  form.append("f", f.value);
  form.append("l", l.value);
  form.append("e", e.value);
  form.append("p", p.value);
  form.append("m", m.value);
  form.append("g", g.value);
  form.append("c", c.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "success") {
        document.getElementById("msg").innerHTML = text;
        document.getElementById("msg").className = "bi bi-check2-circle fs-5";
        document.getElementById("alertdiv").className = "alert alert-success";
        document.getElementById("msgdiv").className = "d-block";
      } else {
        document.getElementById("msg").innerHTML = text;
        document.getElementById("msgdiv").className = "d-block";
      }
    }
  };
  request.open("POST", "createAccountProcess.php", true);
  request.send(form);
}

function logIn() {
  var email = document.getElementById("email2");
  var password = document.getElementById("password2");
  var rememberme = document.getElementById("rememberme");

  // alert(email.value);
  // alert(password.value);
  // alert(rememberme.checked);

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("r", rememberme.checked);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "Shome.php";
      } else {
      }
    }
  };

  r.open("POST", "logInProcess.php", true);
  r.send(f);
}

function logout() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "logoutProcess.php", true);
  r.send();
}

function changeImage() {
  var view = document.getElementById("viewImg"); //img tag
  var file = document.getElementById("profileimg"); //file chooser

  file.onchange = function () {
    var file1 = this.files[0];
    var url = window.URL.createObjectURL(file1);
    view.src = url;
  };
}

function SaveChanges() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var state = document.getElementById("state");
  var dist = document.getElementById("dist");
  var city = document.getElementById("city");
  var pcode = document.getElementById("pcode");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var image = document.getElementById("profileimg");
  var country = document.getElementById("country");

  // alert(fname.value);
  // alert(lname.value)
  // alert(mobile.value)
  // alert(state.value)
  // alert(dist.value)
  // alert(city.value)
  // alert(pcode.value)
  // alert(line1.value)
  // alert(line2.value)
  // alert(image.value)

  var f = new FormData();
  f.append("fn", fname.value);
  f.append("ln", lname.value);
  f.append("m", mobile.value);
  f.append("s", state.value);
  f.append("d", dist.value);
  f.append("c", city.value);
  f.append("pc", pcode.value);
  f.append("l1", line1.value);
  f.append("l2", line2.value);
  f.append("country", country.value);

  if (image.files.length == 0) {
    var conformation = confirm(
      "Are you sure You don't want to update Profile Image?"
    );

    if (conformation) {
      alert("you have not selected any image.");
    }
  } else {
    f.append("image", image.files[0]);
  }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "accSettingsProcess.php", true);
  r.send(f);
}

function createAccAnimation() {
  var accMainDiv = document.getElementById("accMain");
  accMainDiv.className = "accMainDivStyle";
}

//wishlist
function addToWishlist(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "removed") {
        document.getElementById("favorite" + id).style.classList =
          "wishlistIcon";
        window.location.reload();
      } else if (t == "added") {
        document.getElementById("favorite" + id).style.classList =
          "wishlistIcon2";
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "addToWishlistProcess.php?id=" + id, true);
  r.send();
}

function removeWishlist(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "removeWishlistProcess.php?id=" + id, true);
  r.send();
}

//Cart

function addToCart(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  };

  r.open("GET", "addToCartProcess.php?id=" + id, true);
  r.send();
}

//Remove Cart

function removeCart(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success") {
        alert("Product removed from cart");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "removeCartProcess.php?id=" + id, true);
  r.send();
}

//Quantity Select

function qtySelect(id) {
  var q = document.getElementById("qty");

  // alert(qty);
  // alert(q.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if ((t = "success")) {
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "qtySelectProcess.php?q=" + q + "&id=" + id, true);
  r.send();
}

//basic search

function basicSearch(x) {
  var text = document.getElementById("basic_search_text");

  var f = new FormData();
  f.append("t", text.value);
  f.append("page", x);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("basicSearchResult").innerHTML = t;
      $(".special.cards .image").dimmer({
        on: "hover",
      });
    }
  };

  r.open("POST", "basicSearchProcess.php", true);
  r.send(f);
}

function categorySelect(x, id) {
  // alert(id);

  var f = new FormData();
  f.append("page", x);
  f.append("c", id);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("categorySelectResult").innerHTML = t;
      $(".special.cards .image").dimmer({
        on: "hover",
      });
    }
  };

  r.open("POST", "categorySelectProcess.php", true);
  r.send(f);
}

// quantity

var minus = document.getElementById("decrease-quantity");
var q = document.getElementById("qty");
var plus = document.getElementById("increase-quantity");

// increase-quantity

plus.addEventListener("click", plusCalculate);
function plusCalculate() {
  if (document.getElementById("qty").value <= 9) {
    var q = document.getElementById("qty").value;
    q++;
    document.getElementById("qty").value = q++;
  }
}

// decrease-quantity

minus.addEventListener("click", minusCalculate);
function minusCalculate() {
  if (document.getElementById("qty").value >= 1) {
    var q = document.getElementById("qty").value;
    q--;
    document.getElementById("qty").value = q--;
  }
}

// Slideshow Product
var slideIndex = 1;
showSlides(slideIndex);

//Next/previous controls
function plusSlides(n) {
  showSlides((slideIndex += n)); //slideIndex = slideIndex + n
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }

  if (n < 1) {
    slideIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

function forgotPassword() {
  var email = document.getElementById("email2").value;

  alert(email);
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "success") {
        window.location = "fogotPassword.php?email=" + email;
      } else {
        alert(response);
      }
    }
  };
  request.open("GET", "sendEmailCodeProcess.php?email=" + email, true);
  request.send();
}

function reset(email) {
  alert(email);
  var password = document.getElementById("password").value;
  var repassword = document.getElementById("rePassword").value;
  var code = document.getElementById("code").value;

  var form = new FormData();
  form.append("email", email);
  form.append("password", password);
  form.append("repassword", repassword);
  form.append("code", code);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "success") {
        window.location = "index.php";
      } else {
        alert(response);
      }
    }
  };
  request.open("POST", "resetPasswordProcess.php", true);
  request.send(form);
}

function sendCode() {
  var email = document.getElementById("email").value;

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "success") {
        document.getElementById("code").className = "codev";
        document.getElementById("log").className = "logv";
        document.getElementById("view").className = "viewC";
        document.getElementById("viewx").className = "viewxC";
      } else {
        alert(response);
      }
    }
  };
  request.open("GET", "sendAdminEmailCodeProcess.php?email=" + email, true);
  request.send();
}

function adminLogin() {
  var email = document.getElementById("email").value;
  var code = document.getElementById("codex").value;

  var form = new FormData();
  form.append("email", email);
  form.append("code", code);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "success") {
        window.location = "./Admin/admin/adminHome.php";
      } else {
        alert(response);
      }
    }
  };
  request.open("POST", "adminLoginProcess.php", true);
  request.send(form);
}

function click() {
  window.location = "sHome.php";
}
