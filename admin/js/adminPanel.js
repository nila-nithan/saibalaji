//login form
$(document).ready(function () {
  $('#logInForm').submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: './api/login.php',
      data: formData,
      dataType: 'json',
      success: function (response) {
        console.log('Server response:', response);
        if (response.status == true) {
          console.log('Login successful');
          window.location.href = 'index.php';
        } else {
          console.log('Login failed');
          alert('Login failed. Please try again.');
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  });
});
// ---------------------category----------------------
//add category
$('#add_cat').on('submit', '#add_category', function (e) {
  e.preventDefault();
  if (formSubmitting) {
    return; // return early if form is already being submitted
  }
  formSubmitting = true;
  var form = $(this)[0];
  var dataform = new FormData(form);
  console.log(dataform);
  $.ajax({
    type: "post",
    url: './api/category_creat.php',
    data: dataform,
    cache: false,
    contentType: false,
    encetype: "multipart/form-data",
    processData: false,
    beforeSend: function () {
      $("#cat_btn").prop('disabled', true); // disable button
      $("#cat_btn").text("Uploading Please Wait...");
    },
    success: function (response) {
      if (response == 1) {
        swal("", "New Record Added.", "success");
        $("#cat_btn").prop('disabled', false); // disable button
        $("#add_category").trigger("reset");
        $("#cat_btn").text("Submit");
      }
      if (response == 0) {
        swal("", "Something is wrong please try again.", "warning");
        $("#cat_btn").prop('disabled', false); // disable button
        $("#cat_btn").text("Submit");
      }
    },
  });
});
//edit category
$('#update_cats').on('submit', '#update_categorys', function (e) {
  e.preventDefault();
  if (formSubmitting) {
    return; // return early if form is already being submitted
  }
  formSubmitting = true;
  var form = $(this)[0];
  var dataform = new FormData(form);
  console.log(dataform);
  $.ajax({
    type: "post",
    url: './api/category_update.php',
    data: dataform,
    cache: false,
    contentType: false,
    encetype: "form-data",
    processData: false,
    beforeSend: function () {
      $("#attr_btn").prop('disabled', true); // disable button
      $("#attr_btn").text("Uploading Please Wait...");
    },
    success: function (response) {
      if (response == 1) {
        swal("", "New Record updated.", "success");
        $("#attr_btn").prop('disabled', false); // disable button
        $("#add_cats").trigger("reset");//after submite form values clear
        $("#attr_btn").text("Submit");
        location.replace(location.href);
      }
      if (response == 0) {
        swal("", "Something is wrong please try again.", "warning");
        $("#attr_btn").prop('disabled', false); // disable button
        $("#attr_btn").text("Submit");
      }
    },
  });
});
  //     deletecategory
  $(document).on("click", ".delete-category", function () {
    if (confirm("Do you really want to delete this record ? ")) {
      var id = $(this).attr('id');
      // alert(id); 
      $.ajax({
        url: './api/category_delete.php',
        method: 'GET',
        data: { id: id },
        dataType: 'json',
        success: function (response) {
          if (response == 1) {
            swal("", "Record Deleted.", "success");
              location.reload(true);
          }
        },
      });
    }
  });
  // ----------------product add--------------------------------------
  $(document).ready(function(e){
    // Submit form data via Ajax
    $("#add_product").on('submit', function(e){
        e.preventDefault();
        if (formSubmitting) {
          return; // return early if form is already being submitted
        }
      
        formSubmitting = true;
        $.ajax({
            type: 'POST',
            url:  './api/product_creat.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#add_product').css("opacity",".5");
            },
            success: function(response){
                $('.statusMsg').php('');
                if(response.status == 1){
                    $('#add_product')[0].reset();
                    $('.statusMsg').php('<p class="alert alert-success">'+response.message+'</p>');
                    swal("", "product added.", "success");
                      location.reload(true);
                }else{
                    $('.statusMsg').php('<p class="alert alert-danger">'+response.message+'</p>');
                    swal("", "product added.", "failed");
                }
                $('#add_product').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});
// ----------------product update--------------------------------------
$(document).ready(function(e){
  $("#updateProduct").on('submit', function(e){
      e.preventDefault();
      $.ajax({
          type: 'POST',
          url:  './api/product_update.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
              $('.submitBtn').attr("disabled","disabled");
              $('#updateProduct').css("opacity",".5");
          },
          success: function(response){
              $('.statusMsg').php('');
              if(response.status == 1){
                  $('#updateProduct')[0].reset();
                  $('.statusMsg').php('<p class="alert alert-success">'+response.message+'</p>');
                  swal("", "product updated.", "success");
                    // location.reload(true);
              }else{
                  $('.statusMsg').php('<p class="alert alert-danger">'+response.message+'</p>');
                  swal("", "product updated.", "failed");
              }
              $('#updateProduct').css("opacity","");
              $(".submitBtn").removeAttr("disabled");
          }
      });
  });
});
// ----------------product delete--------------------------------------
$(document).ready(function(e){
  $("#updateProduct").on('submit', function(e){
      e.preventDefault();
      if (formSubmitting) {
        return; // return early if form is already being submitted
      }
    
      formSubmitting = true;
      $.ajax({
          type: 'POST',
          url:  './api/product_update.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData:false,
          beforeSend: function(){
              $('.submitBtn').attr("disabled","disabled");
              $('#updateProduct').css("opacity",".5");
          },
          success: function(response){
              $('.statusMsg').php('');
              if(response.status == 1){
                  $('#updateProduct')[0].reset();
                  $('.statusMsg').php('<p class="alert alert-success">'+response.message+'</p>');
                  swal("", "product updated.", "success");
                    location.reload(true);
              }else{
                  $('.statusMsg').php('<p class="alert alert-danger">'+response.message+'</p>');
                  swal("", "product updated.", "failed");
              }
              $('#updateProduct').css("opacity","");
              $(".submitBtn").removeAttr("disabled");
          }
      });
  });
});
//------------delete product------------------------
$(document).on("click", ".delete_category", function () {
  if (confirm("Do you really want to delete this record ? ")) {
    var id = $(this).data("id");
    var obj = { id: id };
    var myJSON = JSON.stringify(obj);
    var row = this;
    $.ajax({
      url:  './api/product_delete.php',
      type: "POST",
      data: myJSON,
      success: function (response) {
        if(response.status == 1){
          swal("", "Record Deleted.", "success");
            location.reload(true);
        }
      },
    });
  }
}); 
  // ----------------add_banner add--------------------------------------
//   $(document).ready(function(e){
//     // Submit form data via Ajax
//     $("#add_banner").on('submit', function(e){
//       // $('#add_bnr').on('submit', '#add_banner', function (e) {
//         e.preventDefault();
//         $.ajax({
//             type: 'POST',
//             url:  './api/banner_creat.php',
//             data: new FormData(this),
//             dataType: 'json',
//             contentType: false,
//             cache: false,
//             processData:false,
//             beforeSend: function(){
//                 $('.submitBtn').attr("disabled","disabled");
//                 $('#add_banner').css("opacity",".5");
//             },
//             success: function(response){
//                 if(response.status == 1){
//                     $('#add_banner')[0].reset();
//                     swal("", "Banner added.", "success");
//                       // location.reload(true);
//                 }else{
//                     swal("", "Banner added.", "failed");
//                 }
//                 $('#add_banner').css("opacity","");
//                 $(".submitBtn").removeAttr("disabled");
//             }
//         });
//     });
// });
var formSubmitting = false;

$('#add_bnr').on('submit', '#add_banner', function (e) {
  e.preventDefault();

  if (formSubmitting) {
    return; // return early if form is already being submitted
  }

  formSubmitting = true;

  var form = $(this)[0];
  var dataform = new FormData(form);
  console.log(dataform);

  $.ajax({
    type: "post",
    url: './api/banner_creat.php',
    data: dataform,
    cache: false,
    contentType: false,
    encetype: "form-data",
    processData: false,
    beforeSend: function () {
      $("#cat_btn").prop('disabled', true); // disable button
      $("#cat_btn").text("Uploading Please Wait...");
    },
    success: function (response) {
      if (response.status == 'success') {
        swal("", "New Record Added.", "success");
        $("#add_banner").trigger("reset"); // after submit form values clear
      } else {
        swal("", "Something is wrong please try again.", "warning");
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    },
    complete: function() {
      formSubmitting = false;
      $("#cat_btn").prop('disabled', false); // re-enable button
      $("#cat_btn").text("Submit");
    }
  });
});

//------------delete banner------------------------
$(document).on("click", ".delete_banner", function () {
  
    var id = $(this).data("id");
    var obj = { id: id };
    var myJSON = JSON.stringify(obj);
    var row = this;
    $.ajax({
      url:  './api/banner_delete.php',
      type: "POST",
      data: myJSON,
      success: function (response) {
        if(response.status == 1){
          swal("", "Record Deleted.", "success");
            location.reload(true);
        }
      },
    });
  
}); 
 
 // ----------------admin password edit--------------------------------------
//chnage password
$('#chng_pass').on('submit', '#change_pass', function (e) {
  e.preventDefault();
  var form = $(this)[0];
  var dataform = new FormData(form);
  console.log(dataform);
  $.ajax({
    type: "post",
    url: './api/change_password.php',
    data: dataform,
    cache: false,
    contentType: false,
    encetype: "form-data",
    processData: false,
    beforeSend: function () {
      $("#update-vndr_btn").prop('disabled', true); // disable button
      $("#update-vndr_btn").text("Uploading Please Wait...");
    },
    success: function (response) {
      if (response == 1) {
        swal("", "Password Changed.", "success");
        $("#btn-chng_pass").prop('disabled', false); // disable button
        $("#change_pass").trigger("reset");//after submite form values clear
        $("#btn-chng_pass").text("Submit");
      }
      if (response == 0) {
        swal("", "Old password is wrong please try again.", "warning");
        $("#btn-chng_pass").prop('disabled', false); // disable button
        $("#btn-chng_pass").text("Submit");
      }
    },
  });
});
//shipping status button click
$(document).on('click', '.ShipingStatus', function (e) {
  e.preventDefault();
  var order_id = $(this).attr('id');
  // alert(order_id);
  $.ajax({
    url: '../ajax/delivery_status.php',
    method: 'GET',
    data: { order_id: order_id },
    dataType: 'json',
    success: function (response) {
      console.log(response);
      if (response.status == 'success') {
        swal("", "This Product Shipping.", "success");
        location.replace('processing.php');
        // location.reload(); // reload the page if the response status is 'success'
      } else {
        console.log('Error:', response.message);
      }
    },
  });
}
);
//shipping status button click
$(document).on('click', '.DeliveryStatus', function (e) {
  e.preventDefault();
  var order_id = $(this).attr('id');
  // alert(order_id);
  $.ajax({
    url: '../ajax/delivery_status.php',
    method: 'GET',
    data: { id: order_id },
    dataType: 'json',
    success: function (response) {
      console.log(response);
      if (response.status == 'success') {
        swal("", "This Product Delivered.", "success");
        location.replace('shipping.php');
        // location.reload(); // reload the page if the response status is 'success'
      } else {
        console.log('Error:', response.message);
      }
    },
  });
}
);