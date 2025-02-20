 // Nova função para lidar com o clique na imagem e exibir no modal (Editar)
$('.reset-file-btn').hide();
$('.open-modal-btn').hide();

 $('.image-src').click(function () {
    var src = $(this).attr('src');
    $('#modal-image').attr('src', src);
    $('#view-file').modal('show');
});

// Nova função para lidar com o clique no botão "Visualizar" e resetar o campo
$('.custom-file-input').on('change', function () {
    var file = this.files[0];
    var $inputGroup = $(this).closest('.input-group');
    var $resetButton = $inputGroup.find('.reset-file-btn');
    var $openModalBtn = $inputGroup.find('.open-modal-btn');
    var $customFileLabel = $inputGroup.find('.custom-file-label');//Quando há necessidade de mudar o label

    // Exibe o nome do arquivo selecionado
    if (file) {
        $customFileLabel.text(file.name);
        $resetButton.show();
    } else {
        $customFileLabel.text('Escolha o arquivo');
        $resetButton.hide();
        $openModalBtn.hide();
    }

    if (file) {
        var reader = new FileReader();
        reader.onload = function (event) {
            var imageUrl = event.target.result;
            $openModalBtn.show().off('click').on('click', function () {
                $('#modal-image').attr('src', imageUrl);
                $('#view-file').modal('show');
            });
        };
        reader.readAsDataURL(file);
    }
});

// Limpar o campo de input file ao clicar no botão de reset
$('.reset-file-btn').on('click', function () {
    var $inputGroup = $(this).closest('.input-group');
    var $inputFile = $inputGroup.find('.custom-file-input');
    var $openModalBtn = $inputGroup.find('.open-modal-btn');
    var $customFileLabel = $inputGroup.find('.custom-file-label');

    $(this).hide();
    $inputFile.val('');
    $inputFile.trigger('change'); // Disparar evento change para garantir que o botão visualizar seja ocultado
    $openModalBtn.hide();
    $customFileLabel.text('Escolha o arquivo');
});

$(".image-file").on("change", function (event) {
    const imageFile = event.target.files[0];
    const imageId = $(this).data("image-id");

    if (!imageFile) return;

    const reader = new FileReader();

    reader.onload = function (event) {
        const imageUrl = event.target.result;
        $("#image-" + imageId).attr("src", imageUrl);
    };

    reader.readAsDataURL(imageFile);
});