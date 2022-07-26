// $.ajax({  
//     type: 'POST',  
//     url: 'http://localhost/foxsweeper/user/setScore', 
//     data: { maxScore: maxScore },
//     success: function(response) {
//         console.log(response);
//     }
// });
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    console.log(div.id);

    $.ajax({  
      type: 'POST',  
      url: 'http://localhost/testproject/user/removeTask', 
      data: { id: div.id },
      success: function(response) {
          console.log(response);
      }
    });

    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');

    $.ajax({  
      type: 'POST',  
      url: 'http://localhost/testproject/user/checkTask', 
      data: { id: ev.target.id },
      success: function(response) {
          console.log(response);
      }
    });

  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
      $.ajax({  
        type: 'POST',  
        url: 'http://localhost/testproject/user/setTask', 
        data: { content: inputValue },
        success: function(response) {
            console.log(response);
        }
      });
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}