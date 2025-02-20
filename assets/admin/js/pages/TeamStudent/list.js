function modalStudentId(id) {
  $("#student_id").val(id);
  var student_id = $("#student_id").val();

  console.log(BASE_URL);

  $.ajax({
    url: BASE_URL + "ajax/generateListTeamsExcludingCurrent",
    type: "POST",
    dataType: "JSON",
    data: {
      student_id: student_id
    },
    beforeSend: function () {
      $('#team_id').html(`
        <option value="0">Carregando... </option>
      `);
    },
    success: function (response) {
      console.log(response);
      create_item_list(response);

    },
    error: function (error) {
      alert('Não foi possivel processar a sua requisição, tente mais tarde!');
    }
  });

  let create_item_list = (object) => {
    console.log(object);
    if (object.length > 0) {
      let info = object.map((item, index) => {
        return `
              <option value="${item.id}"> ${item.name} </option>                          
            `;
      });

      $('#team_id').html(info.join(""));
    } else {
      $('#team_id').html(`
            <option value=""> Nenhuma turma matriculada ou Aluno já cadastrado em todas. </option>        
        `);
    }
  };
}






