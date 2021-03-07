
document.getElementById("cancelButton").onclick = function () {
    location.href = "../index.php";
};

const formSelect = document.querySelector('.categoryName');
formSelect.addEventListener('change', changePage);

function getProductType(type) {
  let products = {
    'Furniture': 'furniturePage.php',
    'Book': 'bookPage.php',
    'Dvd': 'dvdPage.php',
    'default': 'Something went wrong'
  };
  return products[type] || products['default'];
}

function changePage(event) {
  const chosenType = event.target.value;
  const prodType = getProductType(chosenType);
  loadProductPage(prodType);
}

function loadProductPage(page) {
    var ajaxRequest;
    try{
       // Opera 8.0+, Firefox, Safari
       ajaxRequest = new XMLHttpRequest();
     }catch (e){
       // Internet Explorer Browsers
       try{
          ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
       }catch (e) {
          try{
              ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
          }catch (e){
              console.log(e.message);
              return false;
          }
       }
     }
     ajaxRequest.onreadystatechange = function(){
       if(ajaxRequest.readyState == 4){
          var ajaxDisplay = document.getElementById('card');
          ajaxDisplay.innerHTML = ajaxRequest.responseText;
       }
     }
     ajaxRequest.open("GET", page, true);
     ajaxRequest.send(null);
}
//source: http://www.tutorialspoint.com/ajax/ajax_quick_guide.htm;

(function () {
  'use strict'

  var forms = document.querySelectorAll('.addProductForm')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

//source: https://getbootstrap.com/docs/5.0/forms/validation/#custom-styles
