function get_username() {
    const nvs = document.cookie.split("; ");
  
    for (const nv of nvs) {
      if (nv.includes("=")) {
        if (nv.startsWith("username")) {
          return nv.substring("username=".length);
          //after the 9th index (the length of username=) extract everything
        }
      }
    }
    return "";
  }
  