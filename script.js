function submitForm() {
  const termsAccepted = document.getElementById("terms").checked;
  if (termsAccepted) {
    window.location.href = "servicios.html";
  } else {
    alert("No acepto los términos de nuestro servicio");
  }
}

function adminLogin() {
  window.location.href = "admin_login.html";
}
