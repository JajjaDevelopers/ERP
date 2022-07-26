let fullItemList = ["Arabica A", "Arabica AA", "Arabica AAA", "Arabica B", "Arabica AB", "Arabica CPB", "Triage", "Black Beans"]
    for (var i=0; i < fullItemList.length; i++) {
        var tableRow = document.createElement("tr");
        var itemNameCell = document.createElement("td");
        var itemNameText = document.createTextNode(fullItemList[i]);
        itemNameCell.appendChild(itemNameText);
        tableRow.appendChild(itemNameCell);
        for (var d = 0; d < 7; d++){
            var tableData = document.createElement("td");
            tableRow.appendChild(tableData);
        }
        var selectedTable = document.getElementById("valuationsTable");
        selectedTable.appendChild(tableRow);
    }