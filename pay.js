// function payNow(id, cid){
//   var request = new XMLHttpRequest();
//   request.onreadystatechange = function () {
//     if (request.readyState == 4 && request.status == 200) {
//       var response = request.responseText;
//       var responseObj = JSON.parse(response);
//       var amount = responseObj["amount"];
//       var mail = responseObj["uemail"];

//       // Payment completed. It can be a successful failure.
//       payhere.onCompleted = function onCompleted(orderId) {
//         saveInvoice(orderId, amount, mail, id, cid);
//         console.log("Payment completed. OrderID:" + orderId);
//         // Note: validate the payment and show success or failure page to the customer
//       };

//       // Payment window closed
//       payhere.onDismissed = function onDismissed() {
//         // Note: Prompt user to pay again or show an error page
//         // console.log("Payment dismissed");
//         alert("ok12");
//       };

//       // Error occurred
//       payhere.onError = function onError(error) {
//         // Note: show an error page
//         console.log("Error:" + error);
//       };

//       // Put the payment variables here
//       var payment = {
//         sandbox: true,
//         merchant_id: responseObj["merchant_id"], // Replace your Merchant ID
//         return_url:
//           "http://localhost/vnytechnologies/singleProductView.php?id" + id, // Important
//         cancel_url:
//           "http://localhost/vnytechnologies/singleProductView.php?id" + id, // Important
//         notify_url: "http://sample.com/notify",
//         order_id: responseObj["order_id"],
//         items: responseObj["items"],
//         amount: amount,
//         currency: responseObj["currency"],
//         hash: responseObj["hash"], // *Replace with generated hash retrieved from backend
//         first_name: responseObj["fname"],
//         last_name: responseObj["lname"],
//         email: responseObj["uemail"],
//         phone: responseObj["mobile"],
//         address: responseObj["address"],
//         city: responseObj["city"],
//         country: responseObj["country"],
//         delivery_address: responseObj["address"],
//         delivery_city: responseObj["city"],
//         delivery_country: responseObj["country"],
//         custom_1: "",
//         custom_2: "",
//       };
//       payhere.startPayment(payment);
//     }
//   };
//   request.open("GET", "buyNowProcess.php?id=" + id , true);
//   request.send();
// }

function payNow(){
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      var responseObj = JSON.parse(response);
      var amount = responseObj["amount"];
      var mail = responseObj["uemail"];

      // Payment completed. It can be a successful failure.
      payhere.onCompleted = function onCompleted(orderId) {
        alert("Payment completed. OrderID:" + orderId);
        saveInvoice(orderId, amount, mail);
        // Note: validate the payment and show success or failure page to the customer
      };

      // Payment window closed
      payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        // console.log("Payment dismissed");
        alert("ok12");
      };

      // Error occurred
      payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
      };

      // Put the payment variables here
      var payment = {
        sandbox: true,
        merchant_id: responseObj["merchant_id"], // Replace your Merchant ID
        return_url:
          "http://localhost/vnytechnologies/sHome.php", // Important
        cancel_url:
          "http://localhost/vnytechnologies/sHome.php", // Important
        notify_url: "http://sample.com/notify",
        order_id: responseObj["order_id"],
        items: responseObj["items"],
        amount: amount,
        currency: responseObj["currency"],
        hash: responseObj["hash"], // *Replace with generated hash retrieved from backend
        first_name: responseObj["fname"],
        last_name: responseObj["lname"],
        email: responseObj["uemail"],
        phone: responseObj["mobile"],
        address: responseObj["address"],
        city: responseObj["city"],
        country: responseObj["country"],
        delivery_address: responseObj["address"],
        delivery_city: responseObj["city"],
        delivery_country: responseObj["country"],
        custom_1: "",
        custom_2: "",
      };
      payhere.startPayment(payment);
    }
  };
  request.open("GET", "buyNowProcess.php" , true);
  request.send();
}


function saveInvoice(orderId, amount, mail) {
  var jsObj = {
    orderId: orderId,
    total: amount,
    email: mail,
  };
  var form = new FormData();
  form.append("requestobj", JSON.stringify(jsObj));

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "success") {
        window.location = "invoice.php?id=" + orderId;
      }
    }
  };

  request.open("POST", "saveInvoice.php", true);
  request.send(form);
}

function printInvoice() {
  var body = document.body.innerHTML;
  var page = document.getElementById("page").innerHTML;
  document.body.innerHTML = page;
  window.print();
  document.body.innerHTML = body;

}