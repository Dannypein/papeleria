$(function() {

  $('button.btn-add-cart').click(function() {
    const button  = $(this);
    const wrapper = button.parent();
    const form    = wrapper.find('form');
    const spinner = wrapper.find('.spinner');

    button.hide();
    form.show();
    form.find('input').focus();
    form.off('submit').on('submit', form, function() {
      form.hide();
      spinner.show();

      $.ajax({
        url: '/cart/add_product',
        type: 'post',
        data: form.serialize(),
        error: function(response) {
          if (response.status == 422) {
            BootstrapDialog.alert(response.responseText);
          } else {
            BootstrapDialog.alert('Error de conexión con el servidor. Intenta de nuevo más tarde.');
            form.show();
            spinner.hide();
          }
        },
        success: function(response) {
          BootstrapDialog.alert('Se añadió el producto al carrito.');
          form.hide();
          form.find('input').val('1'); // Reinicia el input de cantidad
          spinner.hide();
          button.show();

          form.find('[name=_token]').val(response.token);
        }
      });

      return false;
    });
  });

});
