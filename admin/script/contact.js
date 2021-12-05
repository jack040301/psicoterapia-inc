/*
  Prepared by BSCS3A
  Credits to our Programmers
  Ba-Alan, Nikkie
  Briol, Jeffrix
  Caberto, Alexander
  Cabullo, Danica
  Espinola, Demverleen
  Porral, Jacqueline jackyutkyut
*/
const phoneInputField = document.querySelector("#contact");
const phoneInput = window.intlTelInput(phoneInputField,{
  initialCountry: "ph",
  preferredCountries: ["ph", "us"],
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

/* Thank you and Have a good day */
