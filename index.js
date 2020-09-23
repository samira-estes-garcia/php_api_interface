document.addEventListener("DOMContentLoaded", function () {
  console.log("Connected to index.html");

  let table = document.getElementById("table"),
    rIndex;

  //display selected row data in input
  for (let i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      console.log(rIndex);
      document.getElementById("key-output").value = this.cells[1].innerHTML;
      document.getElementById(
        "data-type-output"
      ).value = this.cells[2].innerHTML;
    };
  }

  //save selected row after edit
  function save() {
    table.rows[rIndex].cells[2].innerHTML = document.getElementById(
      "data-type-output"
    ).value;
  }
});

// function getData(str) {
//   $.ajax({
//     url: "example.json",
//     type: "GET",
//     data: str,
//     dataType: "json",
//     success: function (json) {
//       console.log(json);
//     },
//   });
// }

// getData();
