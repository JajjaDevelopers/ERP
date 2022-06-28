arabica_grades = ["Arabica A", "Arabica AA", "Arabica AAA", "Arabica B", "Arabica AB", "Arabica CPB", "Triage", "Black Beans"];
robusta_grades = ["Screen 1800", "Screen 1700", "Screen 1500", "Screen 1200", "Black Beans", "BHP", "1899"];




function selectGrade(typeEntryID) {
    document.getElementById("grnCoffeeGrade").innerHTML.list = ""
    let coffee_type = document.getElementById(typeEntryID).innerHTML;
    let coffee_grades = ""
    if (coffee_type = "Robusta") {
        for (let grade of robusta_grades) {
            coffee_grades = document.createElement("option");
            coffee_grades.innerHTML = grade;
            document.getElementById("coffeeGrades").appendChild(coffee_grades);
        }
    } else {
        for (let grade of arabica_grades) {
            coffee_grades = document.createElement("option");
            coffee_grades.innerHTML = grade;
            document.getElementById("coffeeGrades").appendChild(coffee_grades);
        }
    }
    
}
