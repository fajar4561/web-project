
function showHide() {
    let type = $("input#password,input#konfirmasiPassword").attr("type");
    if(type == "password") {
      $("input#password,input#konfirmasiPassword").attr("type", "text");
    }
    else {
      $("input#password,input#konfirmasiPassword").attr("type", "password");
    }
}

function confirmPassword() {
  let password    = $("input#password").val();
  let konfirmPass = $("input#konfirmasiPassword").val();

  if(konfirmPass !== password) {
    $("input#konfirmasiPassword").addClass("is-invalid");
    $("button[name=btn_simpan]").attr("disabled", "");
  }
  else {
    $("input#konfirmasiPassword").removeClass("is-invalid");
    $("button[name=btn_simpan]").removeAttr("disabled", "");
    confirmPassword2();
  }
}

function confirmPassword2() {
  $("input#password").on("keyup", function() {
    let password2    = $(this).val();
    let konfirmPass2 = $("input#konfirmasiPassword").val();

    if(password2 !== konfirmPass2) {
      $("input#konfirmasiPassword").addClass("is-invalid");
      $("button[name=btn_simpan]").attr("disabled", "");
    }
    else {
      $("input#konfirmasiPassword").removeClass("is-invalid");
      $("button[name=btn_simpan]").removeAttr("disabled", "");
    }
  });
}