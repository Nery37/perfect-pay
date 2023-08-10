<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Perfect Pay</title>
    <style>
        .step-content {
            display: none;
        }

        .step-content.active {
            display: block;
        }
    </style>
</head>

<body>

    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-4">Perfect Pay</h1>
            <p class="lead mb-0">Desafio Técnico</p>
        </div>
    </div>
    <!-- End -->
    <div class="container py-5 step-content" id="step2">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <!-- Credit card form tabs -->
                    <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                        <li class="nav-item">
                            <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill" data-payment-method="3">
                                <i class="fa fa-credit-card"></i>
                                Cartão de crédito
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill" data-payment-method="1">
                                <i class="fa fa-paypal"></i>
                                Boleto
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="pill" href="#nav-tab-bank" class="nav-link rounded-pill" data-payment-method="2">
                                <i class="fa fa-university"></i>
                                Pix
                            </a>
                        </li>
                    </ul>
                    <!-- End -->
                    <input type="hidden" id="payment_method_id" name="payment_method_id" value="">

                    <!-- Credit card form content -->
                    <div class="tab-content">

                        <!-- credit card info-->
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <form id="formCreditCardStore">

                            <input type="hidden" id="payment_method_id" name="payment_method_id" value="">


                                <div class="form-group">
                                    <label for="amount">Valor da Transação:</label>
                                    <input type="text" class="form-control" id="amount" placeholder="00,00" required>
                                </div>
                                <div class="form-group">
                                    <label for="holder_name">Nome do Titular:</label>
                                    <input type="text" class="form-control" id="holder_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="number">Número do Cartão:</label>
                                    <input type="text" class="form-control" id="number" max="16" required>
                                </div>
                                <div class="form-group">
                                    <label for="expiry_month">Mês de Expiração:</label>
                                    <input type="text" class="form-control" id="expiry_month" required>
                                </div>
                                <div class="form-group">
                                    <label for="expiry_year">Ano de Expiração:</label>
                                    <input type="text" class="form-control" id="expiry_year" required>
                                </div>
                                <div class="form-group">
                                    <label for="ccv">CCV:</label>
                                    <input type="text" class="form-control" id="ccv" required>
                                </div>

                                <button id="sendTransaction" type="submit" class="btn btn-primary">Enviar Pagamento</button>
                            </form>
                        </div>
                        <!-- End -->

                        <!-- Boleto info -->
                        <div id="nav-tab-paypal" class="tab-pane fade">
                            <form id="formBilletStore">
                                <div class="form-group">
                                    <label for="amountBillet">Valor da Transação:</label>
                                    <input type="text" class="form-control" id="amountBillet" placeholder="00,00" required>
                                </div>
                                <button id="sendTransaction" type="submit" class="btn btn-primary">Enviar Pagamento</button>
                            </form>
                        </div>
                        <!-- End -->

                        <!-- Pix info -->
                        <div id="nav-tab-bank" class="tab-pane fade">
                            <form id="formPixStore">
                                <div class="form-group">
                                    <label for="amountPix">Valor da Transação:</label>
                                    <input type="text" class="form-control" id="amountPix" placeholder="00,00" required>
                                </div>
                                <button id="sendTransaction" type="submit" class="btn btn-primary">Enviar Pagamento</button>
                            </form>
                        </div>
                        <!-- End -->
                    </div>
                    <!-- End -->

                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5 step-content active" id="step1">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form id="formCustomerStore">
                            <div>
                                <h6>Cadastro do Pagador</h6>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="cpf_cnpj">CPF/CNPJ:</label>
                                    <input type="text" class="form-control" id="cpf_cnpj" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile_phone">Mobile Phone:</label>
                                    <input type="text" class="form-control" id="mobile_phone" required>
                                </div>

                                <div class="form-group">
                                    <label for="zip_code">CEP:</label>
                                    <input type="text" class="form-control" id="zip_code" required>
                                </div>

                                <div class="form-group">
                                    <label for="address_number">Numero:</label>
                                    <input type="text" class="form-control" id="address_number" required>
                                </div>

                                <button id="sendCustomer" type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5 step-content" id="step3">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-4">
                <div class="card">
                    <div class="card-body">
                    <div>
                            <h6 style="text-align: center">Obrigado!</h6>
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i> Pagamento Enviado com sucesso!
                            </div>
                            <div class="text-center">
                                <img src="https://www.e-contab.com.br/app/assets/imagens/pagamento-retorno-sucesso.png" alt="">
                            </div>
                            <div class="text-center">
                                <button id="newTransaction" type="button" class="btn btn-primary mt-3" onclick="window.location.reload()">Novo Pagamento
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Sucesso!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="text-content-modal"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-creditcardvalidator/1.2.0/jquery.creditCardValidator.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {

            const tabLinks = document.querySelectorAll('.nav-link[data-toggle="pill"]');
            const paymentMethodIdInput = document.getElementById('payment_method_id');
            const defaultPaymentMethod = '3';
            paymentMethodIdInput.value = defaultPaymentMethod;

            tabLinks.forEach(function(tabLink) {
                tabLink.addEventListener('click', function(event) {
                    const paymentMethod = tabLink.getAttribute('data-payment-method');
                    
                    paymentMethodIdInput.value = paymentMethod;
                });
            });

            let customer = JSON.parse(window.localStorage.getItem('customer'));

            if (customer) {
                nextStep(1);
            }

            $('#mobile_phone').inputmask('(99) 99999-9999');

            $('#zip_code').inputmask('99999-999');

            $('#cpf_cnpj').inputmask({
                mask: ['999.999.999-99', '99.999.999/9999-99'],
                keepStatic: true
            });

            $('#amount').maskMoney({
                allowNegative: false,
                thousands: '.',
                decimal: ',',
                affixesStay: true,
                allowEmpty: true,
            });

            $('#amountBillet').maskMoney({
                allowNegative: false,
                thousands: '.',
                decimal: ',',
                affixesStay: true,
                allowEmpty: true,
            });

            $('#amountPix').maskMoney({
                allowNegative: false,
                thousands: '.',
                decimal: ',',
                affixesStay: true,
                allowEmpty: true,
            });

            $('#number').inputmask('9999 9999 9999 9999');

            $('#ccv').inputmask('999');

            $('#expiry_month').inputmask('99');

            $('#expiry_year').inputmask('9999');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const formCustomerStore = $('#formCustomerStore');
            const formCreditCardStore = $('#formCreditCardStore');
            const formBilletStore = $('#formBilletStore');
            const formPixStore = $('#formPixStore');
            const creditCardFields = $('#creditCardFields');

            function showCreditCardFields() {
                const paymentMethodSelect = $('#payment_method_id');
                const selectOption = paymentMethodSelect.val();

                if (selectOption === '3') {
                    $('#creditCardFields input').prop('disabled', false);
                    creditCardFields.show();
                } else {
                    $('#creditCardFields input').prop('disabled', true);
                    creditCardFields.hide();
                }
            }

            function sendFormCustomer(event) {
                event.preventDefault();

                const btnSend = formCustomerStore.find('#sendCustomer');

                btnSend.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Carregando...');

                const data = {
                    name: $('#name').val(),
                    cpf_cnpj: $('#cpf_cnpj').val().replace(/[^\d]/g, ''),
                    email: $('#email').val(),
                    mobile_phone: $('#mobile_phone').val(),
                    zip_code: $('#zip_code').val(),
                    address_number: $('#address_number').val(),
                };

                $.post('/api/customers', data)
                    .done(function(response) {

                        response = response.data;

                        const customer = {
                            id: response.id,
                            name: response.name
                        };

                        localStorage.setItem('customer', JSON.stringify(customer));

                        showModal('Sucesso', 'Cadastro realizado com sucesso');

                        setTimeout(function() {
                            hideModal();
                            btnSend.prop('disabled', false).html('Salvar');
                            nextStep(1);
                        }, 2000);
                    })
                    .fail(function(error) {
                        const errorMessage = error.responseJSON &&
                            error.responseJSON.message ?
                            error.responseJSON.message :
                            'Ocorreu um erro na requisição.';

                        showModal('Atenção', errorMessage);
                        setTimeout(function() {
                            hideModal();
                            btnSend.prop('disabled', false).html('Salvar');
                        }, 3000);
                    });
            }

            function sendFormTransaction(event, form) {
                event.preventDefault();

                const btnSend = form.find('#sendTransaction');

                btnSend.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...');

                const payment_method_id = $('#payment_method_id').val();
                var amount = null;
                const customer = JSON.parse(window.localStorage.getItem('customer'));

                switch (payment_method_id) {
                case '1': // Boleto
                    amount = $('#amountBillet').maskMoney('unmasked')[0];
                    break;
                case '2': // Pix
                    amount = $('#amountPix').maskMoney('unmasked')[0];
                    break;
                case '3': // Cartão de crédito
                    amount = $('#amount').maskMoney('unmasked')[0];
                    break;
                default:
                    // Handle other cases if needed
                    break;
                }

                const data = {
                    customer_id: customer.id,
                    payment_method_id: payment_method_id,
                    amount: amount,
                };

                if (payment_method_id === '3') {
                    data.ccv = $('#ccv').val();
                    data.expiry_year = $('#expiry_year').val();
                    data.expiry_month = $('#expiry_month').val();
                    data.number = $('#number').val().replace(/\D/g, '');
                    data.holder_name = $('#holder_name').val();

                    const currentYear = new Date().getFullYear();

                    if (data.expiry_year < currentYear) {
                        showModal('Atenção', 'Ano de Expiração inválido');

                        setTimeout(function() {
                            $('#notificationModal').modal('hide');
                            btnSend.prop('disabled', false).html('Salvar');
                            return false
                        }, 2500);
                        return false
                    }


                    const month = parseInt(data.expiry_month, 10);

                    if (month < 1 || month > 12) {
                        showModal('Atenção', 'Mes de Expiração inválido');

                        setTimeout(function() {
                            $('#notificationModal').modal('hide');
                            btnSend.prop('disabled', false).html('Salvar');
                            return false
                        }, 2500);
                        return false
                    }

                    if (!$('#number').validateCreditCard()) {
                        showModal('Atenção', 'Numero de cartao de credito inválido');

                        setTimeout(function() {
                            $('#notificationModal').modal('hide');
                            btnSend.prop('disabled', false).html('Salvar');
                            return false
                        }, 2500);
                        return false
                    }
                }

                $.post('/api/transactions', data)
                    .done(function(response) {
                        response = response.data;

                        if (response.transaction_status_id != 3) {
                            window.open(response.invoice_url, "_blank");

                            showModal('Sucesso', 'Pagamento realizado com sucesso');
                            setTimeout(function() {
                                btnSend.prop('disabled', false).html('Enviar Pagamento');
                                nextStep(2)
                            }, 2000);
                        } else {
                            showModal('Atenção', 'Houve um problema com o processamento do seu pagamento, tente usar outro modo de pagamento ou tente mais tarde!');
                            setTimeout(function() {
                                btnSend.prop('disabled', false).html('Salvar');
                                nextStep(1)
                            }, 2000);
                        }
                    })
                    .fail(function(error) {
                        const errorMessage = error.responseJSON &&
                            error.responseJSON.message ?
                            error.responseJSON.message :
                            'Houve um problema com o processamento do seu pagamento, tente usar outro modo de pagamento ou tente mais tarde!';

                        showModal('Atenção', errorMessage);
                        setTimeout(function() {
                            hideModal();
                            btnSend.prop('disabled', false).html('Enviar Pagamento');
                        }, 3000);
                    });
            }

            function showModal(titulo, conteudo) {
                $('#successModalLabel').text(titulo);
                $('#text-content-modal').text(conteudo);
                $('#notificationModal').modal('show');
            }

            function hideModal() {
                $('#notificationModal').modal('hide');
            }

            function nextStep(step) {
                $('#step' + step).removeClass('active');
                $('#step' + (step + 1)).addClass('active');
            }

            $('#payment_method_id').on('change', showCreditCardFields);

            formCustomerStore.on('submit', sendFormCustomer);

            formCreditCardStore.on('submit', function(event) {
                sendFormTransaction(event, formCreditCardStore);
            });
            formBilletStore.on('submit', function(event) {
                sendFormTransaction(event, formBilletStore);
            });
            formPixStore.on('submit', function(event) {
                sendFormTransaction(event, formPixStore);
            });
        });
    </script>
</body>
<style>
    body {
        background: #f5f5f5;
    }

    .rounded-lg {
        border-radius: 1rem;
    }

    .nav-pills .nav-link {
        color: #555;
    }

    .nav-pills .nav-link.active {
        color: #fff;
    }
</style>

</html>