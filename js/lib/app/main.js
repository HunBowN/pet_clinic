$(document).ready(function () {

  $("#phone").mask("+7 (999) 999-99-99")

  $("#myForm").submit(function (event) {
    event.preventDefault();
    let $data = {};

    $("#myForm")
      .find("input, textearea, select")
      .each(function () {
        $data[this.name] = $(this).val();
      });

    axios
      .post("/pet/create", $data)
      .then(function (response) {
        console.log(response);
        if (response.data.error) {
          $("#alert")
            .addClass("alert-danger")
            .text(response.data.message)
            .css("display", "block");
        }
        $("#alert")
          .addClass("alert-success")
          .text(response.data.message)
          .css("display", "block");
        $("#myForm")
          .find("input, textearea, select")
          .each(function () {
            $(this).val("");
          });
      })
      .catch(function (error) {
        console.log(error.message);
      });
  });

  $("#createClient").submit(function (event) {
    event.preventDefault();
    let $data = {};

    $("#createClient")
      .find("input, textearea, select")
      .each(function () {
        $data[this.name] = $(this).val();
      });

    axios
      .post("/client/create", $data)
      .then(function (response) {
        console.log(response);
        if (response.data.error) {
          $("#alert")
            .addClass("alert-danger")
            .text(response.data.message)
            .css("display", "block");
        }
        $("#alert")
          .addClass("alert-success")
          .text(response.data.message)
          .css("display", "block");
        $("#myForm")
          .find("input, textearea, select")
          .each(function () {
            $(this).val("");
          });
      })
      .catch(function (error) {
        console.log(error.message);
      });
  });

  $("#updatePetForm").submit(function (event) {
    event.preventDefault();
    let $data = {};
    let id = $(this).data("id");
    let url = `/pet/update/:${id}`;

    $("#updatePetForm")
      .find("input, textearea, select")
      .each(function () {
        $data[this.name] = $(this).val();
      });

    axios.patch(url, $data)
      .then(function (response) {
        if (response.data.error) {
          
          $("#alert")
            .addClass("alert-danger")
            .text(response.data.message)
            .css("display", "block");
        }
        $("#alert")
          .addClass("alert-success")
          .text(response.data.message)
          .css("display", "block");
      })
      .catch(function (error) {
        console.log('Error___: ', error.message);
      });
  });

  $("#searchForm").submit(function (event) {
    event.preventDefault();

    let name = $("#searchInput").val()
    url = `/pets/search?name=${name}`

    console.log("name! ", name);

    axios.get(url)
      .then(function (response) {

        let pets = response.data.pet

        $("#showAllBtn ").css("display", "block")

        let newTableHeader = "<table id='table' class='table table-hover table-responsive table-bordered table-condensed'> <tr><th class='col-lg-2'>Кличка</th><th class='col-lg-2'>Тип</th><th class='col-lg-2'>Владелец</th><th class='col-lg-2'>Дата рождения</th><th class='col-lg-4'>Действия</th></tr>"
        $("#table").html(newTableHeader)

        pets.forEach(pet => {
          $("#table").append(`
          <tr>
            <td>${pet.name}</td>
            <td>${pet.type_name}</td>
            <td>${pet.owner_name} ${pet.owner_lastname}</td>
            <td>${pet.birthday}</td>
            <td> 
              <a id='getPet' data-method='get' data-id='${pet.id}' class='btn btn-primary left-margin'>
              <span class='glyphicon glyphicon-list'></span> Просмотр
              </a>
              <a id='getUpdatePetPage' data-method='get' data-id='${pet.id}' class='btn btn-info left-margin'>
              <span class='glyphicon glyphicon-edit'></span> Редактировать
              </a>
                    
              <a id='deleteBtn' data-method='delete' data-id='${pet.id}' class='btn btn-danger delete-object'>
              <span class='glyphicon glyphicon-remove'></span> Удалить
              </a>

            </td>
          </tr>`
          )
        });

      })
      .catch(function (error) {
        console.log('Error: ', error);
      });
  });

  $("#searchClientForm").submit(function (event) {
    event.preventDefault();

    let name = $("#searchInput").val()
    url = `/clients/search?name=${name}`

    console.log("name! ", name);

    axios.get(url)
      .then(function (response) {

        let client = response.data.client

        console.log(client);

        let newTableHeader = "<table id='table' class='table table-hover table-responsive table-bordered table-condensed'> <tr><th class='col-lg-2'>Полное имя</th><th class='col-lg-2'>Контакты</th><th class='col-lg-2'>Питомцы</th><th class='col-lg-2'>Дата рождения</th><th class='col-lg-4'>Действия</th></tr>"
        $("#table").html(newTableHeader)

        $("#showAllBtn ").css("display", "block")

        client.forEach(client => {
          $("#table").append(`
          <tr>
            <td>${client.name} ${client.lastname}</td>
            <td>Тел: ${client.phone} <br>email: ${client.email}</td>
            <td>${client.pet_name}</td>
            <td>${client.birthday}</td>
            <td> 
              <a id='getClient' data-method='get' data-id='${client.id}' class='btn btn-primary left-margin'>
              <span class='glyphicon glyphicon-list'></span> Просмотр
              </a>
              <a id='getUpdateClientPage' data-method='get' data-id='${client.id}' class='btn btn-info left-margin'>
              <span class='glyphicon glyphicon-edit'></span> Редактировать
              </a>
                    
              <a id='deleteClientBtn' data-method='delete' data-id='${client.id}' class='btn btn-danger delete-object'>
              <span class='glyphicon glyphicon-remove'></span> Удалить
              </a>

            </td>
          </tr>`
          )
        });

      })
      .catch(function (error) {
        console.log('Error: ', error);
      });
  });

  $("#updateCleintForm").submit(function (event) {
    event.preventDefault();
    let $data = {};
    let id = $(this).data("id");
    let url = `/client/update/:${id}`;

    $("#updateCleintForm")
      .find("input, textearea, select")
      .each(function () {
        $data[this.name] = $(this).val();
      });

    axios.patch(url, $data)
      .then(function (response) {
        if (response.data.error) {
          
          $("#alert")
            .addClass("alert-danger")
            .text(response.data.message)
            .css("display", "block");
        }
        $("#alert")
          .addClass("alert-success")
          .text(response.data.message)
          .css("display", "block");
      })
      .catch(function (error) {
        console.log('Error___: ', error.message);
      });
  });



  $(document).on("click", "#deleteBtn", function () {
    let method = $(this).data("method");
    let id = $(this).data("id");
    let url = `/pet/:${id}`;

    bootbox.confirm({
      message: "<h4>Вы уверены?</h4>",
      buttons: {
        confirm: {
          label: "<span class='glyphicon glyphicon-ok'></span> Да",
          className: "btn-danger",
        },
        cancel: {
          label: "<span class='glyphicon glyphicon-remove'></span> Нет",
          className: "btn-primary",
        },
      },
      callback: function (result) {
        if (result == true) {
          changeEntity(method, url, id);
        }
      },
    });
  });

  $(document).on("click", "#deleteClientBtn", function () { //ToDo
    let method = $(this).data("method");
    let id = $(this).data("id");
    let url = `/client/:${id}`;

    bootbox.confirm({
      message: "<h4>Вы уверены?</h4>",
      buttons: {
        confirm: {
          label: "<span class='glyphicon glyphicon-ok'></span> Да",
          className: "btn-danger",
        },
        cancel: {
          label: "<span class='glyphicon glyphicon-remove'></span> Нет",
          className: "btn-primary",
        },
      },
      callback: function (result) {
        if (result == true) {
          changeEntity(method, url, id);
        }
      },
    });
  });
  $(document).on("click", "#getClient", function () {
    let method = $(this).data("method");
    let id = $(this).data("id");
    let url = `/client/:${id}`;

    changeEntity(method, url, id);
  });

  $(document).on("click", "#getUpdateClientPage", function () {
    let method = $(this).data("method");
    let id = $(this).data("id");
    let url = `/client/update/:${id}`; 

    changeEntity(method, url, id);
  });

  $(document).on("click", "#getPet", function () {
    let method = $(this).data("method");
    let id = $(this).data("id");
    let url = `/pet/:${id}`;

    changeEntity(method, url, id);
  });

  $(document).on("click", "#getUpdatePetPage", function () {
    let method = $(this).data("method");
    let id = $(this).data("id");
    let url = `/pet/update/:${id}`; 

    changeEntity(method, url, id);
  });

  function changeEntity(method, url, id) {
    axios({
      method: method,
      url: url,
      headers: {
        "X-Requested-With": "XMLHttpRequest",
        "Content-Type": "application/json",
      },
      data: {
        id: id,
      },
    }).then(function (response) {
      console.log("data ", response.data);
      if (!response.data.link) {
        window.location.reload();
      } else {
        window.location.href = url;
      }
    });
  }
});
