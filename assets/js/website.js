//--------------------category------------------------
$(document).ready(function () {
  load_json_data('category');
  function load_json_data(id) {
    var html_code = '';
    $.getJSON('admin/api/category_read.php', function (data) {
      if (data.status === 'success') {
        html_code += '<option >Select a category </option>';
        $.each(data.categories, function (key, value) {
          html_code += '<option id="' + value.id + '" value="' + value.name + '">' + value.name + '</option>';
        });
        $('#' + id).html(html_code);
      } else {
        console.log(data.message);
      }
    });
  }
});
//--------------------Allcategory------------------------
$(document).ready(function () {
  load_json_data('allcategory');
  function load_json_data(id) {
    var html_code = '';
    $.getJSON('admin/api/category_read.php', function (data) {
      if (data.status === 'success') {
        html_code += '<li></i>';
        $.each(data.categories, function (key, value) {
          // console.log(value.id);
          html_code += '<li value="' + value.id + '"><a href="shop.php?name=' + value.name + '">' + value.name + '</a></li>';
        });
        $('#' + id).html(html_code);
      } else {
        console.log(data.message);
      }
    });
  }
});
//--------------------cart count------------------------
$(document).ready(function () {
  load_json_data('cartCount');
  function load_json_data(id) {
    var html_code = '';
    $.getJSON('admin/api/cart_view.php', function (data) {
      // console.log(data);
      if (data.status === true) {
        html_code += '<span></span>';
        $.each(data.categories, function (key, value) {
          html_code += '<span>' + value.itemCount + '</span>';
        });
        $('#' + id).html(html_code);
      } else {
        console.log(data.message);
      }
    });
  }
});
//--------------customer register--------------------------------------
$(document).ready(function (e) {
  // Submit form data via Ajax
  $("#registerForm").on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'admin/api/customer_creat.php',
      data: new FormData(this),
      dataType: 'json',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('.statusMsg').empty();
        if (response.status == 'success') {
          alert('successfully registered');
          swal("successfully registered", {
            icon: "success",
          });
          location.reload(true);
        } else if (response.status == 'emailError') {
          alert('Email already exists');
        } else if (response.status == 'PhoneError') {
          alert('Phone number already exists.');
        } else {
          $('.statusMsg').html('<p class="alert alert-danger">' + response.message + '</p>');
          swal("", "Customer Register failure.", "failed");
        }
        $('#add_product').css("opacity", "");
        $(".submitBtn").removeAttr("disabled");
      }

    });
  });
});
// ----------------customer login--------------------------------------
$(document).ready(function (e) {
  // Submit form data via Ajax
  $("#customerLogin").on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'admin/api/customerLogin.php',
      data: new FormData(this),
      dataType: 'json',
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $('.submitBtn').attr("disabled", "disabled");
        $('#add_product').css("opacity", ".5");
      },
      success: function (response) {
        if (response.status == true) {
          swal({
            title: "LOGED IN",
            text: "login successfully! welcome Dear " + response.data.customerName,
            icon: "success",
          }).then(function () {
            window.location.href = 'index.php';
          });

        } else if (response.status == false) {
          swal("", "Invalid EMAIL or PASSWORD.", "info");
        }
        $('#add_product').css("opacity", "");
        $(".submitBtn").removeAttr("disabled");
      }

    });
  });
});
//add to cart 
$(document).on('click', '.add-to-cart', function (event) {
  event.preventDefault();
  var product_id = $(this).data('product-id');
  $.ajax({
    url: 'admin/api/cart_add.php',
    method: 'POST',
    data: { product_id: product_id },
    success: function (response) {
      if (response.status == true) {
        swal({
          title: "ADD TO CART!",
          text: "add-to-cart successfully!",
          icon: "success",
        }).then(function () {
          // window.location.href = 'cart.php';
          location.replace(location.href);
        });
      } else {
        alert('Failed to add product to cart');
      }
    }
  });
});
//add to cart in product details page
$(document).on('click', '.add-to-cart-product', function (event) {
  event.preventDefault();
  var product_id = $(this).data('product-id');
  var quantity = $('input[name="quantity"]').val();
  $.ajax({
    url: 'admin/api/cart_add.php',
    method: 'POST',
    data: { product_id: product_id, quantity: quantity },
    success: function (response) {
      if (response.success = "true") {
        alert('successfully add product to cart');
        window.location.href = 'cart.php';
      } else {
        alert('Failed to add product to cart');
      }
    }
  });
});
//update-to-cart
$(document).on('click', '.update-to-cart', function (event) {
  event.preventDefault();
  var product_id = $(this).data('product-id');
  var quantity = $(this).parent().find('input[name="quantity"]').val();
  $.ajax({
    url: 'admin/api/cart_update.php',
    method: 'POST',
    data: { product_id: product_id, quantity: quantity },
    success: function (response) {
      if (response.status = true) {
        swal('successfully update product to cart')
          .then(function () {
            window.location.href = 'cart.php';
          });
      } else {
        swal('Failed to update product to cart');
      }
    }
  });
});
//delete-to-cart
$(document).on('click', '.deleteCart', function (event) {
  event.preventDefault();
  if (confirm("Do you really want to delete this record ? ")) {
    var product_id = $(this).data('product-id');
    $.ajax({
      url: 'admin/api/cart_delete.php',
      method: 'POST',
      data: { product_id: product_id },
      success: function (response) {
        if (response.success = true) {
          // alert('successfully delete product to cart');
          window.location.href = 'cart.php';
          swal("successfully delete product to cart");
        } else {
          alert('Failed to delete product to cart');
        }
      }
    });
  }
});
// ----------------customer ADDRESS creat--------------------------------------
$(document).ready(function (e) {
  // Submit form data via Ajax
  $("#creteAddress").on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'admin/api/customerAddress_creat.php',
      data: new FormData(this),
      dataType: 'json',
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $('.submitBtn').attr("disabled", "disabled");
        $('#add_product').css("opacity", ".5");
      },
      success: function (response) {
        if (response.status == 'success') {
          $('#creteAddress')[0].reset();
          alert('successfully registered');
          swal("successfully registered", {
            icon: "success",
          });
          location.reload(true);
        } else if (response.status == 'failure') {
          alert('failed to registered');

          // $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
          // swal("", "Customer Register failure.", "failed");
        }
        $('#add_product').css("opacity", "");
        $(".submitBtn").removeAttr("disabled");
      }

    });
  });
});
// ----------------customer address update--------------------------------------
$(document).ready(function (e) {
  // Submit form data via Ajax
  $("#updateAddress").on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'admin/api/customerAddress_update.php',
      data: new FormData(this),
      // dataType: 'json',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == 'success') {
          swal({
            title: "UPDATE!",
            text: "You clicked the button!",
            icon: "success",
            onClose: function () {
              location.replace(location.href);
            }
          });
        } else if (response.status == 'failure') {
          swal("", "UPDATE.", "failure");

          // $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
          // swal("", "Customer Register failure.", "failed");
        }
        $('#add_product').css("opacity", "");
        $(".submitBtn").removeAttr("disabled");
      }

    });
  });
});
// ----------------payment --------------------------------------
$(document).on('click', '#payment', function (e) {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: 'admin/api/payment.php',
    data: new FormData(this),
    dataType: 'json',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      debugger
      if (response.status == true) {
        swal({
          title: "ORDER PLACED!",
          text: "Check Profile order!",
          icon: "success",
        }).then(function () {
          window.location.href = 'shop.php';
        });
      } else {
        swal({
          title: "ORDER NOT PLACED!",
          text: "pAYMENT ISSUE failure!",
          icon: "info",
        });
      }
      $('#add_product').css("opacity", "");
      $(".submitBtn").removeAttr("disabled");
    }

  });
});
//logout 
$(document).on('click', '.logout', function (event) {
  event.preventDefault();

  $.ajax({
    url: 'logout.php',
    method: 'POST',
    success: function (response) {
      if (response.status == true) {
      } else {
        swal({
          title: "LOGOUT!",
          text: "logout successfully!",
          icon: "success",
        }).then(function () {
          window.location.href = 'index.php';
        });
      }
    }
  });
});
//otp form
document.addEventListener("DOMContentLoaded", function (event) {

  function OTPInput() {
    const inputs = document.querySelectorAll('#otp > *[id]');
    for (let i = 0; i < inputs.length; i++) { inputs[i].addEventListener('keydown', function (event) { if (event.key === "Backspace") { inputs[i].value = ''; if (i !== 0) inputs[i - 1].focus(); } else { if (i === inputs.length - 1 && inputs[i].value !== '') { return true; } else if (event.keyCode > 47 && event.keyCode < 58) { inputs[i].value = event.key; if (i !== inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode > 64 && event.keyCode < 91) { inputs[i].value = String.fromCharCode(event.keyCode); if (i !== inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); }
  } OTPInput();
});
//otp ajax
$(document).ready(function () {
  $(".validate").click(function () {
    var otp = $("#first").val() + $("#second").val() + $("#third").val() + $("#fourth").val() + $("#fifth").val() + $("#sixth").val();
    var email = $("input[name='email']").val();
    $.ajax({
      url: 'admin/api/verify_otp.php',
      method: 'POST',
      data: { otp: otp, email: email },
      success: function (response) {
        if (response.status = true) {
          swal({
            title: "OTP!",
            text: "OTP MATCH, successfully!",
            icon: "success",
          }).then(function () {
            window.location.href = 'resetpassword.php';
          });
        } else {
          swal({
            title: "OTP!",
            text: "OTP NOT MATCH successfully!",
            icon: "info",
          });
        }
      }
    });
  });
});
//reset password
$(document).ready(function () {
  $('.resetpin').click(function (e) {
    e.preventDefault();
    var email = $('#email').val();
    var password = $('#password').val();
    console.log(password);
    $.ajax({
      type: 'POST',
      url: 'admin/api/resetpassword.php',
      data: {
        email: email,
        password: password
      },
      success: function (response) {
        console.log(response);
        if (response.status == true) {
          swal({
            title: "PASSWORD RESET!",
            text: "RESET successfully!",
            icon: "success",
          }).then(function () {
            window.location.href = 'index.php';
          });
        } else {
          swal({
            title: "PASSWORD RESET!",
            text: "RESET failure!",
            icon: "info",
          });
        }
      }
  });
});
});


