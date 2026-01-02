const prices = [47, 18, 13, 8];
// const spans;
// const images;
// const checkboxes;
// const checkout_btn;
// const credit_para;
// const coupon_box;
let credit = 20;

// Put the prices in the spans
for (let i = 0; i < 4; ++i) {
  document.getElementsByTagName("span")[i].innerHTML = `$${prices[i].toFixed(
    2
  )}`;
}

// Add 6 (4 + 2) event listeners.
//FOR IMAGE CLICK --> CHECKBOX
function check_uncheck(i) {
  //disable_enable from lecture
  const checkbox = document.getElementsByTagName("input")[i];
  checkbox.checked = !checkbox.checked;
}
for (let i = 0; i < 4; ++i) {
  let imgListen = document.getElementsByTagName("img")[i];
  imgListen.addEventListener("click", function () {
    if (document.getElementsByTagName("input")[i].disabled === false) {
      check_uncheck(i);
    }
  });
}
//FOR COUPON
couponBox.addEventListener("keypress", function (e) {
  if (e.key === "Enter") {
    validate_coupon_code(document.getElementById("couponBox").value);
    document.getElementById("couponBox").value = "";
  }
});
//FOR CHECKOUT
checkoutButton.addEventListener("click", function (e) {
  validate_coupon_code(document.getElementById("couponBox").value);
  sales_total(prices);
  document.getElementById("couponBox").value = "";
});

function update_credit() {
  document.getElementsByTagName(
    "p"
  )[1].innerHTML = `Your credit: $${credit.toFixed(2)}`;
}
window.onload = update_credit;

function validate_coupon_code(code) {
  let all_unchecked = true;
  for (let p = 0; p < 4; ++p) {
    if (document.getElementsByTagName("input")[p].checked === true) {
      all_unchecked = false;
    }
  }
  if (all_unchecked === true) {
    //if no boxes are checked
    document.getElementById("bottomP").innerHTML = ``;
  }

  if (code === "COUPON5") {
    credit += 5;
    update_credit();
  } else if (code === "COUPON10") {
    credit += 10;
    update_credit();
  } else if (code === "COUPON20") {
    credit += 20;
    update_credit();
  } else if (code !== "COUPON5" || code !== "COUPON10" || code !== "COUPON20") {
    document.getElementById("couponBox").value = "";
  }
}

function sales_total(arr) {
  //pass in prices arr
  // Calculate the price from only the checked checkboxes
  let total = 0;
  for (let i = 0; i < 4; ++i) {
    if (document.getElementsByTagName("input")[i].checked === true) {
      //console.log(arr[i]);
      total += arr[i];
    }
  }

  // Calculate the price with tax
  let preTaxTotal = total.toFixed(2);
  total = total * 1.0725;
  (function (num) {
    //rounding
    let numFixed = num.toFixed(3);
    if (numFixed.at(-1) === 5) {
      //if the 3rd decimal place is 5
      if (numFixed.at(-2) % 2 === 0) {
        //if the cent number (2nd decimal place) is even
        total = numFixed - 0.005;
      } //round down
      else if (numFixed.at(-2) % 2 === 1) {
        //if the cent number is odd
        //if the cent number is odd
        total = numFixed + 0.005;
      } //round up
    }
  })(total);

  // Check if you have insufficient credit
  if (total > credit) {
    alert("You do not have enough credit.");
    document.getElementById("bottomP").innerHTML = ``;
  }
  // Otherwise
  else if (total > 0 && total <= credit) {
    // Update the message in the bottom <p> element.
    document.getElementById(
      "bottomP"
    ).innerHTML = `   $${preTaxTotal}<br>+ sales tax (7.25%)<br>= $${total.toFixed(
      2
    )}`;
    //Update credit
    credit -= total;
    update_credit();
    //Disable checked checkboxes
    for (let j = 0; j < 4; ++j) {
      if (document.getElementsByTagName("input")[j].checked === true) {
        //console.log(arr[i]);
        document.getElementsByTagName("input")[j].checked = false;
        document.getElementsByTagName("input")[j].disabled = true;
      }
    }
  }
  // Also, check if there are no checked boxes (no displayed message).
  else if (total === 0) {
    document.getElementById("bottomP").innerHTML = ``;
  }
}
