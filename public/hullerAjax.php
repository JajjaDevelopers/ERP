<?php
$mysqli = new mysqli("localhost", "root", "root", "factory");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT customerid, companyname, contactname, address, city, postalcode, country
FROM customers WHERE customerid = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid, $cname, $name, $adr, $city, $pcode, $country);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>CustomerID</th></tr>";
echo "<td>" . $cid . "</td></tr>";
echo "<tr><th>CompanyName</th>";
echo "<td>" . $cname . "</td></tr>";
echo "<tr><th>ContactName</th>";
echo "<td>" . $name . "</td></tr>";
echo "<tr><th>Address</th>";
echo "<td>" . $adr . "</td></tr>";
echo "<tr><th>City</th>";
echo "<td>" . $city . "</td></tr>";
echo "<tr><th>PostalCode</th>";
echo "<td>" . $pcode . "</td></tr>";
echo "<tr><th>Country</th>";
echo "<td>" . $country . "</td>";
echo "</tr>";
echo "</table>";
?>