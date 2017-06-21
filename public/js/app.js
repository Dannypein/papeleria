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
            BootstrapDialog.show({
              type: BootstrapDialog.TYPE_DANGER,
              title: 'Crédito insuficiente',
              message: 'Lo sentimos. Su límite de crédito de $' + response.responseJSON.credit_limit + ' sería ' +
                       'rebasado por $' + response.responseJSON.difference + ' si añade este producto a su carrito. ' +
                       'Considere disminuir la cantidad o añadir en su lugar un producto más barato.'
            });
          } else {
            BootstrapDialog.alert('Error de conexión con el servidor. Intenta de nuevo más tarde.');
          }

          form.show();
          spinner.hide();
        },
        success: function(response) {
          BootstrapDialog.alert('Se añadió el producto al carrito.');
          form.hide();
          form.find('[type=number]').val('1'); // Reinicia el input de cantidad
          spinner.hide();
          button.show();

          form.find('[name=_token]').val(response.token);
        }
      });

      return false;
    });
  });

});
