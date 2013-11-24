<?php
/*

Flight(FLIGHT_NUM SOURCE_CITY	DEST_CITY    DEP_TIME ARR_TIME AIRFARE  MILEAGE)
------ ---------- ----------- ------------   -------- -------- -------  -------
        101	   Montreal	NY	       0530     0645	  180      170
	102	   Montreal	Washington     0100     0235	  100      180
	103	   NY		Chicago        0800     1000	  150      300
	105	   Washington	Kansas-City    0600     0845	  200      600
	106	   Washington	NY	       1200     1330	   50       80
	107	   Chicago	SLC	       1100     1430	  220      750
	110	   Kansas-City	Denver	       1400     1525	  180      300
	111	   Kansas-City	SLC	       1300     1530	  200      500
	112	   SLC		SanFran        1800     1930	   85      210
	113	   SLC		LA	       1730     1900	  185      230
	115	   Denver	SLC	       1500     1600	   75      300
	116	   SanFran	LA	       2200     2230	   50       75
	118	   LA		Seattle        2000     2100	  150      450


Crew ( ID      NAME	   SALARY   POSITION  SENIORITY FLY_HOURS MGRID)
----  ----- -------------- ------ ----------- --------- --------- -----
       01    John Smith	   500000   Pilot       15        3000
       02    Rob Anderson  400000   Pilot       12        2700 	   01
       03    Bill Talbot   300000   Pilot       12        2500     01
       11    Steve Lowe	   250000   Co-pilot	10        2000     02
       12    John Crowe	   200000   Co-pilot	 9	   800     03
       13    Mike York 	   150000   Co-Pilot	 8	   650     02
       21    Sam Carson	   100000   Engineer	12        2400     11
       22    Joe Young 	   180000   Chief Engg	 9	     0     11
       10    Dave Empire    80000   Engineer	 2	   300     22
       30    Dee Brown 	    70000   Engineer	13        1050     22


Assign (ID    FLIGHT_NUM)
	----- ----------
	01    101
	02    102
	03    106
	02    105
	11    103
	13    107
	11    110
	21    111
	03    112
	21    112
	10    113
	01    116
	30    116
	02    118
	30    118
 */

$stmts = array(
	"DROP TABLE assign",
	"DROP TABLE crew",
	"DROP TABLE flight",
	"CREATE TABLE flight( flight_num INT PRIMARY KEY, source_city VARCHAR(100) NOT NULL, dest_city VARCHAR(100) NOT NULL,
			dep_time INT NOT NULL, arr_time INT NOT NULL, airfare INT NOT NULL, mileage INT NOT NULL)",
	"CREATE TABLE crew( id INT PRIMARY KEY, name VARCHAR(100) NOT NULL, SALARY INT NOT NULL, position VARCHAR(50),
			seniority INT NOT NULL, fly_hours INT NOT NULL, mgrid INT NULL REFERENCES crew(id))",
	"CREATE TABLE assign( id INT REFERENCES crew(id), flight_num INT REFERENCES flight(flight_num), PRIMARY KEY( id, flight_num ))",
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
		VALUES (101, 'Montreal', 'NY', 530, 645, 180, 170)",
		
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
	VALUES (102, 'Montreal', 'Washington', 100, 235, 100, 180)",
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
	VALUES (103, 'NY', 'Chicago', 0800, 1000, 150, 300)",
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
	VALUES (105, 'Washington', 'Kansas-City', 600, 845, 200, 600)",
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
	VALUES (106, 'Washington', 'NY', 1200, 1330, 50, 80)",
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
	VALUES (107, 'Chicago', 'SLC', 1100, 1430, 220, 750)",
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
	VALUES (110, 'Kansas-City', 'Denver', 1400, 1525, 180, 300)",
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
	VALUES (111, 'Kansas-City', 'SLC', 1300, 1530, 200, 500)",
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
	VALUES (112, 'SLC', 'SanFran', 1800, 1930, 85, 210)",
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
	VALUES (113, 'SLC', 'LA', 1730, 1900, 185, 230)",
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
	VALUES (115, 'Denver', 'SLC', 1500, 1600, 75, 300)",
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
	VALUES (116, 'SanFran', 'LA', 2200, 2230, 50, 75)",
	"INSERT INTO flight( flight_num, source_city, dest_city, dep_time, arr_time, airfare, mileage )
	VALUES (118, 'LA', 'Seattle', 2000, 2100, 150, 450)",
	
	"INSERT INTO crew(id, name, salary, position, seniority, fly_hours, mgrid )
	VALUES (1, 'John Smith', 500000, 'Pilot', 15, 3000, NULL)",	
	"INSERT INTO crew(id, name, salary, position, seniority, fly_hours, mgrid )
	VALUES (2, 'Rob Anderson', 400000, 'Pilot', 12, 2700, 1)",	
	"INSERT INTO crew(id, name, salary, position, seniority, fly_hours, mgrid )
	VALUES (3, 'Bill Talbot', 300000, 'Pilot', 12, 2500, 1)",	
	"INSERT INTO crew(id, name, salary, position, seniority, fly_hours, mgrid )
	VALUES (11, 'Steve Lowe', 250000, 'Co-pilot', 10, 2000, 02)",	
	"INSERT INTO crew(id, name, salary, position, seniority, fly_hours, mgrid )
	VALUES (12, 'John Crowe', 200000, 'Co-pilot', 9, 800, 3)",	
	"INSERT INTO crew(id, name, salary, position, seniority, fly_hours, mgrid )
	VALUES (13, 'Mike York', 150000, 'Co-pilot', 8, 650, 2)",	
	"INSERT INTO crew(id, name, salary, position, seniority, fly_hours, mgrid )
	VALUES (21, 'Sam Carson', 100000, 'Engineer', 12, 2400, 11)",	
	"INSERT INTO crew(id, name, salary, position, seniority, fly_hours, mgrid )
	VALUES (22, 'Joe Young', 180000, 'Chief Engg', 9, 0, 11)",	
	"INSERT INTO crew(id, name, salary, position, seniority, fly_hours, mgrid )
	VALUES (10, 'Dave Empire', 80000, 'Engineer', 2, 300, 22)",	
	"INSERT INTO crew(id, name, salary, position, seniority, fly_hours, mgrid )
	VALUES (30, 'Dee Brown', 70000, 'Engineer', 13, 1050, 22)",
	
	"INSERT INTO assign(id, flight_num)
	VALUES(1, 101 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(2, 102 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(3, 106 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(2, 105 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(11, 103 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(13, 107 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(11, 110 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(21, 111 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(3, 112 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(21, 112 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(10, 113 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(1, 116 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(30, 116 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(2, 118 )",	
	"INSERT INTO assign(id, flight_num)
	VALUES(30, 118 )",	
);

include_once("db.php");


foreach( $stmts as $stmt ) {
	echo $stmt."<br><br>";
	$prepared = oci_parse($GLOBALS['con'], $stmt);
	oci_execute($prepared);
}
?>

reset complete