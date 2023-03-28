function reservationSummary() {
    var strText = document.getElementById("id").value;          
    var strText1 = document.getElementById("location").value;
    var strText2 = document.getElementById("guest").value;
    var strText3 = document.getElementById("checkin").value;
    var strText4 = document.getElementById("checkout").value;
    var result = "Reservation ID: " + strText + "\n";
        result += "Location: " + strText1 + "\n";
        result += "Number of Guests: " + strText2 + "\n";
        result += "Check-in Date: " + strText3 + "\n";
        result += "Check-out Date: " + strText4 + "\n";
    document.getElementById('summary').textContent = result;

    
            
}
