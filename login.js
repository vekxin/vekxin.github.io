function validate_username(username) {
  //[0]
  let isAtLeast5 = [false, "Username must be 5 characters or longer. \n"];
  //[1]
  let isShorterThan40 = [false, "Username cannot exceed 40 characters. \n"];
  //[2]
  let noSpaces = [false, "Username cannot contain spaces. \n"];
  //[3]
  let noCommas = [false, "Username cannot contain commas. \n"];
  //[4]
  let noSemicolons = [false, "Username cannot contain semicolons. \n"];
  //[5]
  let noEqualSigns = [false, "Username cannot contain =. \n"];
  //[6]
  let noAmpersand = [false, "Username cannot contain &. "];

  let checklist = [
    isAtLeast5,
    isShorterThan40,
    noSpaces,
    noCommas,
    noSemicolons,
    noEqualSigns,
    noAmpersand,
  ];

  if (username.length >= 5) {
    isAtLeast5[0] = true;
  }
  if (username.length <= 40) {
    isShorterThan40[0] = true;
  }
  if (username.indexOf(" ") === -1) {
    noSpaces[0] = true;
  }
  if (username.indexOf(",") === -1) {
    noCommas[0] = true;
  }
  if (username.indexOf(";") === -1) {
    noSemicolons[0] = true;
  }
  if (username.indexOf("=") === -1) {
    noEqualSigns[0] = true;
  }
  if (username.indexOf("&") === -1) {
    noAmpersand[0] = true;
  }

  let errorMSG = "";
  for (let p = 0; p < 7; p++) {
    if (checklist[p][0] === false) {
      errorMSG += checklist[p][1];
    }
  }

  if (errorMSG === "") {
    //if there are no current errors
    let charCheck =
      "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^*()-_+[]{}:'|`~<.>/?";
    let charCheckBool = true;
    for (let q = 0; q < username.length; q++) {
      if (charCheck.indexOf(username.at(q)) === -1) {
        // if the character of username.at(q) doesn't exist in the character list, make bool false
        charCheckBool = false;
        break;
      }
    }

    if (charCheckBool === false) {
      errorMSG =
        "Username can only use characters from the following string:\nabcdefghijklmnopqrstwxyz\nABCDEFGHIJKLMNOPQRSTUVWXYZ\n0123456789\n!@#$%^*()-_+[]{}:'|`~<.>/?";
      alert(errorMSG);
    } else if (charCheckBool === true) {
      //errorMSG = `The username ${username} is acceptable.`;
      document.cookie = `username=${username}; expires=${hour_in_future()}`;
      //window.location.assign("login.php");
    }
  } else if (errorMSG !== "") {
    alert(errorMSG);
  }
}
function hour_in_future() {
  let hour_in_future = new Date();
  hour_in_future.setMinutes(hour_in_future.getMinutes() + 60);
  return hour_in_future.toUTCString();
}

Login.addEventListener("click", function (e) {
  validate_username(document.getElementById("UserID").value);
});

UserID.addEventListener("keypress", function (e) {
  if (e.key === "Enter") {
    validate_username(document.getElementById("UserID").value);
  }
});

if (get_username() !== "") {
  document.getElementById("UserID").value = get_username();
}
