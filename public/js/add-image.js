$(document).ready(function() {

  $("#fileUpload").change(function(){
    updatePlacholder(this);
  });

  $("#fileUpload2").change(function(){
    updatePlacholder2(this);
  });



  // file upload
  function updatePlacholder(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('.image-placeholder').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  function updatePlacholder2(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('.image-placeholder2').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

})