document.addEventListener("DOMContentLoaded", function () {
  const registrationForm = document.getElementById("registration-form");

  registrationForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const nama = document.getElementById("nama").value;
    const email = document.getElementById("email").value;
    const alamat = document.getElementById("alamat").value;

    if (nama === "" || email === "" || alamat === "") {
      alert("Anda harus mengisi data dengan lengkap !");
    } else {
      alert("Pendaftaran berhasil!");
      registrationForm.reset();
    }
  });
});
