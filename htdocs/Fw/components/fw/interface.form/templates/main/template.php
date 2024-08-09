<main class='main py-3'>
    <div class="container">
        <div class ='row justify-content-center mt-5'>
            <div class="col-6">
                <h2 class="text-center"><?php \Fw\Core\InstanceContainer::getInstance(\Fw\Core\Page::class)->showProperty($this->component->id . '_title'); ?></h2>
                <form <?= $this->component->result['form']['str'] ?> class=<?=$this->component->result['form']['additional_class'] ?>>
                    <?php foreach ($this->component->result['elements'] as $el) : ?>
                        <div class="mb-3">
                        <?php \Fw\Core\InstanceContainer::getInstance(\Fw\Core\Application::class)->includeComponent($el['component'], $el['template'], $el['params']);?>
                        </div>
                    <?php endforeach; ?>
                <button type="submit" class="btn btn-primary" id="login-btn">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</main>
