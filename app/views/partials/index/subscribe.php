<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
?>
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2><?= get_lang('how_to_subscribe') ?></h2>
            <h3><?= get_lang('steps_to_subscribe') ?></h3>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="mb-4">
                    <li>
                        Para aderir aos nossos serviços basta escolher o plano que pretende e preencher o formulário e reenviar pra nós em forma 
                        de imagem ou documento aconpanhado com a copia do Bilhete.
                    </li>
                    <li>
                        Marcar a data de instalação.
                    </li>
                    <li>
                        Fazer o pagamento no momento da instalação ou antes
                    </li>
                </ul>
                <ul style="list-style: none;">
                    <li>
                        <a href="<?= get_link('assets/formulario.pdf') ?>">
                            <i class="fa fa-download"></i> Formulário de subscrição do Serviço Itecma Solução VSAT
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>