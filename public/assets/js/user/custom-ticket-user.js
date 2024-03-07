"use strict";
$(document).ready(function () {
  $("#accordionToggle").click(function () {
    $("#accordionContent").slideToggle();
    var $text = $("#accordionToggle p");
    var $icon = $("#accordionToggle svg");

    if ($text.text() === "Show details") {
      $text.text("Hide details");
      $icon.css("transform", "rotate(180deg)");
    } else {
      $text.text("Show details");
      $icon.css("transform", "rotate(0deg)");
    }
  });
});

// Function to handle file input change event
function handleFileSelect() {
  // Get the file input element
  var fileIds = document.getElementById('file_id');
  var selectedFileName = document.getElementById('selectedFileName');
  selectedFileName.innerHTML = '';
  
  for (var i = 0; i < fileIds.files.length; i++) {
    var file = fileIds.files[i];
    var fileDiv = document.createElement('div');
    fileDiv.textContent = 'File ' + (i + 1) + ': ' + file.name;
    selectedFileName.appendChild(fileDiv);
  }
}
document.getElementById('file_id').addEventListener('change', handleFileSelect);
