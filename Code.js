function doGet(e) {
    return ContentService.createTextOutput("Method GET not allowed.");
  }
  
  function doPost(e){
    return gsender.sendGmail(e);
  }
  