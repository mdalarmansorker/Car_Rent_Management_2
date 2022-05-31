function panding_request() {
    var x = document.getElementById("panding");
    var y = document.getElementById("upcoming");
    if (x.style.display === "none") {
      x.style.display = "block";
      // y.style.display = "none";
    } else {
      x.style.display = "none";
    }
  }
  
function upcoming_schedule() {
    var x = document.getElementById("panding");
    var y = document.getElementById("upcoming");
    if (y.style.display === "none") {
      y.style.display = "block";
      // x.style.display = "none";
    } else {
      y.style.display = "none";
    }
  }
function select_vehicles(){
    var y = document.getElementById("select_vehicles");
    if (y.style.display === "none") {
      y.style.display = "block";
      // x.style.display = "none";
    } else {
      y.style.display = "none";
    }
}
function cancel_order() {
  if (confirm('Do you want to cancel the order?'))
  {
    return true;
  }
  else
  {
    event.stopPropagation(); 
    event.preventDefault();
  }
}
  