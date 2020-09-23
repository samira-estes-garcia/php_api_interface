console.log("Connected to index.html");

let table = document.getElementById("table"),
  rIndex;

//display selected row data in input

for (let i = 1; i < table.rows.length; i++) {
  table.rows[i].onclick = function () {
    rIndex = this.rowIndex;
    console.log(rIndex);
    document.getElementById("key-output").value = this.cells[1].innerHTML;
    document.getElementById("data-type-output").value = this.cells[2].innerHTML;
  };
}

//save selected row after edit
function save() {
  table.rows[rIndex].cells[1].innerHTML = document.getElementById(
    "data-type-output"
  );
}

save();

// $(".update-button").click(function () {
//   if ($(".update-button").dataset === $(".type-value").dataset) {
//     $(".type-value").attr("contenteditable", "true");
//     $(".type-value").addClass("edit-border");
//   }
// });

function getData(str) {
  $.ajax({
    url: "example.json",
    type: "GET",
    data: str,
    dataType: "json",
    success: function (json) {
      console.log(json);
    },
  });
}

getData();

//ajax request to php to update new content in the file
// echo '<h1>'.$data["attributes"]["id"]["type"].'</h1>';
// $data["attributes"]["id"]["type"] = "integer";
// $updatedData = json_encode($data);
// file_put_contents('example.json', $updatedData);

//get json info and log it to console
// function getData() {
//   $.getJSON("example.json", function (data) {
//     console.log(data);
//   });
// }

// create table with the json info
// function createTable() {
//   $.getJSON("example.json", function (data) {
//     console.log(data);
//     console.log(data.attributes);
//     $("#container").append(data.attributes.account);
//   });
// }

// createTable();

// $(".update-button").click(function () {
//   if ($(".update-button").dataset === $(".type-value").dataset) {
//     $(".type-value").attr("contenteditable", "true");
//     $(".type-value").addClass("edit-border");
//   }
// });
