function getNameSurnameId() {

  $.ajax({
    url: "getPagaNameFromDB.php",
    method: "GET",
    success: function(data) {

      var people = JSON.parse(data);

      var source   = document.getElementById("box-template").innerHTML;
      var template = Handlebars.compile(source);

      for (var i = 0; i < people.length; i++) {

        var person = people[i];
        var personHTML = template(person);

        $(".box-container").append(personHTML);
      }
    }
  })
}

function getAddressById() {

  var me = $(this);
  var id = me.data("id");

  $.ajax({
    url: "getAddressById.php",
    method: "POST",
    data: {"id": id},
    success: function(data) {

      var addressArrObj = JSON.parse(data);

      var address = addressArrObj[0].address;

      me.find(".address").html(address);
    }
  })
}

function updateNameById() {

  var risp = prompt("update name-lastName?(y/n)")
  if(risp ==  "y")
  {

    var me = $(this);
    var id = me.data("id");

    var name = prompt("name")
    var lastname = prompt("lastName")

    $.ajax({
      url: "updateName.php",
      method: "POST",
      data: {
              "id": id,
              "name": name,
              "lastname": lastname
            },
      success: function() {

        $(".box").remove();
        getNameSurnameId();
      }
    });

  }

}

function deleteFromDb() {

  var risp = prompt("delete?(y/n)")
  if(risp ==  "y") {

    var me = $(this);
    var id = me.data("id");

    $.ajax({
      url: "delete.php",
      method: "POST",
      data: {
              "id": id
            },
      success: function() {

        $(".box").remove();
        getNameSurnameId();
      }
    });

  }

}

function init() {

  getNameSurnameId();
  $(document).on("click", ".box", getAddressById);
  $(document).on("click", ".box", updateNameById);
  $(document).on("click", ".box", deleteFromDb);

}

$(init)
