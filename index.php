<a href="reset.php" target="_blank">Reset Database</a><br>

<ol>
    <li>
        <form action="process.php" method="get" target="_new">
            <input type="hidden" name="number" value="1">
            Search for the <i>cheapest fare</i> between
            <input type="text" name="city1">
            and
            <input type="text" name="city2">
			<input type="submit" value="Submit">
            <ul>
                <li>
                    <input type="radio" name="option" value="a" checked>a: The fare may require any number of stops in between the two input cities
                </li>
                <li>
                    <input type="radio" name="option" value="b">b: The fare involves at most <input type="text" name="max-layovers" size="3"> stops in between the two cities
                </li>
                <li>
                    <input type="radio" name="option" value="c">c: The fare should not require any stop-over for longer than <input type="text" name="max-layover-duration" size="3"> hours
                </li>
                <li>
                    <input type="radio" name="option" value="d">d: The fare cannot involve a stop in a particular city <input type="text" name="city3">
                </li>
            </ul>
        </form>
    </li>
    <li>
        <form action="process.php" target="_new">
            <input type="hidden" name="number" value="2">
            Search for the <i>shortest route</i> between
            <input type="text" name="city1">
            and
            <input type="text" name="city2">
			<input type="submit" value="Submit">
            <ul>
                <li>
                    <input type="radio" name="option" value="a" checked>a: The minimal distance
                </li>
                <li>
                    <input type="radio" name="option" value="b">b: The minimal number of stop overs
                </li>
                <li>
                    <input type="radio" name="option" value="c">c: shortest time (not including layover time)
                </li>
                <li>
                    <input type="radio" name="option" value="d">d: shortest time (including layover)
                </li>
            </ul>
        </form>
    </li>
    <li>
        <form action="process.php" target="_new">
            <input type="hidden" name="number" value="3">
            Search for the <i>special routes</i> between
            <input type="text" name="city1">
            and
            <input type="text" name="city2">
			<input type="submit" value="Submit">
            <ul>
                <li>
                    <input type="radio" name="option" value="a" checked>a: There are at most <input type="text" size="3" name="n">
                    stops with total mileage not exceeding <input type="text" size="3" name="m">
                </li>
                <li>
                    <input type="radio" name="option" value="b">b: The airfare cannot exceed <input type="text" size="3" name="m"> dollars
                </li>
                <li>
                    <input type="radio" name="option" value="c">c: The departure time is between <input type="text" size="2" name="hh1">
                    :<input type="text" size="2" name="mm1"> and <input type="text" size="2" name="hh2">
                    :<input type="text" size="2" name="mm2">
                </li>
            </ul>
        </form>
    </li>
    <li>
        <form action="process.php" target="_new">
            <input type="hidden" name="number" value="3">
            CRUD operations on database
			<input type="submit" value="Submit">
            <ul>
                <li>
                    <input type="radio" name="option" value="a" checked>a: Insert a new crew member
                    <ul id="flight-texts">
                        <li>assigned to flight <input type="text" size="4" name="flights0" id="last-flight-text">
                            <input type="button" id="flightbutton0" onclick="addFlighttext()" value="Add Another">
                        </li>
                    </ul>
                </li>
                <li>
                    <input type="radio" name="option" value="b">b: Insert a new flight
                    <ul id="crew-members">
                        <li>assigned to crew member <input type="text" size="4" name="crew0" id="last-crew-text">
                            <input type="button" id="crewbutton0" onclick="addCrewMember()" value="Add Another">
                        </li>
                    </ul>
                </li>
                <li>
                    <input type="radio" name="option" value="c">
                </li>
                <li>
                    <input type="radio" name="option" value="d">
                </li>
                <li>
                    <input type="radio" name="option" value="e">
                </li>
                <li>
                    <input type="radio" name="option" value="f">
                </li>
            </ul>
        </form>
    </li>
</ol>

<style type="text/css">
    ul {
        list-style-type: none;
    }
</style>

<script src="index.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>