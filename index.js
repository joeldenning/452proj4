function addFlightNumber() {
    var liEl = document.getElementById("last-flight-number")
    liEl.setAttribute("id", "")
    var number = parseInt(liEl.name.substr(7,1))
    document.getElementById("flightbutton"+number).style.visibility = "hidden"
    number++
    document.getElementById("flight-numbers").innerHTML +=
        '<li>assigned to flight <input type="text" size="4" name="flights'+number+'" id="last-flight-number">' +
            '<input type="button" id="flightbutton'+number+'" onclick="addFlightNumber()" value="Add Another">' +
        '</li>';
}

function addCrewMember() {
    var liEl = document.getElementById("last-crew-member")
    liEl.setAttribute("id", "")
    var number = parseInt(liEl.name.substr(4, 1))
    document.getElementById("crewbutton"+number).style.visibility = "hidden"
    number++
    document.getElementById("crew-members").innerHTML +=
        '<li>' +
            'assigned to crew member ' +
            '<input type="text" size="4" name="crew'+number+'" id="last-crew-member">' +
            '<input type="button" id="crewbutton'+number+'" onclick="addCrewMember()" value="Add Another">' +
        '</li>'
}

function reset() {
    $.get( "reset.php", function( data ) {
        alert( "Database reset." );
    });
}